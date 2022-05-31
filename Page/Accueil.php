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
    $raw = file_get_contents($url);
    $json = json_decode($raw,true);
    //Token de la session
    //echo $_SESSION['token'];?>
    <!-- Présentation des rendez-vous -->
    <table class="container_rendez-vous">
    <tr>
        <th class="th_Date">Date</th>
        <th class="th_CP">Code postal</th>
        <th class="th_Adr">Adresse</th>
        <th class="th_Rec">Reception</th>
    </tr><?php
    $now = date('Y-m-d h:i:s');//Initialise la date/heure du jour
    for ($i=0; $i < count($json); $i++) {
        $date = new DateTime($json[$i]['date']);
        ?>
            <tr>
                <td class="td_date"><?php   
                    //Affichage de la date que si elle n'est pas dépassé
                    //Sinon on écrit "DATE DEPASSE"             
                    if (date_format($date, 'Y-m-d h:i:s') > $now) {
                        echo date_format($date, 'd-m-Y H:i:s');
                    }
                    else {
                        echo "<p style='color: red;'>Date dépassé</p>";
                    }?>
                </td>
                <td class="td_CP"><?php echo $json[$i]['zip'];?></td>
                <td class="td_Adr"><?php echo $json[$i]['adress'];?></td>
                <td class="td_Rec"><?php
                //Commerciaux correspondants au rendez-vous
                $users = $json[$i]['users'];
                for ($u=0; $u < count($users); $u++) {
                    echo $users[$u]['name'].' ';
                    echo $users[$u]['surname'];
                } ?></td>
            </tr><?php
    }?>
</table><?php
}//Appel de la fonction
CallAPI()?>