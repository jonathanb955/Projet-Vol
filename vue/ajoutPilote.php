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
    <title>Ajouts de pilotes</title>
    <link rel="stylesheet" href="../assets/css/ajoutAvion.css">
</head>

<body>

<div class="form-container">
    <h1><u>Ajouter des Pilotes✈️</u></h1>


    <form action="../src/traitement/AjoutPilote.php" method="POST">



        <label>Nom :</label>
        <input type="text" name="nom"  required>

        <label>Prénom :</label>
        <input type="text" name="prenom"  required>

        <label for="conges">Disponible ?</label>
        <select name="conges" id="conges">
            <option value="Disponible">Disponible</option>
            <option value="Indisponible">Indisponible</option>
        </select>





        <button type="submit">Soumettre</button>
        <p class="footer"> <a href="pageAdmin.php">Retourner à l'accueil</a></p>
    </form>
</div>

</body>
</html>


