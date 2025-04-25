<?php
require_once __DIR__ . '/../bdd/Bdd.php';


class UtilisateurRepository {

    public function connexion(\modele\Utilisateur $utilisateur){
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(
            'email' => $utilisateur->getEmail()
        ));
        $donnees = $req->fetch();
        if ($donnees) {
            return new \modele\Utilisateur([
                'id_utilisateur' => $donnees['id_utilisateur'],
                'nom' => $donnees['nom'],
                'prenom' => $donnees['prenom'],
                'email' => $donnees['email'],
                'mdp' => $donnees['mdp'],
                'role' => $donnees['role']
            ]);
        }

        return null;
    }

    public function inscription(\modele\Utilisateur $utilisateur) {
        try {
            $bdd=new Bdd();
            $database=$bdd->getBdd();
            $hashedMdp = password_hash($utilisateur->getMdp(), PASSWORD_BCRYPT);
            $req = $database->prepare ("INSERT INTO utilisateur (nom, prenom, date_naissance, ville_residence, email, mdp, role, ref_vol) VALUES (:nom, :prenom, :date_naissance, :ville_residence, :email, :mdp, :role, :ref_vol)");
            var_dump([
            $req->execute(array(

            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'date_naissance' => $utilisateur->getDateNaissance(),
            'ville_residence' => $utilisateur->getVilleResidence(),
            'email' => $utilisateur->getEmail(),
            'mdp' => $utilisateur->getMdp(),
            'role' => $utilisateur->getRole(),
                'ref_vol'=> $utilisateur->getRefVol()
        ))
            ]);
        return $utilisateur;
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
}

    public function nombreUtilisateur(){
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT COUNT(id_utilisateur) FROM utilisateur');
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }

    public function verifDoublonEmail( $utilisateur)
    {
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('SELECT email FROM utilisateur WHERE email=:email');
        $req->execute(array(
            "email"=>$utilisateur->getEmail()
        ));
        $result = $req->fetch();
        var_dump($result);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>