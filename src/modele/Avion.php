<?php

namespace modele;

class Avion
{
 private $idAvion;
 private $nomAvion;
 private $capaciteAvion;
 private $localisationAvion;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);

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
    public function getIdAvion()
    {
        return $this->idAvion;
    }

    /**
     * @param mixed $idAvion
     */
    public function setIdAvion($idAvion)
    {
        $this->idAvion = $idAvion;
    }

    /**
     * @return mixed
     */
    public function getNomAvion()
    {
        return $this->nomAvion;
    }

    /**
     * @param mixed $nomAvion
     */
    public function setNomAvion($nomAvion)
    {
        $this->nomAvion = $nomAvion;
    }

    /**
     * @return mixed
     */
    public function getCapaciteAvion()
    {
        return $this->capaciteAvion;
    }

    /**
     * @param mixed $capaciteAvion
     */
    public function setCapaciteAvion($capaciteAvion)
    {
        $this->capaciteAvion = $capaciteAvion;
    }

    /**
     * @return mixed
     */
    public function getLocalisationAvion()
    {
        return $this->localisationAvion;
    }

    /**
     * @param mixed $localisationAvion
     */
    public function setLocalisationAvion($localisationAvion)
    {
        $this->localisationAvion = $localisationAvion;
    }


}