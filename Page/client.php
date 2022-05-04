<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Client</title>
    <script>
    </script>
</head>

<!---------- Produit ---------->

<?php include('header_page.php'); ?>


<!---- FONCTION D'APPEL DE L'API ---->
<!------------- CallAPI ------------->

<div class="container-user"><?php
    function CallAPI() {
        $url = "http://localhost:5000/api/v1/users";
        $raw = file_get_contents($url);
        $json = json_decode($raw,true);
        $page = 0;?>
        <table class="user"><?php
        for ($i=0; $i < count($json); $i++) {
            if ($json[$i]['type'] == 2) {?>
                <tr>
                    <td style="text-align:center"><?php echo $json[$i]['name'];?></td>
                    <td style="text-align:center"><?php echo $json[$i]['surname'];?></td>
                    <td style="text-align:center"><?php echo $json[$i]['mail'];?></td>
                    <td style="text-align:center;"><button name="btnclient" class="btn_client" onclick="gestionnaire_cli()"><img class="imgclient" src="../Image/img_flechebas.svg" alt=""></button></td>
                </tr>
        <?php }
        }?></table><?php
    }
    CallAPI()
    ?>
</div>

<div class="popup_client">
    <p>coucou</p>
</div>

<script>
	function gestionnaire_cli() {
    var div = document.getElementById("popup_client");
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {div.style.display = "none";}
	}
</script>