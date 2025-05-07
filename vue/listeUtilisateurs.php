<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
require_once '../src/bdd/Bdd.php';
$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();
$query = "SELECT * FROM utilisateur";
$stmt = $pdo->prepare($query);
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4><strong>Liste des utilisateurs</strong></h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Ville de résidence</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur['id_utilisateur']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['date_naissance']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['ville_residence']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['email']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['role']) ?></td>
                        <td class="text-center">
                            <a href="modifUtilisateur.php?id_utilisateur=<?= $utilisateur['id_utilisateur'] ?>" class="btn btn-warning btn-sm me-2">Modifier</a>
                            <a href="suppUtilisateur.php?id_utilisateur=<?= $utilisateur['id_utilisateur'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="pageAdmin.php" method="get">
    <button type="submit" class="btn btn-light partenaire" style="background-color: #0d6efd ; color: white; text-align: center">Retour</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
