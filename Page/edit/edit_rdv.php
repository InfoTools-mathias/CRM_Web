<?php
session_start();
//Recupération des données
$id = $_POST["id"];
$date = $_POST["date"];
$dateiso = date('Y-m-d\TH:i:sO', strtotime($date));
//$users = $_POST["users"];
$zip = $_POST["zip"];
$adress = $_POST["adress"];

// $obj = new stdClass();
// $obj->id = $users;

//URL de l'API
$url = "http://localhost:5000/api/v1/meetings/".$id;
$data = [
    'date' => $dateiso,
    'zip' => $zip,
    'adress' => $adress,
    //'users' => array ($obj)
];

var_dump (json_encode($data));

$opts = array ('http' =>
    array (
        'method' => 'PUT',
        'content' => json_encode($data),
        'header' => array (
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-type: application/json',
        ),      
    )
);
var_dump ($opts);

//Envoie de la requête
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);
//header('Location:../rdv.php');
?>