<?php

namespace repository;


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


}