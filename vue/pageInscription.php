<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../assets/css/pageInscription.css" rel="stylesheet">
    <title>Formulaire de Connexion</title>
</head>
<body>
<div class="alert alert-warning alert-dismissible fade show couleur-changeante retour" role="alert">
    <strong>Bienvenue parmis nous!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>
<br>
<br>
<div class="container">
    <h2  class="header-title" style="background-color: black; color: white; font-family: 'Times New Roman',serif">INSCRIPTION</h2>
    <br>

    <div class="content">
        <div class="form-container">
            <strong style="color: #004080; font-family: 'Times New Roman',serif">Nom:</strong><input type="text" placeholder="Nom">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif">Prénom:</strong><input type="text" placeholder="Prenom">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif">Date de naissance:</strong><input type="date" placeholder="Date de naissance:">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif">Ville de résidence:</strong><input type="email" placeholder="Ville de résidence:">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif">Email:</strong><input type="email" placeholder="Email">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif"">Mot de passe:</strong><input type="password" placeholder="Mot de passe">
            <br>
            <strong style="color: #004080; font-family: 'Times New Roman',serif"">Confirmation du mot de passe:</strong><input type="password" placeholder="Confirmer le mot de passe">
            <br>
            <form action="vue/suggestionsVoyages.php" method="get">
                <button type="submit" class="btn btn-dark " style="width: 200px; background-color: #004080 ; font-family: 'Times New Roman',serif"">Se connecter</button>
            </form>

            <br>
            <p class="lienInscription" style="color: black; font-family: 'Times New Roman',serif"">
            Déjà membre? Je souhaite <a href="pageConnexion.php" class="header-button" >me connecter</a>!
            </p>
        </div>



    </div>
</div>

</body>
</html>







