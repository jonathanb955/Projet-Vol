
<?php

use bdd\Bdd;

session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
$connecte = isset($_SESSION['connexion']) && $_SESSION['connexion'] === true;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de Vol</title>
    <link rel="stylesheet" href="../assets/css/reservation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="web site icon" type="png" href="https://previews.123rf.com/images/jovanas/jovanas1602/jovanas160201149/52031915-logo-avi%C3%B3n-volando-alrededor-del-planeta-tierra-azul.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="d-flex justify-content-center align-items-center position-relative">

        <form action="catalogue.php" method="get" class="position-absolute start-0 ms-3">
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Retour
            </button>
        </form>

        <div class="btn-group position-absolute end-0 me-3">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-square"></i>
            </button>
            <ul class="dropdown-menu text-center">
                <?php if ($connecte): ?>
                    <span class="dropdown-item-text"><strong>Bienvenue</strong><br><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></span>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="espaceClient.php"><i class="bi bi-person-circle"></i> Espace Client</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?logout=true"><i class="bi bi-box-arrow-right"></i> Déconnexion</a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="pageConnexion.php">Connexion <i class="bi bi-person-bounding-box"></i></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="pageInscription.php">Inscription <i class="bi bi-person-plus-fill"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>

        <h1 class="mb-0" style="text-transform: capitalize">Aéroport International JBSkyTravel</h1>
    </div>
</header>

<?php
if (isset($_GET['destination'])) {

    if (!$connecte) {
        if (!$connecte) {
            echo '
    <div class="alert alert-warning text-center mt-4" role="alert">
        <p>🚫 Vous devez être connecté pour réserver un vol.</p>
        <a href="pageConnexion.php" class="btn btn-primary mt-2">Se connecter</a>
    </div>';
            exit;
        }

    }

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
    echo '<u><h5>Destination: ' . htmlspecialchars($vol['destination']) . '</h5></u>';
    echo '<p><strong>Date de départ :</strong> ' . htmlspecialchars($vol['date_depart']) . '</p>';
    echo '<p><strong>Date arrivée :</strong> ' . htmlspecialchars($vol['date_arrivee']) . '</p>';
    echo '<p><strong>Durée trajet :</strong> ' . htmlspecialchars($vol['duree_trajet']) . '</p>';
    echo '<p><strong>Heure départ :</strong> ' . htmlspecialchars($vol['heure_depart']) . '</p>';
    echo '<p><strong>Heure arrivée :</strong> ' . htmlspecialchars($vol['heure_arrivee']) . '</p>';
    echo '<p><strong>Lieu de départ :</strong> ' . htmlspecialchars($vol['ville_depart']) . '</p>';
    echo '<p><strong>Lieu d\'arrivée :</strong> ' . htmlspecialchars($vol['ville_arrivee']) . '</p>';
    echo '<form action="../src/traitement/AjoutReservation.php" method="get">
            <input type="hidden" name="id_vol" value="' . htmlspecialchars($vol['id_vol']) . '">
            <button type="submit" class="btn btn-dark">Réserver</button>
          </form>';
    echo '</div>';
    echo '</div>';
}

        }
    } else {
        echo '<p>Aucun vol trouvé pour cette destination.</p>';

}
?>

</body>
</html>
