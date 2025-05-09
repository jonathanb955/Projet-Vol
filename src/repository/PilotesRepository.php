<?php

namespace repository;
require_once __DIR__ . '/../bdd/Bdd.php';

use bdd\Bdd;
use modele\Pilotes;



class PilotesRepository{

    public function ajoutPilote(Pilotes $pilotes) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO pilotes (nom, prenom, conges) VALUES (:nom, :prenom, :conges)');
        $req->execute([
            'nom' => $pilotes->getNomPilote(),
            'prenom' => $pilotes->getPrenomPilote(),
            'conges' => $pilotes->getConges(),



        ]);
        return $pilotes;
    }

    public function modifPilote(Pilotes $pilotes) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE pilotes 
        SET nom = :nom, 
            prenom = :prenom,
            conges = :conges
        WHERE id_pilote = :id_pilote');
        $req->execute([
            'id_pilote' => $pilotes->getIdPilote(),
            'nom' => $pilotes->getNomPilote(),
            'prenom' => $pilotes->getPrenomPilote(),
            'conges' => $pilotes->getConges(),

        ]);

        return $pilotes;
    }

}