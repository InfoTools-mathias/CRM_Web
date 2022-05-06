<?php
$data = array(
    'name' => $_POST["name_product"],
    'description' => $_POST["description_product"],
    'price' => $_POST["price_product"],
    'quantity' => intval($_POST["quantity_product"]),
);
var_dump($data);

//URL de l'API
$url = "http://localhost:5000/api/v1/products";

$opts = array('http' =>
    array(
        'method' => 'POST',
        'content' => json_encode($data),
        'header' => array(
            "Content-Type: application/json",
            'Authorization: Bearer '.$_SESSION['token'],
        ),
    )
);
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);
header('Location:../produit.php');
?>