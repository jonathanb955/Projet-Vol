<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/pageInscription.css" rel="stylesheet">
    <title>Formulaire d'inscription</title>
</head>

<body>
<form action="../src/traitement/AjoutUtilisateur.php"" method="POST">
    <h2><u>Inscription</u></h2>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br><br>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>
    <br><br>
    <label for="dateNaissance">Date de naissance :</label>
    <input type="date" id="dateNaissance" name="dateNaissance" required>
    <br><br>
    <label for="Ville">Ville :</label>
    <input type="text" id="ville" name="ville" required>
    <br><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">S'inscrire</button>
</form>
</body>
</html>
