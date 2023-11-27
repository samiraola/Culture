<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "culture";

$connexion = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
if($connexion){
    echo "Connexion à la base de bonnée";
}else{
    echo "une erreur est survenue à la connexion";
}



// Remplacez ces valeurs par les informations de votre base de données

?>