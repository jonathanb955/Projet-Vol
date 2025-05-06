<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de Vol</title>
    <link rel="stylesheet" href="../assets/css/reservation.css">
</head>
<body>

<?php
if (isset($_GET['destination'])) {
    $destination = $_GET['destination'];

    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');


    $query = 'SELECT * FROM vols WHERE destination = :destination';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
    $stmt->execute();

    $vols = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($vols) {
        echo '<h1 class="title">✈️ <u>Réservation pour ' . htmlspecialchars($destination) . '</u>✈️</h1>';

        foreach ($vols as $vol) {
            echo '<div class="film-card">';
            echo '<img src="' . htmlspecialchars($vol['photo']) . '" alt="Image avion">';
            echo '<div class="film-info">';
            echo '<u><h2>Destination: ' . htmlspecialchars($vol['destination']) . '</h2></u>';
            echo '<p><strong>Date de départ :</strong> ' . htmlspecialchars($vol['date_depart']) . '</p>';
            echo '<p><strong>Date arrivée :</strong> ' . htmlspecialchars($vol['date_arrivee']) . '</p>';
            echo '<p><strong>Durée trajet :</strong> ' . htmlspecialchars($vol['duree_trajet']) . '</p>';
            echo '<p><strong>Heure départ :</strong> ' . htmlspecialchars($vol['heure_depart']) . '</p>';
            echo '<p><strong>Heure arrivée :</strong> ' . htmlspecialchars($vol['heure_arrivee']) . '</p>';
            echo '<p><strong>Lieu de départ :</strong> ' . htmlspecialchars($vol['ville_depart']) . '</p>';
            echo '<p><strong>Lieu d\'arrivée :</strong> ' . htmlspecialchars($vol['ville_arrivee']) . '</p>';
            echo '<form action="pageReservation.php" method="get">
               <button type="submit" class="btn btn-dark" name="vol_id" value="' . $vol['id_vol'] . '">Réserver</button>
                  </form>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>Aucun vol trouvé pour cette destination.</p>';
    }
}
?>

</body>
</html>
