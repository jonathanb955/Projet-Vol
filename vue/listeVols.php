<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des vols</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="listeVols.css">
</head>
<body>

<?php
require_once '../src/bdd/Bdd.php';
$bdd = new \bdd\Bdd();
$pdo = $bdd->getBdd();
$query = "SELECT * FROM vols";
$stmt = $pdo->prepare($query);
$stmt->execute();
$vols = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4><strong>Liste des vols</strong></h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                <tr>
                    <th>ID Vol</th>
                    <th>Destination</th>
                    <th>Lieu départ</th>
                    <th>Lieu arrivée</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Durée</th>
                    <th>Réservation</th>
                    <th>Avion</th>
                    <th>Pilote</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($vols as $vol): ?>
                    <tr>
                        <td><?= htmlspecialchars($vol['id_vol']) ?></td>
                        <td><?= htmlspecialchars($vol['destination']) ?></td>
                        <td><?= htmlspecialchars($vol['ville_depart']) ?></td>
                        <td><?= htmlspecialchars($vol['ville_arrivee']) ?></td>
                        <td><?= htmlspecialchars($vol['heure_depart']) ?></td>
                        <td><?= htmlspecialchars($vol['heure_arrivee']) ?></td>
                        <td><?= htmlspecialchars($vol['duree_trajet']) ?></td>
                        <td> <?= htmlspecialchars($vol['ref_reservation']) ?></td>
                        <td><?= htmlspecialchars($vol['ref_avion']) ?></td>
                        <td><?= htmlspecialchars($vol['ref_pilote']) ?></td>
                        <td class="text-center">
                            <a href="modifVol.php?id_vol=<?= $vol['id_vol'] ?>" class="btn btn-warning btn-sm me-2">Modifier</a>
                            <a href="suppVol.php?id_vol=<?= $vol['id_vol'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce vol ?');">Supprimer</a>

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
