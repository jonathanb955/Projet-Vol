<?php

use modele\Avion;
use repository\AvionRepository;
use repository\PilotesRepository;

require_once __DIR__ . '/../bdd/Bdd.php';
require_once "../modele/Pilotes.php";
require_once "../repository/PilotesRepository.php";

if (!empty($_POST["nom"]) && !empty($_POST["prenom"])  && !empty($_POST["conges"])) {



    $nouveauPilote = new \modele\Pilotes([
        'nomPilote' => $_POST["nom"],
        'prenomPilote' => $_POST["prenom"],
        'conges' => $_POST["conges"] ,

    ]);

    $piloteRepository = new pilotesRepository();

    try {
        $piloteRepository->ajoutPilote($nouveauPilote);
        header("Location: ../../vue/pageAjoutPiloteReussit.html");
        exit;
    } catch (Exception $e) {
        die('Erreur lors de l\'insertion en BDD : ' . $e->getMessage());
    }

} else {
    header("Location: ../../vue/ajoutPilote.php?error=champs_vides");
    exit;
}
?>

