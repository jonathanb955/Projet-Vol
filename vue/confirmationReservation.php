<?php
session_start();


if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] !== true) {
    header("Location: pageConnexion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Réservation</title>
    <link rel="stylesheet" href="../assets/css/reservation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <h1 class="text-success">✅ Réservation confirmée !</h1>
    <p class="lead">Merci pour votre réservation. Vous pouvez consulter vos réservations dans votre espace client.</p>

    <div class="mt-4">
        <a href="catalogue.php" class="btn btn-primary">Retour au catalogue</a>
        <a href="espaceClient.php" class="btn btn-success">Voir mes réservations</a>
    </div>
</div>
</body>
</html>
