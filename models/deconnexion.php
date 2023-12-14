<?php
ob_start();
// session_start();
require_once "config.php";
if (!empty($_SESSION['id'])) {
    $sessionUserId = $_SESSION['id'];
    $selection = $connexion->prepare("SELECT * FROM users WHERE id=:sessionUserId");
    $selection->bindParam(':sessionUserId', $sessionUserId);
    $selection->execute();

    if (!$selection) {
        echo "Oups, une erreur s'est produite";
    } else {
        echo "ok";
    }

    $recupe = $selection->fetch();

    if ($recupe) {
        unset($_SESSION['id']);
        header('Location: connexion');
    } else {
        die("Utilisateur inconnu");
    }
} else {
    header('Location: ./connexion');
}


//Remplacement de 'sessionUserId' par :sessionUserId dans la requête SQL.
//Utilisation de bindParam pour lier la variable à la requête préparée.
//Correction de la fonction header pour utiliser 'Location' au lieu de 'LOCATION'.
//Améliorations mineures de la mise en forme pour la lisibilité.
?>
