<?php
ob_start();
session_start();

//verification des champs
   if(!empty($_POST['email']) &&!empty($_POST['motPasse']) ){

  $email = $_POST['email'];
  $motPasse = $_POST['motPasse'];

  //connexion à la base de données

  require("./models/config.php");

  //selection de la table dans la bbase de donnée
  $selection = $connexion->prepare("SELECT * FROM users WHERE email=? AND motPasse=?");
  $selection->execute([$email, $motPasse]);
  
    if(!$selection){
        echo "oups une erreur c'est produit";
    }
    else{
        echo "ok";
    }
    
    $recupe = $selection->fetch(PDO::FETCH_ASSOC); 

    if ($recupe) {
        $_SESSION['user_id'] = $recupe['id'];
        header('LOCATION: connecte');
        exit(); 
    }else{
        echo "l'utilisateur n'existe pas";
    }

}

 


?>

