<?php

namespace repository;

class ReservationRepository
{

    public function recupererReservations()
    {
        $reservations = [];
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();

        $req = $datebase->prepare('SELECT r.id_reservation, r.ref_seance,u.email, s.heure_debut,s.heure_fin, s.date, f.titre, r.date_reservation FROM reservation r INNER JOIN seance s ON r.ref_seance = s.id_seance INNER JOIN film f ON s.ref_film = f.id_film INNER JOIN user u ON r.ref_user = u.id_user');

        $req->execute();
        $reservationsBdd = $req->fetchAll();

        foreach ($reservationsBdd as $reservationBdd) {
            $reservations[] = [
                'idReservation' => $reservationBdd['id_reservation'],
                'refSeance' => $reservationBdd['ref_seance'],
                'heureDebut' => $reservationBdd['heure_debut'],
                'heureFin' => $reservationBdd['heure_fin'],
                'dateSeance' => $reservationBdd['date'],
                'titreFilm' => $reservationBdd['titre'],
                'dateReservation' => $reservationBdd['date_reservation'],
                'email' => $reservationBdd['email'],
            ];
        }

        return $reservations;
    }

    public function recupererReservationsselonUser($idUser)
    {
        $reservations = [];
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();

        $req = $datebase->prepare('SELECT r.id_reservation, s.heure_debut, s.date, f.titre, r.date_reservation FROM reservation r INNER JOIN seance s ON r.ref_seance = s.id_seance INNER JOIN film f ON s.ref_film = f.id_film  WHERE r.ref_user = :idUser ORDER BY DATE DESC');

        $req->execute([
            'idUser' => $idUser
        ]);
        $reservationsBdd = $req->fetchAll();

        foreach ($reservationsBdd as $reservationBdd) {
            $reservations[] = [
                'idReservation' => $reservationBdd['id_reservation'],
                'heureDebut' => $reservationBdd['heure_debut'],
                'dateSeance' => $reservationBdd['date'],
                'titreFilm' => $reservationBdd['titre'],
                'dateReservation' => $reservationBdd['date_reservation'],
            ];
        }

        return $reservations;
    }

    public function deleteReservation($idReservation)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("DELETE FROM reservation WHERE id_reservation = :id_reservation");
        $req->execute(array(
            "id_reservation" => $idReservation
        ));
        return $idReservation;
    }

    public function reserverUnePlace(Reservation $reservation)
    {
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('UPDATE seance SET places_dispo = (places_dispo - 1) WHERE id_seance = :ref_seance');
        $req->execute(array(
                "ref_seance" => $reservation->getRefSeance()
            )
        );

    }

    public function nvReservation(Reservation $reservation)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO reservation (ref_user, ref_seance, date_reservation) VALUES (:ref_user, :ref_seance, :date_reservation)');
        $req->execute([
            'ref_user' => $reservation->getRefUser(),
            'ref_seance' => $reservation->getRefSeance(),
            'date_reservation' => date('Y-m-d')
        ]);
        return $reservation;
    }


}