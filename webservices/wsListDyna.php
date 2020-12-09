<?php
require_once("../bdd.php");

// on récupère l'identifiant fourni dans la requête
$listeannonces = affichage($_REQUEST["termes"]);

// on informe le client qu'on va lui renvoyer des données au format JSON
header('Content-Type: application/json');

// on informe le client que tout s'est bien passé (code 200)
http_response_code(200);

// on envoie les données encodées au format JSON, sur la sortie standard
echo json_encode($listeannonces);

?>