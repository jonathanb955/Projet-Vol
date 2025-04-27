<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des Vols</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>

<h1 class="title">✈️ Nos Vols Disponibles</h1>

<div class="catalogue">

    <?php
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');

    // Requête pour récupérer tous les vols
    $req = $pdo->query('SELECT * FROM vols');

    // Parcourir les vols et afficher chaque vol
    while ($vol = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="film-card">'; // Tu peux renommer en "vol-card" si tu veux
        echo '<img src="../assets/img/' . (!empty($vol['photo']) ? htmlspecialchars($vol['photo']) : 'default.jpg') . '" alt="Image avion">';
        echo '<div class="film-info">';
        echo '<h2>Destination : ' . htmlspecialchars($vol['destination']) . '</h2>';
        echo '<p><strong>Date de départ :</strong> ' . htmlspecialchars($vol['date_depart']) . '</p>';
        echo '<p><strong>Date arrivé:</strong> ' . htmlspecialchars($vol['date_arrivee']) . '</p>';
        echo '<p><strong>Durée trajet :</strong> ' . htmlspecialchars($vol['duree_trajet']) . '</p>';
        echo '<p><strong>Départ :</strong> ' . htmlspecialchars($vol['heure_depart']) . '</p>';
        echo '<p><strong>Arrivée :</strong> ' . htmlspecialchars($vol['heure_arrivee']) . '</p>';
        echo '<p><strong>Ville de départ :</strong> ' . htmlspecialchars($vol['ville_depart']) . '</p>';
        echo '<p><strong>Ville d\'arrivée :</strong> ' . htmlspecialchars($vol['ville_arrivee']) . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>

</body>
</html>
