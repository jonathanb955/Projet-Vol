<?php
require_once '../repository/PilotesRepository.php';
require_once '../modele/Pilotes.php';

use modele\Pilotes;
use repository\PilotesRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id_pilote'])) {
        die("ID du vol manquant.");
    }

    $pilote = new Pilotes([
        'idPilote' => $_POST['id_pilote'],
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'conges' => $_POST['conges'] ?? '',


    ]);

    $repo = new PilotesRepository();
    $repo->modifPilote($pilote);

    header('Location: ../../vue/modifReussitePilote.php');
    exit;
} else {
    die("Méthode non autorisée.");
}


