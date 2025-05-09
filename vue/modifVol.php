<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/repository/VolsRepository.php';
require_once '../src/modele/Vols.php';

use bdd\Bdd;

if (!isset($_GET['id_vol'])) {
    die("ID du vol manquant.");
}

$idVol = (int)$_GET['id_vol'];

$bdd = new Bdd();
$db = $bdd->getBdd();

$stmt = $db->prepare("SELECT * FROM vols WHERE id_vol = :id_vol");
$stmt->execute([':id_vol' => $idVol]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Vol introuvable.");
}
?>
<br>
<br>
<link href="../assets/css/modif.css" rel="stylesheet">
<form action="../src/traitement/gestionVols.php" method="post">
    <h1><u>Modification Vol</u></h1>
    <input type="hidden" name="id_vol" value="<?= $data['id_vol'] ?>">

    <label>Destination : <input type="text" name="destination" value="<?= htmlspecialchars($data['destination']) ?>"></label><br>
    <label>Description : <input type="text" name="description" value="<?= htmlspecialchars($data['description']) ?>"></label><br>
    <label>Prix du billet : <input type="text" name="prix_billet_init" value="<?= htmlspecialchars($data['prix_billet_init']) ?>"></label><br>
    <label>Date de départ : <input type="date" name="date_depart" value="<?= $data['date_depart'] ?>"></label><br>
    <label>Date d'arrivée : <input type="date" name="date_arrivee" value="<?= $data['date_arrivee'] ?>"></label><br>
    <label>Durée trajet : <input type="text" name="duree_trajet" value="<?= htmlspecialchars($data['duree_trajet']) ?>"></label><br>
    <label>Heure départ : <input type="time" name="heure_depart" value="<?= $data['heure_depart'] ?>"></label><br>
    <label>Heure arrivée : <input type="time" name="heure_arrivee" value="<?= $data['heure_arrivee'] ?>"></label><br>
    <label>Ville de départ : <input type="text" name="ville_depart" value="<?= htmlspecialchars($data['ville_depart']) ?>"></label><br>
    <label>Ville d'arrivée : <input type="text" name="ville_arrivee" value="<?= htmlspecialchars($data['ville_arrivee']) ?>"></label><br>
    <label>Photo de la destination : <input type="text" name="photo" value="<?= htmlspecialchars($data['photo']) ?>"></label><br>
    <label>Réf Avion : <input type="text" name="ref_avion" value="<?= htmlspecialchars($data['ref_avion']) ?>"></label><br>
    <label>Réf Pilote : <input type="text" name="ref_pilote" value="<?= htmlspecialchars($data['ref_pilote']) ?>"></label><br>

    <button type="submit">Modifier</button>
    <p class="footer"> <a href="pageAdmin.php">Retourner à l'accueil</a></p>
</form>
<br>
<br>
