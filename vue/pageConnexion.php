<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../assets/css/pageConnexion.css" rel="stylesheet">
    <title>Formulaire de Connexion</title>
</head>
<body>
<div class="alert alert-warning alert-dismissible fade show couleur-changeante retour" role="alert">
    <strong>Heureux de vous revoir parmis nous!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="container">
    <h2  class="header-title" style="background-color: black; color: white; font-family: 'Times New Roman',serif">CONNEXION</h2>
    <br>
    <div class="content">
        <div class="form-container">

            <strong style="color: #004080; font-family: 'Times New Roman',serif">Votre email:</strong><input type="email" placeholder="Email">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif"">Votre mot de passe:</strong><input type="password" placeholder="Mot de passe">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif"">Confirmation de votre mot de passe:</strong><input type="password" placeholder="Confirmer votre mot de passe">

            <form action="vue/suggestionsVoyages.php" method="get">
                <button type="submit" class="btn btn-dark " style="width: 200px; background-color: #004080 ; font-family: 'Times New Roman',serif"">S'inscrire</button>
            </form>

            <br>
            <p class="lienInscription" style="color: black; font-family: 'Times New Roman',serif"">
                Nouveau? Je souhaite <a href="pageInscription.php" class="header-button" >m'inscrire</a>!
            </p>
        </div>



        </div>
    </div>

</body>
</html>






