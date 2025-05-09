<?php
require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_utilisateur'])) {
    die("ID manquant.");
}

$idUser = (int) $_GET['id_utilisateur'];

$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();

$stmtReservations = $pdo->prepare("DELETE FROM reservation WHERE ref_utilisateur = ?");
$stmtReservations->execute([$idUser]);

$stmtUser = $pdo->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
$stmtUser->execute([$idUser]);

header("Location: listeUtilisateurs.php");
exit;
