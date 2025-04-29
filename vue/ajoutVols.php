<?php
$today = date("Y-m-d");

?>
<?php


if (isset($_GET['error'])) {
    if ($_GET['error'] == 'champs_vides') {
        echo '<p style="color: red;">Veuillez remplir tous les champs.</p>';
    } elseif ($_GET['error'] == 'erreur_bdd') {
        echo '<p style="color: red;">Erreur lors de l\'insertion en base de données.</p>';
    } else {
        echo '<p style="color: red;">Une erreur est survenue.</p>';
    }
}


if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<p style="color: green;">Vol ajouté avec succès !</p>';
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter plusieurs vols</title>
    <link rel="stylesheet" href="../assets/css/ajoutVols.css">
</head>
<body>

<div class="form-container">
    <h1><u>Ajouter des Vols ✈️</u></h1>


    <form action="../src/traitement/AjoutVols.php" method="POST">



        <label>Destination :</label>
        <input type="text" name="destination"  required>

        <label>Date départ:</label>
        <input type="date" name="date_depart"  min="<?php echo $today; ?>" required>

        <label>Date d'arrivée:</label>
        <input type="date" name="date_arrivee"  min="<?php echo $today; ?>" required>

        <label>Durée du trajet :</label>
        <input type="text" name="duree_trajet"  required>

        <label>Heure de départ :</label>
        <input type="time" name="heure_depart"  required>

        <label>Heure d'arrivée :</label>
        <input type="time" name="heure_arrivee"  required>

        <label>Lieu de départ :</label>
        <input type="text" name="ville_depart"  required>

        <label>Lieu d'arrivée :</label>
        <input type="text" name="ville_arrivee"  required>

        <label for="photo">Lien de la photo de la destination :</label>
        <input type="text" name="photo" id="photo"  required>

        <button type="submit">Soumettre</button>
    </form>
</div>

</body>
</html>
