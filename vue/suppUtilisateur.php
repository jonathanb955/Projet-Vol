<?php
require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_utilisateur'])) {
    die("ID manquant.");
}

$id = (int) $_GET['id_utilisateur'];

$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();

$stmt = $pdo->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
$stmt->execute([$id]);

header("Location: listeUtilisateurs.php");
exit;
