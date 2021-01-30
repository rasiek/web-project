<?php session_start(); ?>

<html>
<?php include 'static/templates/head.php'; ?> 

<body>

<?php include 'static/templates/header.php'; ?>    
     
    <!-- barre d'entête -->
   
    <div class ="formulaire">
        
        <h2>Ajouter une annonce</h2>
 
        <form class="form-ajout" id="nouvelle-annonces" enctype="multipart/form-data" method="post">
            <p>
                <label>Titre de l'annonce </label>
                <input type="text" name="titre" required>
            </p>

            <p>
                <label>Description</label>
                <input type="text" name="description">
            </p>

            <p>
            <label>Catégories :</label>
                <input type="radio" name="type" value="textiles" id="type_textiles">
                <label for="type_textiles">Textiles</label>
                <input type="radio" name="type" value="hightech" id="type_hitech" >
                <label for="type_hightech">Hightech</label>
                <input type="radio" name="type" value="automobile" id="type_automobile">
                <label for="type_automobile">Automobile</label>
            </p>

            <p>
                <label>pseudo</label>
                <input type="text" name="pseudo" required>
            </p>

            <p>
                <label>prix en euro</label>
                <input type="number" min="0" max="10000" name="prix">
            </p>

            <p>
                <label>photo</label>
                <input type="url" name="image" placeholder="http://blabla.com/image.jpg" size="40">
            </p>

            <p>
                <label>rdv_lat</label>
                <input type="number" min="1" max="15.88888" name="rdv_lat">
            </p>

            <p>
                <label>rdv_lon</label>
                <input type="number" min="" max="16.97777" name="rdv_lon">
            </p>
            
            <p>
                <input type="submit" value="Valider">
            </p>
        </form>
    </div>
<?php include 'static/templates/footer.php' ?>    
</body>

</html>
