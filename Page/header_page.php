<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="icon" href="../Image/Logo-InfoTools.png">
</head>
<?php session_start() ?>

<!---------- Header_Page ---------->

<section class='header_page'>
    <a href="Accueil.php"><div class="button_retour">
        <img class="img_retour" src="../Image/img_retour.svg" alt="">
    </div></a>
    <div class='container-Btn'>
        <a href='produit.php' class='btn_head underline'>PRODUIT</a>
        <a href='client.php' class='btn_head underline'>CLIENT</a>
        <a href='rdv.php' class='btn_head underline'>RENDEZ-VOUS</a>
    </div>
<a href="./send/deconnexion.php"><div class="button_deco">
    <img class="img_deco" src="../Image/img_deco.svg" alt="">
</div></a>
</section>
</body>