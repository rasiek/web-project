<?php session_start(); ?>
<!DOCTYPE html>

<html>
	<?php 
        require_once("bdd.php");
		// var_dump($tableau);  juste pour verifier 
 	?>

<?php include 'static/templates/head.php'; ?>


<body>
<?php include 'static/templates/header.php'; ?>

		<div class="bar-recherche">
            <form class="form-rech" id="form-recherche" method="POST">
                <div>
                    <input type="text" name="critere" placeholder="Rechercher..." required>
                    <button form="form-recherche" id="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>                
            </form>

		</div>

		<div id="recherche-annon">	
		</div>
		<?php include 'static/templates/footer.php'; ?>  
	</body>

</html>
