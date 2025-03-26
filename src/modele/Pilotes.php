<?php

namespace modele;

class Pilotes
{

    private $idPilotes;
private $nom;
private $prenom;
private $conges;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
}