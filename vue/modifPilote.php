<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/repository/PilotesRepository.php';
require_once '../src/modele/Pilotes.php';

use bdd\Bdd;

if (!isset($_GET['id_pilote'])) {
    die("ID du vol manquant.");
}

$idPilote = (int)$_GET['id_pilote'];

$bdd = new Bdd();
$db = $bdd->getBdd();

$stmt = $db->prepare("SELECT * FROM pilotes WHERE id_pilote = :id_pilote");
$stmt->execute([':id_pilote' => $idPilote]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Vol introuvable.");
}
?>

<link href="../assets/css/modif.css" rel="stylesheet">
<form action="../src/traitement/gestionPilote.php" method="post">
    <h1><u>Modification Pilote</u></h1>
    <input type="hidden" name="id_pilote" value="<?= $data['id_pilote'] ?>">

    <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($data['nom']) ?>"></label><br>
    <label>Prénom : <input type="text" name="prenom" value="<?= htmlspecialchars($data['prenom']) ?>"></label><br>
    <label for="conges">Disponible ?</label>
    <select name="conges" id="conges" >
        <option value="oui">Disponible</option>
        <option value="non">Indisponible</option>
    </select>


    <button type="submit">Modifier</button>
</form>



