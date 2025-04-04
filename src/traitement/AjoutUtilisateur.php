<?php
require_once "../bdd/bdd.php";
require_once"../modele/Utilisateur.php";
require_once"../repository/UtilisateurRepository.php";


if (!empty($_POST["email"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["dateNaissance"]) &&
    !empty($_POST["ville"]) &&
    !empty($_POST["mdp"]) )
{


    if(($_POST["mdp"]==$_POST["mdpC"])) {
        $hashpassword = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        session_start();

        $utilisateurRepository = new \repository\UtilisateurRepository();
        $nbUser=$utilisateurRepository->nombreUtilisateur();
        if($nbUser==0) {
            $role="admin";
        }else{
            $role="utilisateur"; 
        }
        $utilisateur = new \modele\Utilisateur([
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "dateNaissance" => $_POST["dateNaissance"],
            "ville" => $_POST["ville"],
            "email" => $_POST["email"],
            "mdp" => $hashpassword,
            "role"=> $role
        ]);
        $verif=$utilisateurRepository->verifDoublonEmail($utilisateur);
        if ($verif) {
            header("Location: ../../vue/inscription.php?parametre=doublon");
        }else{
            $utilisateur = $utilisateurRepository->inscription($utilisateur);


            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["prenom"] = $_POST["prenom"];
            $_SESSION["dateNaissance"] = $_POST["dateNaissance"];
            $_SESSION["ville"] = $_POST["ville"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["mdp"] = $_POST["mdp"];
            $_SESSION["role"] = $role;

            
            var_dump($utilisateur);
            if ($utilisateur->getRole() == "utilisateur") {
                header("Location: ../../index.php");
            }

            header("Location: ../../index.php?parametre=inscrit");
        }

    } else {
        header("Location: ../../vue/inscription.php?parametre=mdp");
    }

}

else{
    header("Location: ../../vue/inscription.php?parametre=champsVides");
}
