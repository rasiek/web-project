<!DOCTYPE html>
<html lang="en">
<?php
#Variables
include "bdd.php";
$titre = 'Annonces';
$infos =  visualisation();

include 'head.php';
?>

<body>

<?php include 'header.php'; ?>

    <div id="annonces" class="bloc">
    <?php
    foreach ($infos as $annonces ){ ?>  
        
        <ul>
            <li>
                <label>Titre:</label> <?php echo $annonces["titre"]; ?> 
            </li>
            <li>
                <label>description:</label> <?php echo $annonces["description"]; ?>
            </li>
            <li>
                <label>catégorie:</label> <?php echo $annonces["catégorie"]; ?>
            </li>
            <li>
                <label>pseudo:</label> <?php echo $annonces["pseudo"]; ?> 
            </li>
            <li>
                <label>prix:</label> <?php echo $annonces["prix"]; ?>
            </li>
            <li>
                <label>photo:</label> <img src="<?php echo $annonces["photo"]; ?>">
            </li>
            <li>
                <label>rdv_lat:</label> <?php echo $annonces["rdv_lat"]; ?> 
            </li>
            <li>
                <label>rdv_lon:</label> <?php echo $annonces["rdv_lon"]; ?>
            </li>
            <li>
                <label>date:</label> <?php echo $annonces["date"]; ?>
            </li>
        </ul>
    <?php  } ?>

    </div>


<?php include 'footer.php' ?>    
</body>
</html>