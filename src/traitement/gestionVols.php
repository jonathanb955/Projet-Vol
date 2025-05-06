<?php
require_once '../repository/VolsRepository.php';
require_once '../modele/Vols.php';

use modele\Vols;
use repository\VolsRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id_vol'])) {
        die("ID du vol manquant.");
    }

    $vol = new Vols([
        'idVols' => $_POST['id_vols'] ?? null,
        'destination' => $_POST['destination'] ?? '',
        'description' => $_POST['description'] ?? '',
        'dateDepart' => $_POST['date_depart'] ?? '',
        'dateArrivee' => $_POST['date_arrivee'] ?? '',
        'dureeTrajet' => $_POST['duree_trajet'] ?? '',
        'heureDepart' => $_POST['heure_depart'] ?? '',
        'heureArrivee' => $_POST['heure_arrivee'] ?? '',
        'villeDepart' => $_POST['ville_depart'] ?? '',
        'villeArrivee' => $_POST['ville_arrivee'] ?? '',
        'photo' => $_POST['photo'] ?? '',
        'refReservation' => $_POST['ref_reservation'] ?? '',
        'refAvion' => $_POST['ref_avion'] ?? '',
        'refPilote' => $_POST['ref_pilote'] ?? ''
    ]);

    $repo = new VolsRepository();
    $repo->modifVol($vol);

    header('Location: ../../vue/listeVols.php?success=modif');
    exit;
} else {
    die("Méthode non autorisée.");
}
