<?php
require_once '../modele/Utilisateur.php';
require_once"../repository/UtilisateurRepository.php";
require_once "../bdd/Bdd.php";
session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {

    header("Location: ../../vue/pageConnexion.php?parametre=infoManquante");
    exit();
}
else{
    var_dump($_POST);
    $utilisateur = new \modele\Utilisateur([
        'email' => $_POST["emailCo"]
    ]);
    $utilisateurRepository = new UtilisateurRepository();
    $utilisateur = $utilisateurRepository->connexion($utilisateur);
    if ($utilisateur !== null) {
        if(password_verify($_POST['mdpCo'],$utilisateur->getMdp())){
            $_SESSION['id_utilisateur'] = $utilisateur->getIdUtilisateur();
            $_SESSION['email'] = $utilisateur->getEmail();
            $_SESSION['nom'] = $utilisateur->getNom();
            $_SESSION['prenom'] = $utilisateur->getPrenom();
            if($utilisateur->getRole() == "admin"){
                $_SESSION["connexion"] = true;
                $_SESSION["connexionAdmin"] = true;
                header("Location: ../../index.php");
                exit();
            }else{
                $_SESSION["connexion"] = true;
                header("Location: ../../index.php");
                exit();
            }
        }
        else{
            header("Location: ../../vue/pageConnexion.php?parametre=emailmdpInvalide");
            exit();
        }

    }else{
        header("Location: ../../vue/pageConnexion.php?parametre=emailmdpInvalide");
        exit();
    }
}
