<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des avions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
require_once '../src/bdd/Bdd.php';
$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();
$query = "SELECT * FROM avions";
$stmt = $pdo->prepare($query);
$stmt->execute();
$avions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4><strong>Liste des avions</strong></h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                <tr>
                    <th>ID Avion</th>
                    <th>Modèle</th>
                    <th>Capacités</th>
                    <th>Localisation de l'avion</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($avions as $avion): ?>
                    <tr>
                        <td><?= htmlspecialchars($avion['id_avion']) ?></td>
                        <td><?= htmlspecialchars($avion['modele']) ?></td>
                        <td><?= htmlspecialchars($avion['capacite']) ?></td>
                        <td><?= htmlspecialchars($avion['localisation_avion']) ?></td>
                        <td class="text-center">
                            <a href="modifAvion.php?id_avion=<?= $avion['id_avion'] ?>" class="btn btn-warning btn-sm me-2">Modifier</a>
                            <a href="suppAvion.php?id_avion=<?= $avion['id_avion'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce vol ?');">Supprimer</a>

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
</form>'
</body>
</html>

