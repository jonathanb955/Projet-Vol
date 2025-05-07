<?php

require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_avion'])) {
    die("ID manquant.");
}

$id = (int)$_GET['id_avion'];

$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();

$stmt = $pdo->prepare("DELETE FROM avions WHERE id_avion = ?");
$stmt->execute([$id]);

header("Location: listeAvions.php");
exit;

