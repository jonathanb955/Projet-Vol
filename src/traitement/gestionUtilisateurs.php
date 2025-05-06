<?php
require_once '../repository/UtilisateurRepository.php';
require_once '../modele/Utilisateur.php';

use modele\Utilisateur;

if (isset($_POST['modifier'])) {
    $utilisateur = new Utilisateur([
        'idUtilisateur' => $_POST['id_utilisateur'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'dateNaissance' => $_POST['date_naissance'],
        'villeResidence' => $_POST['ville_residence'],
        'email' => $_POST['email'],
        'role' => $_POST['role'],
        'mdp' => '',
        'ref_vol' => null
    ]);

    $repo = new UtilisateurRepository();
    $repo->modifierUtilisateur($utilisateur);

    header('Location: ../../vue/modifReussite.html');
    exit;
}
