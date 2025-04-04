<?php

namespace repository;

use modele\Vols;

class VolsRepository
{
    public function recupererVols(){
        $vols = [];
        $bdd = new Bdd();
        $datebase = $bdd ->getBdd();
        $req = $datebase->prepare('SELECT * FROM vols');
        $req->execute();
        $volsBdd = $req->fetchAll();
        foreach($volsBdd as $volBdd){
            $vols[] = new Vols([
                'idVols' => $volBdd['id_vol'],
                'destination' => $volBdd['destination'],
                'heure_arrivee' => $volBdd['heure_arrivee'],
                'ville_arrivee' => $volBdd['ville_arrivee'],
                'heure_depart' => $volBdd['heure_depart'],
            ]);
        }
        return $vols;
    }
    public function deleteVols(Vols $vol){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM vols WHERE id_vol = :id_vol");
        $req->execute(array(
            "id_vol"=>$vol->getIdVols()
        ));
        return $vol;
    }
    public function recupererInfoUniqueVols(Vols $vol){
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT * FROM vols WHERE id_vol = :id_vol');
        $req->execute(array(
            "id_vol" => $vol->getIdVols()
        ));
        $volsBdd = $req->fetch();
        return new Vols([
            'idVols' => $volsBdd['id_vol'],
            'destination' => $volsBdd['destination'],
            'heure_arrivee' => $volsBdd['heure_arrivee'],
            'ville_arrivee' => $volsBdd['ville_arrivee'],
            'heure_depart' => $volsBdd['heure_depart'],
        ]);

    }
    public function updateVols(Vols $vol) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE vols SET destination = :destination, heure_depart = :heure_depart, heure_arrivee = :heure_arrivee, ville_arrivee = :ville_arrivee, ref_reservation = :ref_reservation, ref_avion = :ref_avion, ref_pilote =: ref_pilote WHERE id_vol = :id_vol');
        $vols = $req->execute([
            'id_vol' => $vol->getIdVols(),
            'destination' => $vol->getDestination(),
            'heure_arrivee' => $vol->getHeure_arrivee(),
            'ville_arrivee' => $vol->getVille_arrivee(),
            'heure_depart' => $vol->getHeure_depart()
        ]);
        return $vol;
    }
    public function ajoutVols(Vols $vol) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO vol (destination,	heure_depart,	heure_arrivee,	ville_arrivee) VALUES (:destination, :heure_depart, :heure_arrivee, :ville_arrivee)');
        $req->execute([
            'destination' => $vol->getDestination(),
            'heure_depart' => $vol->getHeure_depart(),
            'heure_arrivee' => $vol->getHeure_arrivee(),
            'ville_arrivee' => $vol->getVille_arrivee(),

        ]);
        return $vol;
    }


}