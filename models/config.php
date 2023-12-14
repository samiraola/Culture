<?php
$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "culture";
// $port = 3306;

try {
    $connexion = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";

    // Le reste de votre code peut continuer ici

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Remplacez ces valeurs par les informations de votre base de données
?>
