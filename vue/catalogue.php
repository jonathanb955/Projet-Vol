<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des Vols</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>
<h1 class="title">✈️ <u>Nos vols disponibles</u>✈️</h1>


<div class="catalogue">

    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');


    $req = $pdo->query('SELECT * FROM vols');


    while ($vol = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="film-card">';
        echo '<img src="' . htmlspecialchars($vol['photo']) . '" alt="Image avion">';
        echo '<div class="film-info">';
        echo '<u><h2>Destination: ' . htmlspecialchars($vol['destination']) . '</h2></u>';
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($vol['description']) . '</p>';
        echo '<form action="reservation.php" method="get">
    <button type="submit" class="btn btn-dark" name="vol_id" value="' . $vol['id_vol'] . '">En savoir plus</button>
</form>';
        echo '</div>';
        echo '</div>';
    }
    ?>


</div>

</body>
</html>

