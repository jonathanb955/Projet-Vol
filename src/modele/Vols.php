<?php

namespace modele;

class Vols
{
    private $idVols;
    private $destination;
    private $description;
    private $dateDepart;
    private $dateArrivee;
    private $dureeTrajet;
    private $heureDepart;
    private $heureArrivee;
    private $villeDepart;
    private $villeArrivee;
    private $photo;

    private $refAvion;
    private $refPilote;
    private $prixBilletInit;

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
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * @param mixed $villeDepart
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;
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

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * @param mixed $dateDepart
     */
    public
    function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;
    }

    /**
     * @return mixed
     */
    public
    function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public
    function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    /**
     * @return mixed
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * @param mixed $dateArrivee
     */
    public
    function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;
    }
    /**
     * @return mixed
     */
    public function getDureeTrajet()
    {
        return $this->dureeTrajet;
    }

    /**
     * @param mixed $dureeTrajet
     */
    public
    function setDureeTrajet($dureeTrajet)
    {
        $this->dureeTrajet = $dureeTrajet;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public
    function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrixBilletInit()
    {
        return $this->prixBilletInit;
    }

    /**
     * @param mixed $prixBilletInit
     */
    public function setPrixBilletInit($prixBilletInit)
    {
        $this-> prixBilletInit= $prixBilletInit;
    }
}