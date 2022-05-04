<!-------------------------------------->
<!-----Verification de la connexion----->
<!-------------------------------------->
<?php session_start();
//Recupération des données
$id = $_POST["iduser"];
$pass = $_POST["password"];

//Encodage en base64
$string = base64_encode($id.":".$pass);

//URL de l'API
$url = "http://localhost:5000/api/v1/oauth/password";

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Authorization: Basic '.$string,//Token basic -> barière
    )
);

//Envoie de la requête
$context = stream_context_create($opts);
$res = file_get_contents($url, false, $context);

if ($res !== FALSE) {
    $json = json_decode($res,true);
    $_SESSION['id'] = $id;
    $_SESSION['token'] = $json['token'];
    $_SESSION['token_type'] = $json['token_type'];

    $url = "http://localhost:5000/api/v1/oauth/@me";

    $opts = array('http' =>
    array(
        'method' => 'GET',
        'header' => 'Authorization: Bearer '.$_SESSION['token'],
    )
    );
    $context = stream_context_create($opts);
    $res = file_get_contents($url, false, $context);
    $json = json_decode($res,true);

    $_SESSION['name'] = $json['name'];
    header('Location:Accueil.php');
} else {
    echo "<p style='color:red'>Identifiant ou mot de passe incorrect</p>";
}?>