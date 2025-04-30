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
$query = "SELECT * FROM utilisateur";
$stmt = $pdo->prepare($query);
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card text-center">
    <div class="card-header" style="background-color:#004080">
        <div class="message-case" style="color: white"><h4><em><u><strong>Liste des utilisateurs<i class="bi bi-balloon-fill"></i></strong></u></em></h4></div>
    </div>
    <br>
    <table>
        <tr>
            <th>id_utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Ville de résidence</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        <?php
        foreach ($utilisateurs as $utilisateur) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($utilisateur['id_utilisateur']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['date_naissance']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['ville_residence']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['email']) . "</td>";
            echo "<td>" . htmlspecialchars($utilisateur['role']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
