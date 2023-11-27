<?php
ob_start();
  //on verifie si les champs ne sont pas vides
  function escape($valeur){
    return   trim(strip_tags($valeur));
}

if((!empty($_POST['nom'])) && !empty($_POST['prenom']) &&  !empty($_POST['email']) && !empty($_POST['motPasse'])){
    echo "bonne arivée";
//recuperation des données
$nom =escape($_POST['nom']);
$prenom =escape($_POST['prenom']);
$email = escape($_POST['email']);
$motPasse = escape($_POST['motPasse']);
if(empty($nom) or strlen($nom) < 2  ){
  $err_nom = "Erreur sur le nom";
}
if(empty($prenom) or strlen($prenom) < 2  ){
    $err_prenom = "Erreur sur le prenom";
}
if(empty($email) or strlen($email) < 2  ){
    $err_email = "Erreur sur le email";
}
if(empty($motPasse) or strlen($motPasse) < 2  ){
    $err_motPasse = "Erreur sur le motPasse";
}


//connexion à la base de donnée
if(!isset($err_nom) && !isset($err_prenom) && !isset($err_email) && !isset($err_motPasse)){
    require_once "config.php";
    //insertion des données dans la base de données
    
    try {
        
        if ($connexion) {
            // La connexion à la base de données est réussie, vous pouvez maintenant préparer et exécuter votre requête.
            $result = $connexion->prepare('INSERT INTO users(nom, prenom, email, motPasse) VALUES (?, ?, ?, ?)');
            $result->execute(array($nom, $prenom, $email, $motPasse));
        } else {
            echo 'La connexion à la base de données a échoué.';
        }
        if ($result) {
            echo "Insertion valide !";
            header('LOCATION: connexion.php');
        } else {
            // En cas d'erreur, afficher les informations sur l'erreur
            $errorInfo = $result->errorInfo();
            echo "Erreur lors de l'insertion : " . $errorInfo[2];
        }
    
    } catch (PDOException $e) {
        // En cas d'erreur de connexion à la base de données
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    
    
    

    
}

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>
    <div class="container">
    <!-- Formulaire -->
    <form action="" method="post">
        <p> Bienvenue</p>
        <input type="text" name="nom" id="nom" placeholder="Nom"><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom"><br>
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="motPasse" id="motPasse" placeholder="Mot de Passe"><br>
        <input type="submit" value="S'inscrire"><br>
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