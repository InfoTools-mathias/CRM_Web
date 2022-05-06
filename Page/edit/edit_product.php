<?php
//Recupération des données
$id = $_POST["id"];
$name = $_POST["name"];
$des = $_POST["description"];
$price = floatval($_POST["price"]);
$qte = intval($_POST["qte"], 10);
$token = $_POST["token"];

//URL de l'API
$url = "http://localhost:5000/api/v1/products/".$id;
$data = [
    'name' => $name,
    'description' => $des,
    'price' => $price,
    'quantity' => $qte,
];

var_dump (json_encode($data));

$opts = array ('http' =>
    array (
        'method' => 'PUT',
        'content' => json_encode($data),
        'header' => array (
            'Authorization: Bearer '.$token,
            'Content-type: application/json',
        ),      
    )
);

//Envoie de la requête
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);
header('Location:../produit.php');
?>