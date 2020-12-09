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

<form id="btn-list" class="form-annon-dyna">
    <input type="submit" value="Charger Tous les Annonces"></input>
</form>

<div id="list-annon-dyna" class="annon-dyna"></div>




<?php 
include 'static/templates/footer.php';
?>  
</body>
</html>