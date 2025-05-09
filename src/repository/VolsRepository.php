<?php

namespace repository;
require_once __DIR__ . '/../bdd/Bdd.php';



use modele\Vols;
use bdd\Bdd;


class VolsRepository
{

    public function ajoutVols(Vols $vol) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO vols (destination, description,	date_depart,date_arrivee,duree_trajet,  heure_depart,	heure_arrivee,	 ville_depart, ville_arrivee, photo, ref_avion,	ref_pilote, prix_billet_init) VALUES (:destination,:description, :date_depart, :date_arrivee, :duree_trajet ,:heure_depart, :heure_arrivee, :ville_depart, :ville_arrivee, :photo, :ref_avion, :ref_pilote, :prix_billet_init	)');
        $req->execute([
            'destination' => $vol->getDestination(),
            'description' => $vol->getDescription(),
            'prix_billet_init' => $vol->getPrixBilletInit(),
            'date_depart' => $vol->getDateDepart(),
            'date_arrivee' => $vol->getDateArrivee(),
            'duree_trajet' => $vol->getDureeTrajet(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrivee' => $vol->getHeureArrivee(),
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrivee' => $vol->getVilleArrivee(),
            'photo' => $vol->getPhoto(),
            'ref_avion' => $vol->getRefAvion(),
            'ref_pilote' => $vol->getRefPilote()


        ]);
        return $vol;
    }
    public function modifVol(Vols $vol) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE vols 
        SET destination = :destination, 
            description = :description, 
            prix_billet_init= :prix_billet_init,
            date_depart = :date_depart, 
            date_arrivee = :date_arrivee,
            duree_trajet = :duree_trajet,
            heure_depart = :heure_depart,
            heure_arrivee = :heure_arrivee,
            ville_depart = :ville_depart,
            ville_arrivee = :ville_arrivee,
            photo = :photo,
            ref_avion = :ref_avion,
            ref_pilote = :ref_pilote
        WHERE id_vol = :id_vol');

        $req->execute([
            'id_vol' => $vol->getIdVols(),
            'destination' => $vol->getDestination(),
            'description' => $vol->getDescription(),
           'prix_billet_init' => $vol->getPrixBilletInit(),
            'date_depart' => $vol->getDateDepart(),
            'date_arrivee' => $vol->getDateArrivee(),
            'duree_trajet' => $vol->getDureeTrajet(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrivee' => $vol->getHeureArrivee(),
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrivee' => $vol->getVilleArrivee(),
            'photo' => $vol->getPhoto(),
            'ref_avion' => $vol->getRefAvion(),
            'ref_pilote' => $vol->getRefPilote()
        ]);

        return $vol;
    }

    public function suppVol(int $idVol) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('DELETE FROM vols WHERE id_vol = :id_vol');
        $req->execute(['id_vol' => $idVol]);
    }


}