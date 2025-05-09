<?php

session_start();


if (isset($_SESSION['id_utilisateur'])) {
    $id_utilisateur = $_SESSION['id_utilisateur'];
} else {
    echo 'Utilisateur non connecté.';
    exit;
}


if (isset($_GET['vol_id'])) {
    $id_vol = $_GET['vol_id'];


    try {
        $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }

    $stmt = $pdo->prepare('SELECT * FROM vols WHERE id_vol = :id');
    $stmt->bindParam(':id', $id_vol, PDO::PARAM_INT);
    $stmt->execute();
    $vol = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($vol) {
        echo '<h2>✅ Réservation réussie !</h2>';
        echo '<p>Vous avez réservé un vol vers <strong>' . htmlspecialchars($vol['destination']) . '</strong>.</p>';

        try {
            $update = $pdo->prepare("UPDATE utilisateur SET ref_vol = :id_vol WHERE id_utilisateur = :id_utilisateur");
            $update->bindParam(':id_vol', $id_vol, PDO::PARAM_INT);
            $update->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $update->execute();

            if ($update->rowCount() > 0) {
                echo '<p>Votre réservation a été enregistrée avec succès !</p>';
            } else {
                echo '<p>❌ Une erreur est survenue. Votre réservation n\'a pas pu être enregistrée.</p>';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour de la réservation : ' . $e->getMessage();}
    } else {
        echo '<p>❌ Le vol demandé n\'existe pas dans la base de données.</p>';
    }
} else {
    echo '<p>❌ Aucun vol sélectionné pour la réservation.</p>';
}
?>
