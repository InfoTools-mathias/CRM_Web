<!-------------------------------------->
<!----------- Accueil du site ---------->
<!-------------------------------------->

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="icon" href="../Image/Logo-InfoTools.png">
    <title>Accueil</title>
</head>

<?php include('header.php');

function CallAPI() {
    $url = "http://localhost:5000/api/v1/meetings";
    $raw = file_get_contents($url);
    $json = json_decode($raw,true);?>
    <table class="container_rendez-vous">
        <tr>
            <th class="th_Date">Date</th>
            <th class="th_CP">Code postal</th>
            <th class="th_Adr">Adresse</th>
            <th class="th_Rec">Reception</th>
        </tr><?php
        $now = date('Y-m-d h:i:s');
        for ($i=0; $i < count($json); $i++) {
            $date = new DateTime($json[$i]['date']);
            ?>
                <tr>
                    <td class="td_date"><?php                
                        if (date_format($date, 'Y-m-d h:i:s') < $now) {
                            echo "<p style='color: red;'>Date dépassé</p>";
                        }
                        else {
                            echo date_format($date, 'd-m-y h:i:s');
                        }?>
                    </td>
                    <td class="td_CP"><?php echo $json[$i]['zip'];?></td>
                    <td class="td_Adr"><?php echo $json[$i]['adress'];?></td>
                    <td class="td_Rec"><?php 
                    $users = $json[$i]['users'];
                    for ($u=0; $u < count($users); $u++) {
                        echo $users[$u]['name'].' ';
                        echo $users[$u]['surname'].' / ';
                    } ?></td>
                </tr><?php
        }?>
    </table><?php
}
CallAPI()?>