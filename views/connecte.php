<?php
ob_start();
session_start();
require_once "../models/config.php";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/connecte.css">
</head>
<body>
    <header>
        <a href="">Logo</a>
    </header>
    

    <!-- Barre de navigation -->
    <nav>
        <!--  -->
        <p class="para">Bienvenue <?php echo $selection['nom'].' '.$selection["prenom"] ;  ?>
        </p>
        
        <ul>
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#musique">Musique</a></li>
            <li><a href="#art-numerique">Art Numérique</a></li>
            <li><a href="#mode">Mode</a></li>
            <li><a href="#activisme">Activisme</a></li>
            <li><a href="#podcasts">Podcasts</a></li>
            <li class="search-box">
               <input type="text" name="" id="" placeholder="rechercher">
               <i class='bx bx-search icon'></i>    
            </li>
            <button type="button"><a href="../models/deconnexion.php">Deconnexion</a></button>
        </ul>
    </nav>

    <!-- Section d'accueil -->
     <section id="accueil">
         <p>Explorez les dernières tendances, les mouvements artistiques innovants, et les voix émergentes qui façonnent notre monde aujourd'hui.</p> 
        <div class="image"></div>
        <!-- <button type="button"><a href="#en-savoir-plus">En savoir plus</a></button> -->
    </section>

    <!-- Section Musique -->
      <section id="musique">
        <div class="texte">Musique Émergente</div>
        <p>Découvrez des genres musicaux alternatifs, des artistes indépendants et des sons qui repoussent les limites de la musique contemporaine.</p>
        <div class="images">
            <div class="photo">
                hgcgcvh
            </div>
            
            <div class="photo1">
                jbhvnh
            </div>
            <div class="photo2">jbjk
                jblk
            </div>
            
        </div>
            <li>
            <i class='bx bxs-like bx-sm'></i>
            </li>
            <li>
            <i class='bx bxs-like bx-sm'></i>
            </li>
            <li>
            <i class='bx bxs-like bx-sm'></i>
            </li>
        <!-- <a href="#explorer-musique" class="bouton">Explorer la Musique</a> -->
    </section> 

    <!-- Section Art Numérique -->
    <!-- <section id="art-numerique">
        <h2>Art Numérique</h2>
        <p>Plongez dans l'univers de l'art numérique, des créations visuelles avant-gardistes et des artistes qui explorent de nouveaux médiums.</p>
        <a href="#explorer-art-numerique" class="bouton">Explorer l'Art Numérique</a>
    </section> -->

    <!-- Section Mode -->
    <!-- <section id="mode">
        <h2>Mode Contemporaine</h2>
        <p>Découvrez les dernières tendances de la mode, du streetwear aux mouvements underground, et explorez des styles uniques et audacieux.</p>
        <a href="#explorer-mode" class="bouton">Explorer la Mode</a>
    </section> -->

    <!-- Section Activisme -->
    <!-- <section id="activisme">
        <h2>Activisme Contemporain</h2>
        <p>Engagez-vous dans les mouvements sociaux et découvrez comment l'activisme contemporain prend forme à travers les médias sociaux et au-delà.</p>
        <a href="#s'impliquer" class="bouton">S'Impliquer</a>
    </section> -->

    <!-- Section Podcasts -->
    <!-- <section id="podcasts">
        <h2>Podcasts Culturels</h2>
        <p>Écoutez des discussions passionnantes sur la culture contemporaine, des entretiens avec des artistes émergents, et explorez de nouvelles perspectives.</p>
        <a href="#ecouter-podcasts" class="bouton">Écouter les Podcasts</a>
    </section> -->
</body>
</html>