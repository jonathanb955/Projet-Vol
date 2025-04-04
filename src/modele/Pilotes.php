<?php

namespace modele;

class Pilotes
{

    private $idPilote;
    private $nomPilote;
    private $prenomPilote;
    private $conges;

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
    public function getIdPilote()
    {
        return $this->idPilote;
    }

    /**
     * @param mixed $idPilote
     */
    public function setIdPilote($idPilote)
    {
        $this->idPilote = $idPilote;
    }

    /**
     * @return mixed
     */
    public function getNomPilote()
    {
        return $this->nomPilote;
    }

    /**
     * @param mixed $nomPilote
     */
    public function setNomPilote($nomPilote)
    {
        $this-> nomPilote= $nomPilote;
    }

    /**
     * @return mixed
     */
    public function getPrenomPilote()
    {
        return $this->prenomPilote;
    }

    /**
     * @param mixed $prenomPilote
     */
    public function setPrenomPilote($prenomPilote)
    {
        $this-> prenomPilote= $prenomPilote;
    }
    /**
     * @return mixed
     */
    public function getConges()
    {
        return $this->conges;
    }

    /**
     * @param mixed $conges
     */
    public function setConges($conges)
    {
        $this-> conges= $conges;
    }
}