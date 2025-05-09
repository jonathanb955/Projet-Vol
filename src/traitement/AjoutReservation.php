<?php
session_start();

if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] !== true) {
    header('Location: ../../vue/pageConnexion.php');
    exit;
}

if (!isset($_GET['id_vol'])) {
    echo "Aucun vol sélectionné.";
    exit;
}

$idVol = intval($_GET['id_vol']);
$idUtilisateur = $_SESSION['id_utilisateur'];

try {

    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT date_depart, prix_billet_init FROM vols WHERE id_vol = :id_vol");
    $stmt->execute(['id_vol' => $idVol]);
    $vol = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vol) {
        echo "Vol introuvable.";
        exit;
    }

    $date_depart = new DateTime($vol['date_depart']);
    $date_aujourdhui = new DateTime();
    $interval = $date_aujourdhui->diff($date_depart)->days;

    $prix = floatval($vol['prix_billet_init']);
    if ($interval <= 2 && $date_aujourdhui < $date_depart) {
        $prix *= 2;
    }


    var_dump($prix);

    // Insertion dans la base de données
    $insert = $pdo->prepare("INSERT INTO reservation (date_reservation, prix_billet, reservation_en_cours, ref_utilisateur, ref_vol) 
                             VALUES (NOW(), :prix_billet, 1, :id_utilisateur, :id_vol)");


    $insert->execute([
        'prix_billet' => $prix,
        'id_utilisateur' => $idUtilisateur,
        'id_vol' => $idVol
    ]);

    if ($insert->rowCount() === 0) {
        echo "❌ L'insertion dans la base a échoué.";
    } else {

        header("Location: ../../vue/confirmationReservation.php");
        exit;
    }

} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
    exit;
}
?>
