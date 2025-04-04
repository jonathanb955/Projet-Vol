<?php

namespace modele;

class Reservation
{


    private $idReservation;
    private $refUtilisateur;
    private $refVols;
    private $dateReservation;
    private $prixBillet;
    private $reservationEnCours;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    private function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->refUtilisateur;
    }

    /**
     * @param mixed $refUtilisateur
     */
    public function setRefUtilisateur($refUtilisateur)
    {
        $this->refUtilisateur = $refUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getRefVols()
    {
        return $this->refVols;
    }

    /**
     * @param mixed $refVols
     */
    public function setRefVols($refVols)
    {
        $this->refVols = $refVols;
    }

    /**
     * @return mixed
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @param mixed $dateReservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    }

    /**
     * @return mixed
     */
    public function getPrixBillet()
    {
        return $this->prixBillet;
    }

    /**
     * @param mixed $prixBillet
     */
    public function setPrixBillet($prixBillet)
    {
        $this-> prixBillet= $prixBillet;
    }

    /**
     * @return mixed
     */
    public function getReservationEnCours()
    {
        return $this->reservationEnCours;
    }

    /**
     * @param mixed $reservationEnCours
     */
    public function setReservationEnCours($reservationEnCours)
    {
        $this-> reservationEnCours= $reservationEnCours;
    }



}