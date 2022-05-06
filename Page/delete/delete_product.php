<?php
//Recupération des données
$id = $_POST["id"];
$token = $_POST["token"];

//URL de l'API
$url = "http://localhost:5000/api/v1/products/".$id;

$opts = array('http' =>
    array(
        'method' => 'DELETE',
        'header' => 'Authorization: Bearer '.$token,
    )
);

//Envoie de la requête
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);
header('Location:../produit.php');
?>