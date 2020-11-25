<?php


include "bdd.php";

$infos =  visualisation();
//echo"<pre>";
//var_dump($infos);  
//echo"</pre>";

?>


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

<?php
//var_dump($infos);

//echo $infos ;
?>