<?php
session_start();
$connecte = isset($_SESSION['connexion']) && $_SESSION['connexion'] === true;

if (!$connecte) {
    header("Location: ../../vue/pageConnexion.php");
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');

$id_utilisateur = $_SESSION['id_utilisateur']; // Utilise l'id_utilisateur provenant de la session

// Vérifier si l'utilisateur existe bien dans la base de données
$req = $pdo->prepare("SELECT id_utilisateur, nom, prenom, date_naissance, ville_residence, email FROM utilisateur WHERE id_utilisateur = ?");
$req->execute([$id_utilisateur]);
$client = $req->fetch(PDO::FETCH_ASSOC);

// Vérification si l'utilisateur a été trouvé
if (!$client) {
    echo "❌ Aucun utilisateur trouvé pour l'ID : $id_utilisateur";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mise à jour des informations
    $update = $pdo->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, date_naissance = ?, ville_residence = ?, email = ? WHERE id_utilisateur = ?");
    $update->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['date_naissance'],
        $_POST['ville_residence'],
        $_POST['email'],
        $id_utilisateur
    ]);
    header("Location: espaceClient.php?updated=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Client</title>
    <link href="../assets/css/espaceClient.css" rel="stylesheet">
</head>
<body>
<h1>👤 Mon Espace Client</h1>

<?php if (isset($_GET['updated'])): ?>
    <p>✅ Vos informations ont été mises à jour.</p>
<?php endif; ?>

<form method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($client['prenom']) ?>" required>

    <label for="dateNaissance">Date de Naissance</label>
    <input type="date" id="date_naissance" name="date_naissance" value="<?= htmlspecialchars($client['date_naissance']) ?>" required>

    <label for="villeResidence">Ville de Résidence</label>
    <input type="text" id="ville_residence" name="ville_residence" value="<?= htmlspecialchars($client['ville_residence']) ?>" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>

    <button type="submit">💾 Mettre à jour mes infos</button>
</form>

<h2>Mes Réservations</h2>
<?php
$reservations = $pdo->prepare("SELECT * FROM reservations WHERE id_utilisateur = ?");
$reservations->execute([$id_utilisateur]);
$res = $reservations->fetchAll(PDO::FETCH_ASSOC);

if ($res) {
    foreach ($res as $reservation) {
        echo "<p>Réservation #{$reservation['id']} - Vol : {$reservation['vol']} - Date : {$reservation['date_reservation']}</p>";
        echo "<form method='post' action='annulerReservation.php'>";
        echo "<input type='hidden' name='id_reservation' value='{$reservation['id']}'>";
        echo "<button type='submit'>Annuler</button>";
        echo "</form>";
    }
} else {
    echo "<p>Aucune réservation trouvée.</p>";
}
?>

<form action="../index.php" method="get">
    <button type="submit" class="btn btn-light partenaire" style="background-color: #0d6efd ; color: white; text-align: center">Retour</button>
</form>
</body>
</html>
