<?php

namespace repository;
require_once __DIR__ . '/../bdd/Bdd.php';

use bdd\Bdd;
use modele\Avion;


class AvionRepository
{
    public function ajoutAvion(Avion $avion) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO avions (modele, capacite, localisation_avion) VALUES (:modele, :capacite, :localisation_avion)');
        $req->execute([
            'modele' => $avion->getModeleAvion(),
            'capacite' => $avion->getCapaciteAvion(),
            'localisation_avion' => $avion->getLocalisationAvion()


        ]);
        return $avion;
    }
    public function modifAvion(Avion $avion) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE avions 
        SET modele = :modele, 
            capacite = :capacite, 
            localisation_avion = :localisation_avion 
        WHERE id_avion = :id_avion');

        $req->execute([
            'id_avion' => $avion->getIdAvion(),
            'modele' => $avion->getModeleAvion(),
            'capacite' => $avion->getCapaciteAvion(),
            'localisation_avion' => $avion->getLocalisationAvion(),
        ]);

        return $avion;
    }

}