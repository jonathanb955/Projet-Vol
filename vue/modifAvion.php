<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/repository/AvionRepository.php';
require_once '../src/modele/Avion.php';

use bdd\Bdd;

if (!isset($_GET['id_avion'])) {
    die("ID du vol manquant.");
}

$idAvion = (int)$_GET['id_avion'];

$bdd = new Bdd();
$db = $bdd->getBdd();

$stmt = $db->prepare("SELECT * FROM avions WHERE id_avion = :id_avion");
$stmt->execute([':id_avion' => $idAvion]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Vol introuvable.");
}
?>

<link href="../assets/css/modif.css" rel="stylesheet">
<form action="../src/traitement/gestionAvion.php" method="post">
    <h1><u>Modification Avion</u></h1>
    <input type="hidden" name="id_avion" value="<?= $data['id_avion'] ?>">

    <label>Modèle : <input type="text" name="modele" value="<?= htmlspecialchars($data['modele']) ?>"></label><br>
    <label>Capacités : <input type="text" name="capacite" value="<?= htmlspecialchars($data['capacite']) ?>"></label><br>
    <label>Localisation de l'avion : <input type="text" name="localisation_avion" value="<?= $data['localisation_avion'] ?>"></label><br>


    <button type="submit">Modifier</button>
</form>


