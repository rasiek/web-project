<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
#Variables
$titre = 'Annonces Dynamiques';

include 'static/templates/head.php'
 ?>
 
<body>

<?php 
include 'static/templates/header.php';
?>

<div class="load-annon">
    <button type="submit" >Charger Tous les Annonces</button>
</div>


<div class="annonces"></div>




<?php 
include 'static/templates/footer.php';
?>  
</body>
</html>