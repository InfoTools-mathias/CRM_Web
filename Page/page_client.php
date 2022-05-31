<title>Page Client</title>

<?php include('header_page.php'); ?>

<!-- FICHE CLIENT -->
<div class="popup_client">
    <button class="btn_img_cross"></button>
    <div class="container_img"><img class="img_user_client" src="../Image/img_user-regular.svg" alt=""></div>
    <!-- Tableau des informations client -->
    <div class="container_id"><?php
        //Récuperation des données
        $id = $_POST["id"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $mail = $_POST["mail"];
        
        ?><p><?php echo $name;?></p><?php
        ?><p><?php echo $surname;?></p><?php
        ?><p><?php echo $mail;?></p>
    </div>
    <!-- Tableau des factures -->
    <div class="container_facture"><?php
        function CallAPI() {
            $id = $_POST["id"];
            $url = "http://localhost:5000/api/v1/users/".$id;
            $opts = array('http' =>
                array(
                    'method' => 'GET',
                    'header' => 'Authorization: Bearer '.$_SESSION['token'],
                )
            );
            $context = stream_context_create($opts);
            $raw = file_get_contents($url, false, $context);
            $json = json_decode($raw,true);
            $facture = $json['factures'];?>
            <div class="ligne_fact">
                <div class="fact_date">
                    <p class="date_fact">30-05-2023 16:00:00</p>
                </div>
                <div class="fact_produit">
                    <p class="prod_fact">Bureau design</p>
                </div>
                <div class="fact_prix">
                    <p class="prod_fact">269.99€</p>
                </div>
            </div><?php
        }
        CallAPI() ?>
    </div>
</div>
<!-- FIN FICHE CLIENT -->