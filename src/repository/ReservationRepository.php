<?php

namespace repository;

require_once __DIR__ . '/../bdd/Bdd.php';

use modele\Reservation;
use bdd\Bdd;

class ReservationRepository
{
    public function ajoutReservation(Reservation $reservation)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare(
            'INSERT INTO reservations (refUtilisateur, refVols, dateReservation, prixBillet, reservationEnCours)
             VALUES (:refUtilisateur, :refVols, :dateReservation, :prixBillet, :reservationEnCours)');
        $req->execute([
            'refUtilisateur'     => $reservation->getRefUtilisateur(),
            'refVols'            => $reservation->getRefVols(),
            'dateReservation'    => $reservation->getDateReservation(),
            'prixBillet'         => $reservation->getPrixBillet(),
            'reservationEnCours' => $reservation->getReservationEnCours()
        ]);

        return $reservation;
    }

    public function modifReservation(Reservation $reservation)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();

        $req = $database->prepare(
            'UPDATE reservations 
             SET refUtilisateur = :refUtilisateur, 
                 refVols = :refVols, 
                 dateReservation = :dateReservation, 
                 prixBillet = :prixBillet, 
                 reservationEnCours = :reservationEnCours 
             WHERE idReservation = :idReservation'
        );

        $req->execute([
            'idReservation'      => $reservation->getIdReservation(),
            'refUtilisateur'     => $reservation->getRefUtilisateur(),
            'refVols'            => $reservation->getRefVols(),
            'dateReservation'    => $reservation->getDateReservation(),
            'prixBillet'         => $reservation->getPrixBillet(),
            'reservationEnCours' => $reservation->getReservationEnCours()
        ]);

        return $reservation;
    }

    public function suppReservation(int $id_reservation)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();

        $req = $database->prepare('DELETE FROM reservation WHERE id_reservation = :id_reservation');
        $req->execute(['id_reservation' => $id_reservation]);
    }
}
