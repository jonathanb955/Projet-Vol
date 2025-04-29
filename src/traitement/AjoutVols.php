<?php

use modele\Vols;
use repository\VolsRepository;

require_once __DIR__ . '/../bdd/Bdd.php';
require_once "../modele/Vols.php";
require_once "../repository/VolsRepository.php";

if (!empty($_POST["destination"]) && !empty($_POST["date_depart"]) && !empty($_POST["date_arrivee"]) && !empty($_POST["duree_trajet"]) && !empty($_POST["heure_depart"]) && !empty($_POST["heure_arrivee"]) && !empty($_POST["ville_depart"]) && !empty($_POST["ville_arrivee"]) && !empty($_POST["photo"])) {



    $date_depart = date('Y-m-d', strtotime(str_replace('/', '-', $_POST["date_depart"])));
    $date_arrivee = date('Y-m-d', strtotime(str_replace('/', '-', $_POST["date_arrivee"])));

    if ($date_depart > $date_arrivee) {
        header("Location: ../../vue/ajoutsVol.php?error=date_incorrecte");
        exit;
    }



         $nouveauVol = new Vols([
             'destination' => $_POST["destination"],
                'dateDepart' => $_POST["date_depart"],
             'dateArrivee' => $_POST["date_arrivee"],
             'dureeTrajet' => $_POST["duree_trajet"],
             'heureDepart' => $_POST["heure_depart"],
            'heureArrivee' => $_POST["heure_arrivee"],
             'villeDepart' => $_POST["ville_depart"],
             'villeArrivee' => $_POST["ville_arrivee"],
        'photo' => $_POST["photo"],
             'refReservation' => $_POST["ref_reservation"] ?? null,
        'refAvion' => $_POST["ref_avion"] ?? null,
        'refPilote' => $_POST["ref_pilote"] ?? null
    ]);

    $volsRepository = new VolsRepository();

    try {
        $volsRepository->ajoutVols($nouveauVol);
             header("Location: ../../vue/pageCatalogue.php?success=1");
        exit;

    } catch (Exception $e) {
        die('Erreur lors de l\'insertion en BDD : ' . $e->getMessage());
    }

} else {
    header("Location: ../../vue/ajoutsVol.php?error=champs_vides");
    exit;
}

?>
