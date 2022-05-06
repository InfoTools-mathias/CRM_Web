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
                    <td class="hidden_id"><?php echo $json[$i]['id'];?></td>
                    <td class="td_client"><?php echo $json[$i]['name'];?></td>
                    <td class="td_client"><?php echo $json[$i]['surname'];?></td>
                    <td class="td_client"><?php echo $json[$i]['mail'];?></td>
                    <td class="td_client td_img"><button class="btn_client" onclick="openForm()"><img class="imgclient" src="../Image/img_left_arrow.svg" alt="">FICHE CLIENT</button></td>
                </tr>
        <?php }
        }?></table><?php
    }
    CallAPI()
    ?>
</div>
<!-- POP UP FICHE CLIENT -->
<div class="popup_client" id="popup_client">
    <button class="btn_img_cross" onclick="closeForm()"><img class="client_img_cross" src="../Image/img_cross.svg"></button>
    <div class="container_img"><img class="img_user_client" src="../Image/img_user-regular.svg" alt=""></div>
    <div class="container_id"><?php
        function CallAPI_() {
            $url = "http://localhost:5000/api/v1/users";
            $raw = file_get_contents($url);
            $json = json_decode($raw,true);
            for ($i=0; $i < count($json); $i++) {
                if ($json[$i]['type'] == 2) {
                    echo $json[$i]['name'];
                    echo $json[$i]['surname'];
                    echo $json[$i]['mail'];?><br><br><?php
                }
            }
        }
        CallAPI_() ?>
    </div>
    <div class="container_facture"><?php
        function CallAPI__() {
            $url = "http://localhost:5000/api/v1/factures";
            $raw = file_get_contents($url);
            $json = json_decode($raw,true);
            for ($i=0; $i < count($json); $i++) {
                echo $json[$i]['date'];
                echo $json[$i]['ligneFacture'];?><br><br><?php                
            }
        }
        CallAPI__() ?>
    </div>
</div>
<!-- FIN POP UP FICHE CLIENT -->
<!-- SCRIPT POUR AFFICHER POPUP FICHE CLIENT -->
<script>
  //Bouton "Visualier un client"
  function openForm() {document.getElementById("popup_client").style.display = "block";}
  //Bouton ""
  function closeForm() {document.getElementById("popup_client").style.display = "none";}
</script>
<!-- FIN SCRIPT POUR AFFICHER POPUP FICHE CLIENT -->