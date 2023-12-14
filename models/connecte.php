<?php
 ob_start();
// session_start();
require_once "config.php";
if(!empty($_SESSION['user_id'])){
    $sessionId = $_SESSION['user_id'];
    $recup = $connexion->prepare('SELECT * FROM users WHERE id=?');
    $recup->execute(array($sessionId));
    if($recup){
        $selection = $recup->fetch(PDO::FETCH_ASSOC);
    }else{
        die("une erreur est survenue") ;
    }
}else{
    echo "erreur";
}
?>
