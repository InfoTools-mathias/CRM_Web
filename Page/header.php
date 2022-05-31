<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="icon" href="../Image/Logo-InfoTools.png">
</head>
<?php session_start() ?>
<?php


?>
<!---------- Header ---------->
<section class='header'>
    <div class="image_utilisateur">
        <img class="img_user" src="../Image/img_user.svg" alt="">
    </div>
    <p class='msg_bvn'>Bienvenue <?php echo $_SESSION['name'];?></p>
    <div class='container-Btn'>
        <a href='produit.php' class='btn_head underline'>PRODUIT</a>
        <a href='client.php'  class='btn_head underline'>CLIENT</a>
        <a href='rdv.php'  class='btn_head underline'>RENDEZ-VOUS</a>
    </div>
<a href="./send/deconnexion.php"><div class="button_deco">
    <img class="img_deco" src="../Image/img_deco.svg" alt="">
</div></a>
</section>
</body>