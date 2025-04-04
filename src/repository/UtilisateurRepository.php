<?php

namespace repository;

use bdd;
use modele\Utilisateur;

class UtilisateurRepository
{


    public function connexion(Utilisateur $utilisateur)
    {
        $bdd = new bdd();
        $database = $bdd->getbdd();
        $req = $database->prepare('SELECT * FROM utilisateurWHERE email = :email');
        $req->execute(array(
            'email' => $utilisateur->getEmail()
        ));
        $utilisateur = $req->fetch();
        if ($utilisateur) {
            $utilisateur->setMdp($utilisateur['mdp']);
            $utilisateur->setRole($utilisateur["role"]);
            $utilisateur->setIdUser($utilisateur["id_utilisateur"]);
            $utilisateur->setEmail($utilisateur["email"]);
        }
        return $utilisateur;
    }

    public function inscription(Utilisateur $utilisateur)
    {
        $bdd = new bdd();
        $database = $bdd->getbdd();
        $req = $database->prepare("INSERT INTO utilisateur(nom,prenom,email,mdp,role) values(:nom,:prenom,:email,:mdp,:role) ");
        $req->execute(array(
            "nom" => $utilisateur->getNom(),
            "prenom" => $utilisateur->getPrenom(),
            "email" => $utilisateur->getEmail(),
            "mdp" => $utilisateur->getMdp(),
            "role" => $utilisateur->getRole()
        ));
        return $utilisateur;
    }

    public function nombreUtilisateur()
    {
        $bdd = new bdd();
        $database = $bdd->getbdd();
        $req = $database->prepare('SELECT COUNT(id_utilisateur) FROM utilisateur');
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }

    public function listeUser()
    {
        $listeUtilisateur= [];
        $bdd = new bdd();
        $datebase = $bdd->getbdd();
        $req = $datebase->prepare('SELECT * FROM utilisateur');
        $req->execute();
        $listeUtilisateursbdd = $req->fetchAll();
        foreach ($listeUtilisateursbdd as $listeUtilisateurbdd) {
            $listeUtilisateur[] = new Utilisateur([
                'idUser' => $listeUtilisateurbdd['id_utilisateur'],
                'nom' => $listeUtilisateurbdd['nom'],
                'prenom' => $listeUtilisateurbdd['prenom'],
                'email' => $listeUtilisateurbdd['email'],
                'mdp' => $listeUtilisateurbdd['mdp'],
                'role' => $listeUtilisateurbdd['role'],
            ]);
        }
        return $listeUtilisateur;
    }

    public function modifUser(Utilisateur$utilisateur)
    {
        $bdd = new bdd();
        $database = $bdd->getbdd();
        $req = $database->prepare("UPDATE utilisateurSET role = :role WHERE id_utilisateur= :id_utilisateur");
        $req->execute(array(
            "role" => $utilisateur->getRole(),
            "id_utilisateur" => $utilisateur->getIdUtilisateur()
        ));
        return $utilisateur;
    }

    public function deleteUser(Utilisateur$utilisateur)
    {
        $bdd = new bdd();
        $database = $bdd->getbdd();
        $req = $database->prepare("DELETE FROM utilisateurWHERE id_utilisateur= :id_utilisateur");
        $req->execute(array(
            "id_utilisateur" => $utilisateur->getidUtilisateur()
        ));
        return $utilisateur;
    }

    public function verifDoublonEmail($utilisateur)
    {
        $bdd = new bdd();
        $datebase = $bdd->getbdd();
        $req = $datebase->prepare('SELECT email FROM utilisateur WHERE email=:email');
        $req->execute(array(
            "email" => $utilisateur->getEmail()
        ));
        $result = $req->fetch();
        var_dump($result);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}