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
        $req = $database->prepare('INSERT INTO avions (nom, capacite, localisation_avion) VALUES (:nom, :capacite, :localisation_avion)');
        $req->execute([
            'nom' => $avion->getNomAvion(),
            'capacite' => $avion->getCapaciteAvion(),
            'localisation_avion' => $avion->getLocalisationAvion()


        ]);
        return $avion;
    }


}