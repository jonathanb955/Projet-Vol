<?php
require_once '../repository/AvionRepository.php';
require_once '../modele/Avion.php';

use modele\Avion;
use repository\AvionRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id_avion'])) {
        die("ID du vol manquant.");
    }

    $avion = new Avion([
        'idAvion' => $_POST['id_avion'] ?? null,
        'modeleAvion' => $_POST['modele'] ?? '',
        'capaciteAvion' => $_POST['capacite'] ?? '',
        'localisationAvion' => $_POST['localisation_avion'] ?? '',

    ]);

    $repo = new AvionRepository();
    $repo->modifAvion($avion);

    header('Location: ../../vue/modifReussiteAvion.html');
    exit;
} else {
    die("Méthode non autorisée.");
}

