<?php
// Démarrer la session pour récupérer l'ID de l'utilisateur connecté
session_start();

// Vérifie si l'utilisateur est connecté et récupère son ID
if (isset($_SESSION['id_utilisateur'])) {
    $id_utilisateur = $_SESSION['id_utilisateur'];
} else {
    echo 'Utilisateur non connecté.';
    exit;
}

// Vérifie si l'ID du vol est passé dans l'URL
if (isset($_GET['vol_id'])) {
    $id_vol = $_GET['vol_id'];  // Récupère l'ID du vol

    // Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=projet_vol;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }

    // Vérifie si le vol avec l'ID existe
    $stmt = $pdo->prepare('SELECT * FROM vols WHERE id_vol = :id');
    $stmt->bindParam(':id', $id_vol, PDO::PARAM_INT);
    $stmt->execute();
    $vol = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($vol) {
        // Si le vol existe, on peut procéder à la réservation
        echo '<h2>✅ Réservation réussie !</h2>';
        echo '<p>Vous avez réservé un vol vers <strong>' . htmlspecialchars($vol['destination']) . '</strong>.</p>';

        // Mise à jour de la table utilisateur avec le ref_vol
        try {
            $update = $pdo->prepare("UPDATE utilisateur SET ref_vol = :id_vol WHERE id_utilisateur = :id_utilisateur");
            $update->bindParam(':id_vol', $id_vol, PDO::PARAM_INT);
            $update->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $update->execute();

            if ($update->rowCount() > 0) {
                echo '<p>Votre réservation a été enregistrée avec succès !</p>';
            } else {
                echo '<p>❌ Une erreur est survenue. Votre réservation n\'a pas pu être enregistrée.</p>';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour de la réservation : ' . $e->getMessage();
        }

    } else {
        // Si le vol n'existe pas
        echo '<p>❌ Le vol demandé n\'existe pas dans la base de données.</p>';
    }
} else {
    // Si l'ID du vol n'est pas passé dans l'URL
    echo '<p>❌ Aucun vol sélectionné pour la réservation.</p>';
}
?>
