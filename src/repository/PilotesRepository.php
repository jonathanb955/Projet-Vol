<?php

namespace repository;
require_once __DIR__ . '/../bdd/Bdd.php';

use bdd\Bdd;
use modele\Pilotes;



class PilotesRepository{

    public function ajoutPilote(Pilotes $pilotes) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO pilotes (nom, prenom, conges, ref_avion, ref_vol) VALUES (:nom, :prenom, :conges, :ref_avion, :ref_vol)');
        $req->execute([
            'nom' => $pilotes->getNomPilote(),
            'prenom' => $pilotes->getPrenomPilote(),
            'conges' => $pilotes->getConges(),
           'ref_avion' => $pilotes->getRefAvion(),
            'ref_vol' => $pilotes->getRefVol(),


        ]);
        return $pilotes;
    }

    public function modifPilote(Pilotes $pilotes) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE pilotes 
        SET nom = :nom, 
            prenom = :prenom,
            conges = :conges,
            ref_avion = :ref_avion,
            ref_vol = :ref_vol
        WHERE id_pilote = :id_pilote');
        $req->execute([
            'id_pilote' => $pilotes->getIdPilote(),
            'nom' => $pilotes->getNomPilote(),
            'prenom' => $pilotes->getPrenomPilote(),
            'conges' => $pilotes->getConges(),
            'ref_avion' => $pilotes->getRefAvion(),
            'ref_vol' => $pilotes->getRefVol(),
        ]);

        return $pilotes;
    }

}