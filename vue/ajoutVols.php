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



        <label>Destination (ville,pays):</label>
        <input type="text" name="destination"  required>


        <label>Description du lieu :</label>
        <input type="text" name="description"  required>

        <label>Prix du billet :</label>
        <input type="text" name="prix_billet_init"  required>

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

        <label>Lieu de départ (aéroport, ville-pays):</label>
        <input type="text" name="ville_depart"  required>

        <label>Lieu d'arrivée (aéroport, ville-pays):</label>
        <input type="text" name="ville_arrivee"  required>

        <label for="photo">Lien de la photo de la destination :</label>
        <input type="text" name="photo" id="photo"  required>


        <label for="ref_avion">Sélectionner un avion :</label>
        <select name="ref_avion" id="ref_avion" required>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');

            $stmt = $pdo->query("SELECT id_avion, modele FROM avions");
            while ($avion = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $avion['id_avion'] . "'>" . $avion['modele'] . "</option>";
            }
            ?>
        </select>

        <label for="ref_pilote">Sélectionner un pilote :</label>
        <select name="ref_pilote" id="ref_pilote" required>
            <?php
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');

            // Requête pour obtenir les pilotes dont la colonne conges n'est pas 'Indisponible'
            $stmt = $pdo->query("SELECT id_pilote, nom, prenom FROM pilotes WHERE conges != 'Indisponible'");

            // Vérification si des pilotes sont disponibles
            if ($stmt->rowCount() > 0) {
                while ($pilote = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $pilote['id_pilote'] . "'>" . $pilote['nom'] . " " . $pilote['prenom'] . "</option>";
                }
            } else {
                // Si aucun pilote n'est disponible
                echo "<option disabled>Aucun pilote disponible</option>";
            }
            ?>
        </select>



        <button type="submit">Soumettre</button>
        <p class="footer"> <a href="pageAdmin.php">Retourner à l'accueil</a></p>
    </form>
</div>

</body>
</html>
