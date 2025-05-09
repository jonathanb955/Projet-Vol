
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
    <link rel="stylesheet" href="../assets/css/ajoutAvion.css">
</head>
<body>

<div class="form-container">
    <h1><u>Ajouter des Avions✈️</u></h1>


    <form action="../src/traitement/AjoutAvion.php" method="POST">



        <label>Modèle :</label>
        <input type="text" name="modele"  required>

        <label>Capacités :</label>
        <input type="number" name="capacite"  min="1" required>

        <label>Localisation de l'avion (aéroport, ville-pays) :</label>
        <input type="text" name="localisation_avion"  required>


        <button type="submit">Soumettre</button>
        <p class="footer"> <a href="pageAdmin.php">Retourner à l'accueil</a></p>
    </form>
</div>

</body>
</html>

