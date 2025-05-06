<?php

namespace repository;

use bdd\Bdd;
use modele\Avion;
use modele\Vols;

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


}