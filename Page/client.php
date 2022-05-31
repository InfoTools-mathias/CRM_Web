<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Client</title>
</head>

<!---------- Client ---------->

<?php include('header_page.php'); ?>

<!---- FONCTION D'APPEL DE L'API ---->
<!------------- CallAPI ------------->

<!-------- Tableau des clients -------->
<div class="container-user"><?php
    function CallAPI() {
        $url = "http://localhost:5000/api/v1/users";
        $opts = array('http' =>
            array(
                'method' => 'GET',
                'header' => 'Authorization: Bearer '.$_SESSION['token'],
            )
        );
        $context = stream_context_create($opts);
        $raw = file_get_contents($url, false, $context);
        $json = json_decode($raw,true);
        $page = 0;
        for ($i=0; $i < count($json); $i++) {
            if ($json[$i]['type'] == 2) {?>
                <form class="form_client_list" action="./page_client.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
                    <input type="text" class="input_client clt_name" name="name" value="<?php echo $json[$i]['name'];?>"></input>
                    <input type="text" class="input_client clt_surname" name="surname" value="<?php echo $json[$i]['surname'];?>"></input>
                    <input type="text" class="input_client clt_mail" name="mail" value="<?php echo $json[$i]['mail'];?>"></input>
                    <p><button type="submit" name="btn_client" class="btn_client">
                        <img class="imgclient" src="../Image/img_left_arrow.svg" alt="">FICHE CLIENT</button></p>
                </form><?php
            }
        }
    }
    CallAPI() ?>
</div>