<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
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
<div class="card text-center">
    <div class="card-header" style="background-color:#004080">
        <div class="message-case" style="color: white"><h4><em><u><strong>Les vols<i class="bi bi-balloon-fill"></i></strong></u></em></h4></div>
    </div>
    <br>

    <table>
        <tr>
            <th>Vol</th>
            <th>Destination</th>
            <th>Lieu départ</th>
            <th>Lieu arrivée</th>
            <th>Heure de départ</th>
            <th>Heure d'arrivée</th>
            <th>Durée trajet</th>

        </tr>
        <?php
        foreach ($vols as $vol) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($vol['id_vol']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['destination']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['ville_depart']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['ville_arrivee']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['heure_depart']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['heure_arrivee']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['duree_trajet']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>