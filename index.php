
<?php

use bdd\Bdd;

session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
$connecte = isset($_SESSION['connexion']) && $_SESSION['connexion'] === true;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aéroport International</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="web site icon" type="png" href="https://previews.123rf.com/images/jovanas/jovanas1602/jovanas160201149/52031915-logo-avi%C3%B3n-volando-alrededor-del-planeta-tierra-azul.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="d-flex justify-content-center align-items-center position-relative ">
        <div class="btn-group position-absolute end-0 me-3">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-square"></i>
            </button>
            <ul class="dropdown-menu text-center">
                <?php if ($connecte): ?>
                    <span class="dropdown-item-text"><strong>Bienvenue</strong><br><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></span>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?logout=true"><i class="bi bi-box-arrow-right"></i> Déconnexion</a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="vue/pageConnexion.php">Connexion <i class="bi bi-person-bounding-box"></i></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="vue/pageInscription.php">Inscription <i class="bi bi-person-plus-fill"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>

        <h1 class="mb-0" style="text-transform: capitalize">Aéroport International JBSkyTravel</h1>
    </div>

    <nav>
        <ul>
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#vols">Horaires des vols</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>

        </ul>
    </nav>
</header>

<section id="accueil">


    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="assets/img/shutterstock_124713472-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption custom-caption" style="font-family: 'Times New Roman',serif">
                    <h1>L'aéroport JBSkyTravel vous souhaite la bienvenue</h1>
                    <p>Nous sommes ravis de vous accueillir.<br>
                        Votre voyage commence ici. Découvrez nos services et laissez-nous vous accompagner vers votre prochaine destination avec sérénité et efficacité</p>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/img/rqCLex.gif" class="d-block w-100" alt="...">
                <div class="carousel-caption custom-caption " style="font-family: 'Times New Roman',serif">
                    <h2><u style="text-transform: capitalize">Voyager à travers le monde entier</u></h2>
                    <p>Voyager à travers le monde entier permet de découvrir des cultures fascinantes, des paysages uniques et de vivre des expériences enrichissantes. C'est une aventure qui ouvre l'esprit et relie les personnes par-delà les frontières<br>
                        "Explorez le monde avec nos compagnies partenaires, qui se comptent par centaines à travers le monde entier!"</p>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/img/hotesse-de-l-air-salaire-etudes-competences-necessaires.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption custom-text" style="font-family: 'Times New Roman',serif">
                    <h2><u>Couronné Meilleur Aéroport</u></h2>
                    <p>En 2024, JBSkyTravel élu Meilleur Aéroport pour son excellence et ses services inégalés, offrant une expérience unique et reconnue par tous pour son service de qualité et son innovation.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<br>

    <div class="card text-center">
        <div class="card-header" style="background-color:#004080">
            <br>
            <div class="message-case"><h4><em><u><strong><i class="bi bi-stars"></i>Les destinations incontournables à ne pas manquer en 2025<i class="bi bi-stars"></i></strong></u></em></h4></div>
            <br>

        </div>
        <div class="card-body-accueil ">
            <br>
            <br>
            <div class="row g-0">


            <div class="card mb-3 card-case" style="max-width: 540px;">
                <div class="row g-0" style="height: 300px;">
                    <div class="col-md-4" style="height: 100%; overflow: hidden;">
                        <img src="assets/img/statue-batiment-eclaire-contre-ciel-au-coucher-du-soleil-madrid-espagne_1048944-16260416.avif" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover; display: block">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center ">
                        <div class="card-body text-avec-background">
<br>
                            <h5 class="card-title"><i class="bi bi-geo-fill"></i><u>Madrid, Espagne</u></h5>

                            <p class="card-text"><em>Madrid, capitale de l'Espagne, est une ville vibrante mêlant histoire et modernité. Réputée pour ses musées emblématiques comme le Prado, ses places animées telles que la Puerta del Sol, et sa vie nocturne dynamique, elle offre une expérience culturelle et festive unique.</em></p>

                            <form action="vue/catalogue.php" method="get">
                                <button type="submit" class="btn btn-dark" style="width: 320px;">En savoir plus</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

                <div style="width: 3px; height: 275px; background-color: white;"></div>

                <div class="card mb-3 card-case" style="max-width: 540px;">
                    <div class="row g-0" style="height: 300px;">
                        <div class="col-md-4" style="height: 100%; overflow: hidden;">
                        <img src="assets/img/Le-port-dOslo-en-hiver.jpg" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover; display: block">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center ">
                        <div class="card-body text-avec-background">
                            <br>
                            <h5 class="card-title"><i class="bi bi-geo-fill"></i><u>Oslo, Norvège</u></h5>

                            <p class="card-text"><em>Oslo, la capitale de la Norvège, est une ville bordée par des forêts et le fjord d'Oslo. Célèbre pour ses musées, son architecture moderne et son cadre naturel, elle combine harmonieusement urbanisme et nature. Un lieu idéal pour la culture et les activités en plein air !</em></p>

                            <form action="vue/catalogue.php" method="get">
                                <button type="submit" class="btn btn-dark" style="width: 320px;">En savoir plus</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div style="height: 2px; width: 100%; background-color: white; margin: 0 auto;"></div>



            <br>

            <div class="row g-0">
            <div class="card mb-3 card-case" style="max-width: 540px;">
                <div class="row g-0" style="height: 300px;">
                    <div class="col-md-4" style="height: 100%; overflow: hidden;">
                        <img src="assets/img/vue_622325_pgbighd (1).jpg" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover; display: block">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center ">
                        <div class="card-body text-avec-background">

                            <h5 class="card-title"><i class="bi bi-geo-fill"></i><u>Venise, Italie</u></h5>

                            <p class="card-text"><em>Venise, en Italie, est une ville construite sur des îles reliées par des canaux et des ponts. Réputée pour ses gondoles, son architecture et sa place Saint-Marc, elle incarne le romantisme et la richesse culturelle.</em></p>
                            <form action="vue/catalogue.php" method="get">
                                <button type="submit" class="btn btn-dark" style="width: 320px;">En savoir plus</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div style="width: 3px; height: 300px; background-color: white;"></div>

            <div class="card mb-3 card-case" style="max-width: 540px;">
                <div class="row g-0" style="height: 300px;"">
                    <div class="col-md-4" style="height: 100%; overflow: hidden;">
                        <img src="assets/img/670782_QuatreTiers_md.ori.jpg" class="img-fluid rounded-start" alt="..." style="width: 100%; height: 100%; object-fit: cover; display: block">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center ">
                        <div class="card-body text-avec-background">

                            <h5 class="card-title"><i class="bi bi-geo-fill"></i><u>Tokyo, Japon</u></h5>

                            <p class="card-text"><em>Tokyo, capitale du Japon, est une ville vibrante où tradition et innovation se rencontrent. Réputée pour ses gratte-ciel imposants, ses temples ancestraux et sa cuisine renommée, elle offre un mélange unique de patrimoine culturel et de modernité dynamique.</em></p>

                            <form action="vue/catalogue.php" method="get">
                                <button type="submit" class="btn btn-dark" style="width: 320px;">En savoir plus</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

<br>



        </div>

        <div class="card-footer text-body-secondary" style="background-color: #004080">

            <a href="vue/catalogue.php" class="btn btn-light" style="background-color: white; color: black; text-transform: uppercase ; font-family: 'Times New Roman',serif"><b>Explorez <i class="bi bi-compass"></i></b> </a>
       <br>
            <br>
        </div>
</section>


<br>
<br>
<br>

<section id="vols">
    <?php
    require_once 'src/bdd/Bdd.php';
    $bdd = new \bdd\Bdd();
    $pdo = $bdd->getBdd();
    $query = "SELECT id_vol, destination, heure_depart, heure_arrivee FROM vols ORDER BY id_vol DESC LIMIT 5";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $vols = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="card text-center">
        <div class="card-header" style="background-color:#004080">
            <div class="message-case"><h4><em><u><strong>Horaires des vols<i class="bi bi-balloon-fill"></i></strong></u></em></h4></div>
        </div>
   <br>
    <table>
        <tr>
            <th>Vol</th>
            <th>Destination</th>
            <th>Heure de départ</th>
            <th>Heure d'arrivée</th>
        </tr>
        <?php
        foreach ($vols as $vol) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($vol['id_vol']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['destination']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['heure_depart']) . "</td>";
            echo "<td>" . htmlspecialchars($vol['heure_arrivee']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
<br>
        <div class="card-footer text-body-secondary" style="background-color: #004080">
            <br>
        </div>
    </div>
</section>

<br>
<br>
<br>



<section id="services">

    <div class="card text-center">
        <div class="card-header" style="background-color:#004080">
            <div class="message-case"><h4><em><u><strong>Nos services<i class="bi bi-balloon-fill"></i></strong></u></em></h4></div>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="color: #004080">Restaurants, boutiques, salons VIP et bien plus pour rendre votre voyage agréable.</h5>

            <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body carte-partnaires1">
                <div class="card-title partenaire" style="color: white ; -webkit-text-stroke: 0.5px black"> <br><h5>Bars et Restaurants</h5><em style="font-size: 13px ; color: #004080 ">Profitez de nos restaurants et bars pour un moment agréable et confortable avant votre vol.<br></em><br></div>
                <form action="../Projet-Vol/vue/barsEtRestaurants.html" method="get">
                    <button type="submit" class="btn btn-light partenaire" style="background-color: #004080 ; color: white">Découvrir</button>
                </form>'
            </div>
        </div>


            <div class="card" style="width: 18rem;">
            <div class="card-body carte-partnaires2">
                <div class="card-title partenaire" style="color: white ; -webkit-text-stroke: 0.5px black"> <br><h5>Shopping</h5><em style="font-size: 13px ; color: #004080 ">Vivez une expérience shopping avec nos boutiques partenaires proposant mode, beauté, luxe et souvenirs avant votre vol.<br></em><br></div>
                <form action="../Projet-Vol/vue/shopping.html" method="get">
                    <button type="submit" class="btn btn-light partenaire" style="background-color: #004080 ; color: white">Découvrir</button>
                </form>'
            </div>
        </div>

                <div class="card" style="width: 18rem;">
                    <div class="card-body carte-partnaires3">
                        <div class="card-title partenaire" style="color: white ; -webkit-text-stroke: 0.5px black"> <br><h5>Salon VIP</h5><em style="font-size: 13px ; color: #004080 ">Découvrez le privilège de nos salons VIP offrant détente, services premium, élégance et exclusivité avant votre voyage.<br></em><br></div>
                        <form action="../Projet-Vol/vue/salonVIP.html" method="get">
                            <button type="submit" class="btn btn-light partenaire" style="background-color: #004080 ; color: white">Découvrir</button>
                        </form>'
                    </div>
                </div>
            </div>
    </div>
        <div class="card-footer text-body-secondary" style="background-color: #004080">
            <br>
        </div>
    </div>



</section>

<br>
<br>
<br>

<section id="contact">

    <div class="card text-center">
        <div class="card-header" style="background-color:#004080">
            <div class="message-case"><h4><em><u><strong>Contact</strong></u></em></h4></div>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="color: #004080"> Une question ?</h5>
            <button type="button" class="btn btn-warning message-aide" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="JBSkyTravel@gmail.com"  >  Cliquez sur ce bouton <br>pour nous envoyer un message</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header " style="background-color: #004080">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white">Nouveau message <i class="bi bi-chat"></i></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label"><u style="color: #004080">Destinataire:</u></label>
                                    <div class="input-group" >
                                        <div class="input-group-text" id="btnGroupAddon2" style="background-color: #004080"><i class="bi bi-envelope-at" style="color: white"></i></div>
                                        <input type="text" class="form-control" placeholder="JBSkyTravel@gmail.com" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"><u style="color: #004080">Message :</u></label>
                                    <div class="input-group">
                                        <div class="input-group-text" id="btnGroupAddon2" style="background-color: #004080"><i class="bi bi-chat-left-text" style="color: white"></i></div>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Écrivez votre message ici"></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer" style="background-color: #004080">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Fermer</button>
                            <button type="button" class="btn btn-primary" style="color: white">Envoyer le message <i class="bi bi-telegram"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary" style="background-color: #004080">
<br>
        </div>
    </div>





    <br>
    <br>
    <br>
</section>

<footer>
    <p>&copy; 2025 Aéroport International. Tous droits réservés.</p>
</footer>
</body>
</html>

