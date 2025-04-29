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
        $req = $database->prepare('INSERT INTO vols (destination, description,	date_depart,date_arrivee,duree_trajet,  heure_depart,	heure_arrivee,	 ville_depart, ville_arrivee, photo, ref_reservation, ref_avion,	ref_pilote) VALUES (:destination,:description, :date_depart, :date_arrivee, :duree_trajet ,:heure_depart, :heure_arrivee, :ville_depart, :ville_arrivee, :photo,:ref_reservation, :ref_avion, :ref_pilote)');
        $req->execute([
            'destination' => $vol->getDestination(),
            'description' => $vol->getDescription(),
            'date_depart' => $vol->getDateDepart(),
            'date_arrivee' => $vol->getDateArrivee(),
            'duree_trajet' => $vol->getDureeTrajet(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrivee' => $vol->getHeureArrivee(),
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrivee' => $vol->getVilleArrivee(),
            'photo' => $vol->getPhoto(),
            'ref_reservation' => $vol->getRefReservation(),
            'ref_avion' => $vol->getRefAvion(),
            'ref_pilote' => $vol->getRefPilote()


        ]);
        return $vol;
    }


}