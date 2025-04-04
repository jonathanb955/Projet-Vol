<?php

namespace modele;

class Vols
{
    private $idVols;
    private $destination;
    private $heureDepart;
    private $heureArrivee;
    private $villeArrivee;
    private $refReservation;
    private $refAvion;
    private $refPilote;

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
            public
            function getIdVols()
            {
                return $this->idVols;
            }

            /**
             * @param mixed $idVols
             */
            public
            function setIdVols($idVols)
    {
        $this->idVols = $idVols;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this-> destination= $destination;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * @param mixed $heureDepart
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;
    }

    /**
     * @return mixed
     */
    public function getHeureArrivee()
    {
        return $this->heureArrivee;
    }

    /**
     * @param mixed $heureArrivee
     */
    public function setHeureArrivee($heureArrivee)
    {
        $this->heureArrivee = $heureArrivee;
    }

    /**
     * @return mixed
     */
    public function getVilleArrivee()
    {
        return $this->villeArrivee;
    }

    /**
     * @param mixed $villeArrivee
     */
    public function setVilleArrivee($villeArrivee)
    {
        $this->villeArrivee = $villeArrivee;
    }

    /**
     * @return mixed
     */
    public function getRefReservation()
    {
        return $this->refReservation;
    }

    /**
     * @param mixed $refReservation
     */
    public function setRefReservation($refReservation)
    {
        $this-> refReservation= $refReservation;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->refAvion;
    }

    /**
     * @param mixed $refAvion
     */
    public function setRefAvion($refAvion)
    {
        $this->refAvion = $refAvion;
    }

    /**
     * @return mixed
     */
    public function getRefPilote()
    {
        return $this->refPilote;
    }

    /**
     * @param mixed $refPilote
     */
    public function setRefPilote($refPilote)
    {
        $this->refPilote = $refPilote;
    }


}