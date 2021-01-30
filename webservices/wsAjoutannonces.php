<?php

   
require_once("../bdd.php");
    
    // on récupère les paramètres de la requête, et on considère qu'ils contiennent
    // les données nécessaires pour caractériser une loutre; si certains paramètres
    // ne sont pas fournis, la requête SQL échouera !
$infosannonces = $_REQUEST;

    
addannonces($infosannonces);

    
    // on informe le client que tout s'est bien passé (code 200)
http_response_code(200);
    
    // on n'envoie pas de données : inutile donc d'en spécifier le format. Pas
    // de header() ni de echo    










