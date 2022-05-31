<?php
session_start();
//Recupération des données
$id = $_POST["id"];

//URL de l'API
$url = "http://localhost:5000/api/v1/meetings/".$id;

$opts = array('http' =>
    array(
        'method' => 'DELETE',
        'header' => 'Authorization: Bearer '.$_SESSION['token'],
    )
);

//Envoie de la requête
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);
header('Location:../rdv.php');
?>