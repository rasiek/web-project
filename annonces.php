<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php
#Variables
include "bdd.php";
$titre = 'Annonces';
$infos =  visualisation();

include 'static/templates/head.php';
?>

<body>

<?php include 'static/templates/header.php'; ?>

    <div id="annonces" class="bloc">
    <?php
    foreach ($infos as $annonces ){ ?>  
          <div class="annon-card">
              <img src="<?php echo $annonces["photo"]; ?>" alt="">
              <div class="titre-annon">
                  <h2><?php echo $annonces["titre"]; ?></h2>
                  <p><?php echo $annonces["description"]; ?></p>
              </div>
              <div class="corps-annon">
                  <p><strong>Categorie:</strong> <?php echo $annonces["catégorie"]; ?></p>
                  <p><strong>Publié par:</strong> <?php echo $annonces["pseudo"]; ?> </p>
                  <p><strong>Prix:</strong> <?php echo $annonces["prix"]; ?></p>
                  <p><strong>Ville:</strong> <?php echo $annonces["rdv_lat"]; ?> <?php echo $annonces["rdv_lon"]; ?></p>
              </div>
              <div class="date-trash">
                  <p>Publié le: <?php echo $annonces["date"]; ?></p>
                  <button onclick="suppFunc(<?php echo $annonces['id']; ?>)"><i class="fas fa-trash-alt"></i></button>
              </div>
          </div>
    <?php  } ?>

    </div>


<?php include 'static/templates/footer.php' ?>    
</body>
</html>