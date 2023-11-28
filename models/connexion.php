<?php
ob_start();
session_start();

//verification des champs
   if(!empty($_POST['email']) &&!empty($_POST['motPasse']) ){

  $email = $_POST['email'];
  $motPasse = $_POST['motPasse'];

  //connexion à la base de données

  require_once "config.php";

  //selection de la table dans la bbase de donnée
    $selection = $connexion->prepare("SELECT * FROM users WHERE email='$email' && motPasse='$motPasse'");
    $selection->execute();
    if(!$selection){
        echo "oups une erreur c'est produit";
    }
    else{
        echo "ok";
    }
    // Assurez-vous que votre requête SQL a été correctement préparée et exécutée auparavant
    $recupe = $selection->fetch(PDO::FETCH_ASSOC); // Utilisez FETCH_ASSOC pour récupérer un tableau associatif

    if ($recupe) {
        $_SESSION['user_id'] = $recupe['id'];
        header('LOCATION: ../views/connecte.php');
        exit(); 
    }else{
        echo "l'utilisateur n'existe pas";
    }

}

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <div class="container">
    <!-- Formulaire -->
    <form action="" method="post">
    <p> Bienvenue</p>
   <input type="email" name="email" id="email" placeholder="Email"><br>
   <input type="password" name="motPasse" id="motPasse" placeholder="Mot de Passe"><br>
   <input type="submit" value="Connexion"><br>
   <a href="">Mot de passe oublié</a>

    </form>


    <!-- OMBRES -->

    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
    </div>
    
</body>
</html>