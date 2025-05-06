<?php

require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_vol'])) {
    die("ID manquant.");
}

$id = (int)$_GET['id_vol'];

$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();

$stmt = $pdo->prepare("DELETE FROM vols WHERE id_vol = ?");
$stmt->execute([$id]);

header("Location: listeVols.php");
exit;
