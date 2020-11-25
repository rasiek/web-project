<?php
  
    // var_dump($_REQUEST);

    // Récupération des variables envoyées par le formulaire.
    // $_REQUEST permet de récupérer les variables envoyées 
    
    $id = $_REQUEST["id"];
    $titre = $_REQUEST["titre"];
    $description = $_REQUEST["description"];
    $categorie = $_REQUEST["categorie"];
    $pseudo = $_REQUEST ["pseudo" ];
    $prix = $_REQUEST["prix"] ;
    $photo = $_REQUEST["photo" ];
    $rdv_lat = $_REQUEST["rdv_lat"];
    $rdv_lon = $_REQUEST["rdv_lon"];
    $date = $_REQUEST["date"];

    // Si l'emplacement en session 'nexiste pas, on le crée
    if ( isset($_SESSION["mes_annonces"])) {
        $_SESSION["mes_annonces"] = [];
    }


    
    


    $annoncesExistantes = json_decode(file_get_contents("./data.json"));

    //  on stocke plusieurs variables dans un tableau
    array_push($annoncesExistantes, [
        "id" => $autoincrément,
        "titre" => $titre,
        "description" => $description ,
        "catégorie" => $catégorie,
        "pseudo" => $pseudo,
        "prix" => $prix,
        "photo" => $photo,
        "rdv_lat" => $rdv_lat,
         "rdv_lon" => $rdv_lon,
        "date" => $date,
        
      
    ]);

    
   //var_dump($annoncesExistantes);
   file_put_contents("./data.json", json_encode ($annoncesExistantes));
    // session_destroy();
?>
<html>
    <head>
            
        <link rel="stylesheet" type=text/css href="styl.css">

        <title> note it </title>
        <script type="text/javascript" src="liste_dynamique.js"> </script>
        </head>
        <body>
        
        
            <div id="container">
                
                  <h1>NOte it</h1>
                 
        <nav id="main">
                  <ul>
                    <li><a href="index.html">Accueil |</a></li>
                    <li><a href="annonces_statique.php">liste statique des annonces|</a></li>
                    <li><a href="bouton_page_dynamique.html">liste dynamique |</a></li>
                         
                    <li><a href="formulaire.php">ajout d'une annonce |</a></li>
                    <li><a href="index.php">Connexion |</a></li>
                    <li><a href="deconnexion.php">Deconnexion </a></li>
                    <header>
                  </ul>
                   </nav>
                    <p id="felicitation">félicitaions, votre annonce a été bien ajouté.
                   </p>
                   <ul id="liste_messages">
                     
                   </ul>







                <footer>
                  <nav>
                    <ul>
                    <li><a href="mailto:thamila.iberoualene@etu.umontpellier.fr" >Thamila iberoualene | </a></li>
                      
                      <li><a href="mailto:cristhian.casierra@etu.umontpllier.fr"> cristhian casierra| </a></li>
                      <li><a href="mailto:salma.boukbir@etu.umontpellier.fr">salma boukbir</a></li>

                      <li><a href= > 2020  </a></li>
                    </ul>
                  </nav>
                </footer>
              </div>
              
          
    </body>

</html>





