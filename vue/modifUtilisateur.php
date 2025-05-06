<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/repository/UtilisateurRepository.php';
require_once '../src/modele/Utilisateur.php';
use modele\Utilisateur;
use bdd\Bdd;

if (!isset($_GET['id_utilisateur'])) {
    die("ID manquant.");
}

$idUtilisateur = (int)$_GET['id_utilisateur'];

$repo = new UtilisateurRepository();
$bdd = new Bdd();
$db = $bdd->getBdd();
$stmt = $db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
$stmt->execute([':id_utilisateur' => $idUtilisateur]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Utilisateur non trouvé.");
}
?>

<link href="../assets/css/modif.css" rel="stylesheet">
<form action="../src/traitement/gestionUtilisateurs.php" method="post">
    <h1><u>Modication Utilisateur</u></h1>
    <input type="hidden" name="id_utilisateur" value="<?= $data['id_utilisateur'] ?>">
    <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($data['nom']) ?>"></label><br>
    <label>Prénom : <input type="text" name="prenom" value="<?= htmlspecialchars($data['prenom']) ?>"></label><br>
    <label>Date de naissance : <input type="date" name="date_naissance" value="<?= $data['date_naissance'] ?>"></label><br>
    <label>Ville de résidence : <input type="text" name="ville_residence" value="<?= htmlspecialchars($data['ville_residence']) ?>"></label><br>
    <label>Email : <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>"></label><br>
    <label>Role : <input type="text" name="role" value="<?= htmlspecialchars($data['role']) ?>"></label><br>
    <button type="submit" name="modifier">Modifier</button>
</form>
