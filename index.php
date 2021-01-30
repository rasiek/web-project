<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php 
$titre = 'Accueil';
include 'static/templates/head.php'; ?>
<body>

<?php include 'static/templates/header.php'; ?>

<section class="hero">
        <img src="static/imgs/1014-[Converted].png" alt="speaker" class="speaker">
        <img src="static/imgs/speaker.png" alt="speaker" class="big-speaker">
        <h1>
            Trouvez en un click<?php if ($_SESSION['username']){ echo ",</br> ", ucfirst($_SESSION['username']); } ?>
        </h1>
        <p>
            Note-iT  propose la meilleure plataforme pour rechercher ce dont</br>vous avez besoin. Très facile à utiliser il vous reste qu'à</br> 
            vous connecter et trouver en un click. <img src="static/imgs/click.png" alt="click">
        </p>
        <div class="btns">
        <button>
            <a href="recherche.php">Rechercher</a>
        </button>
        
        <button class="<?php if(!isset($_SESSION['username'])) { echo "no-show"; } ?>">
            <a href="ajoutAnnonce.php">Ajouter une annonce</a>
        </button>
        </div>
        <img src="static/imgs/pattern-mobile.png" alt=pattern class="pattern">
        <div class="img-cont">
            <img src="static/imgs/pattern.png" alt=pattern>
        </div>
</section>

<?php include 'static/templates/footer.php' ?>    
</body>
</html>