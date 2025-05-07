<?php

require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_pilote'])) {
    die("ID manquant.");
}

$id = (int)$_GET['id_pilote'];

$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();

$stmt = $pdo->prepare("DELETE FROM pilotes WHERE id_pilote = ?");
$stmt->execute([$id]);

header("Location: listePilotes.php");
exit;

