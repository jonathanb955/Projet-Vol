<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des Vols</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>

<h1 class="title">✈️ <u>Nos Vols Disponibles</u></h1>

<div class="catalogue">

    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');


    $req = $pdo->query('SELECT * FROM vols');


    while ($vol = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="film-card">';
        echo '<img src="' . htmlspecialchars($vol['photo']) . '" alt="Image avion">';
        echo '<div class="film-info">';
        echo '<u><h2>Destination: ' . htmlspecialchars($vol['destination']) . '</h2></u>';
        echo '<p><strong>Date de départ :</strong> ' . htmlspecialchars($vol['date_depart']) . '</p>';
        echo '<p><strong>Date arrivé:</strong> ' . htmlspecialchars($vol['date_arrivee']) . '</p>';
        echo '<p><strong>Durée trajet :</strong> ' . htmlspecialchars($vol['duree_trajet']) . '</p>';
        echo '<p><strong>Heure départ :</strong> ' . htmlspecialchars($vol['heure_depart']) . '</p>';
        echo '<p><strong>Heure arrivée :</strong> ' . htmlspecialchars($vol['heure_arrivee']) . '</p>';
        echo '<p><strong>Lieu de départ :</strong> ' . htmlspecialchars($vol['ville_depart']) . '</p>';
        echo '<p><strong>Lieu d\'arrivée :</strong> ' . htmlspecialchars($vol['ville_arrivee']) . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>

</body>
</html>
