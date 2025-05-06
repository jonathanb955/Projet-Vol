<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des Vols</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>
<h1 class="title">✈️ <u>Nos vols disponibles</u>✈️</h1>


<form action="" method="GET">
    <input type="text" name="search" placeholder="Rechercher une destination..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Rechercher</button>
</form>

<div class="catalogue">

    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');


    $search = isset($_GET['search']) ? $_GET['search'] : '';


    if ($search) {

        $req = $pdo->prepare('SELECT DISTINCT destination, description, photo FROM vols WHERE destination LIKE :search');
        $req->execute(['search' => '%' . $search . '%']);
    } else {

        $req = $pdo->query('SELECT DISTINCT destination, description, photo FROM vols');
    }


    while ($destination = $req->fetch(PDO::FETCH_ASSOC)) {
        $dest = $destination['destination'];
        $desc = $destination['description'];
        $photo = $destination['photo'];
        echo '<div class="film-card">';
        echo '<img src="' . htmlspecialchars($photo) . '" alt="Photo de ' . htmlspecialchars($dest) . '" class="destination-photo">';
        echo '<div class="film-info">';
        echo '<u><h2>Destination: ' . htmlspecialchars($dest) . '</h2></u>';
        echo '<p>' . htmlspecialchars($desc) . '</p>';
        echo '<form action="reservation.php" method="get">
              <button type="submit" class="btn btn-dark" name="destination" value="' . htmlspecialchars($dest) . '">Voir les vols</button>
          </form>';
        echo '</div>';
        echo '</div>';
    }

    ?>

</div>

</body>
</html>
