<?php
session_start();

require_once("../bdd.php");


$id = $_REQUEST['id'];

var_dump($_REQUEST);
var_dump($id);
  
    
if (isset($_SESSION['username'])) {

    suppressionannonces($id);
    http_response_code(200);

} else {

    http_response_code(401);

}


