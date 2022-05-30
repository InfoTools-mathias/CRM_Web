<?php
$data = array(
    'date' => $_POST["date_rdv"],
    'adress' => $_POST["adresse_rdv"],
    'zip' => $_POST["cp_rdv"],
    'users' => $_POST["com_rdv"],
);
var_dump($data);

//URL de l'API
$url = "http://localhost:5000/api/v1/meetings";

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
//header('Location:../rdv.php');
?>