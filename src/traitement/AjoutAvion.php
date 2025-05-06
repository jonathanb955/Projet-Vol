<?php

use modele\Avion;
use repository\AvionRepository;

require_once __DIR__ . '/../bdd/Bdd.php';
require_once "../modele/Avion.php";
require_once "../repository/AvionRepository.php";

if (!empty($_POST["modele"]) && !empty($_POST["capacite"]) && !empty($_POST["localisation_avion"])) {

    $nouveauAvion = new Avion([
        'modeleAvion' => $_POST["modele"],
        'capaciteAvion' => $_POST["capacite"],
        'localisationAvion' => $_POST["localisation_avion"]
    ]);

    $avionRepository = new AvionRepository();

    try {
        $avionRepository->ajoutAvion($nouveauAvion);
        header("Location: ../../vue/pageAjoutAvionReussit.html");
        exit;
    } catch (Exception $e) {
        die('Erreur lors de l\'insertion en BDD : ' . $e->getMessage());
    }

} else {
    header("Location: ../../vue/ajoutAvion.php?error=champs_vides");
    exit;
}
?>
