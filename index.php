<?php

$uri=$_SERVER['REQUEST_URI'];
switch ($uri){
    case "/index": require('controllers/index.php');
    break;
    case "/connexion": require('controllers/connexion.php');
    break;
    case "/inscription": require('controllers/inscription.php');
    break;
    case "/connecte": require('controllers/connecte.php');
    break;
    case "/deconnexion": require('controllers/deconnexion.php');
    break;
    default:require("views/index.php");
}


?>