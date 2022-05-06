<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css" media="screen" type="text/css" />    
    <link rel="icon" href="../Image/Logo-InfoTools.png">
    <title>Connexion</title>
</head>
<body>
    <div id="container">
        <!-- FORMULAIRE DE CONNEXION -->      
        <form class="form_connect" action="./send/verification.php" method="POST"><!-- RENVOYER A verification.php -->
            <h1>Connexion</h1>            
            <label><b>Email</b></label>
            <input type="text" placeholder="Entrer votre email" name="iduser" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id='submit' value='LOGIN' >
        </form>
    </div>
</body>
</html>