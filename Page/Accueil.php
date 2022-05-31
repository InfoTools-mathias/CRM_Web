<!-------------------------------------->
<!--------------- Accueil -------------->
<!-------------------------------------->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="icon" href="../Image/Logo-InfoTools.png">
    <title>Accueil</title>
</head>

<?php include('header.php');//Header de l'Accueil
//FONCTION DE L'APPEL DE L'API
function CallAPI() {
    $url = "http://localhost:5000/api/v1/meetings";// URL de l'API
    $opts = array('http' =>
        array(
            'method' => 'GET',
            'header' => 'Authorization: Bearer '.$_SESSION['token'],
        )
      );
    $context = stream_context_create($opts);
    $raw = file_get_contents($url, false, $context);
    $json = json_decode($raw,true);
    //Token de la session
    //echo $_SESSION['token'];?>
    <!-- Présentation des rendez-vous -->
    <table class="container_rendez-vous">
    <tr>
        <th class="th_Date">Date</th>
        <th class="th_CP">Code postal</th>
        <th class="th_Adr">Adresse</th>
        <!--<th class="th_Rec">Reception</th>-->
    </tr><?php
    $now = date('Y-m-d h:i:s');//Initialise la date/heure du jour
    //Rendez-vous qui ne sont pas passé
    for ($i=0; $i < count($json); $i++) {
        $date = new DateTime($json[$i]['date']);
        if (date_format($date, 'Y-m-d h:i:s') > $now) {?>
            <tr>
                <td class="td_date"><?php echo date_format($date, 'd-m-Y H:i:s');?></td>
                <td class="td_CP"><?php echo $json[$i]['zip'];?></td>
                <td class="td_Adr"><?php echo $json[$i]['adress'];?></td>
            </tr><?php
        }                
    }//Rendez-vous qui sont passé - apparait en rouge
    for ($i=0; $i < count($json); $i++) {
        $date = new DateTime($json[$i]['date']);
        if (date_format($date, 'Y-m-d h:i:s') < $now) {?>
            <tr>
                <td class="td_date"><?php echo "<p style='color: red;'>".date_format($date, 'd-m-Y H:i:s')."</p>";?></td>
                <td class="td_CP"><?php echo "<p style='color: red;'>".$json[$i]['zip']."</p>";?></td>
                <td class="td_Adr"><?php echo "<p style='color: red;'>".$json[$i]['adress']."</p>";?></td>
            </tr><?php
        }                
    }
}//Appel de la fonction
CallAPI()?>