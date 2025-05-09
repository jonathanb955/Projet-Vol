<?php
require_once '../src/bdd/Bdd.php';

if (!isset($_GET['id_reservation']) || !isset($_GET['id_utilisateur'])) {
    die("❌ ID de réservation ou utilisateur manquant.");
}

$id_reservation = (int)$_GET['id_reservation'];
$id_utilisateur = (int)$_GET['id_utilisateur'];


$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();


$stmt = $pdo->prepare('
    SELECT v.date_depart
    FROM reservation AS r
    INNER JOIN vols AS v ON r.ref_vol = v.id_vol
    WHERE r.id_reservation = :id_reservation AND r.ref_utilisateur = :id_utilisateur
');
$stmt->execute(['id_reservation' => $id_reservation, 'id_utilisateur' => $id_utilisateur]);
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reservation) {
    die("❌ Réservation introuvable ou vous n'êtes pas autorisé à annuler cette réservation.");
}


$dateDepart = new DateTime($reservation['date_depart']);
$dateAujourdhui = new DateTime();
$interval = $dateAujourdhui->diff($dateDepart)->days;

if ($interval <= 2) {
    die("❌ Vous ne pouvez pas annuler la réservation moins de 2 jours avant le vol.");
}


$stmtDelete = $pdo->prepare('DELETE FROM reservation WHERE id_reservation = :id_reservation');
$stmtDelete->execute(['id_reservation' => $id_reservation]);


header("Location: espaceClient.php?suppr=1");
exit;
?>
