<?php
session_start();

require_once("../bdd.php");

$loginUser = $_REQUEST;


$userInfos = getUser($loginUser);

header("Content-Type", "application/json");
if ($userInfos == false) {
    http_response_code(401);
} else {

    http_response_code(200);
    
    echo json_encode($userInfos);

    $_SESSION['username'] = $userInfos['username'];
    $_SESSION['prenom'] = $userInfos['prenom'];

    //var_dump($userInfos);

}


?>