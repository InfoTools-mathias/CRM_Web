<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Rendez-vous</title>
</head>
<!-- Header spéciale pour les pages -->
<?php include('header_page.php');?>

<!-------------------------------------->
<!------------- Rendez-Vous ------------>
<!-------------------------------------->

<button class="btn_ajout" name="AddProduct" onclick="openForm()">CRÉER UN RENDEZ-VOUS</button><!--Bouton pour créer un rendez-vous
                                                                                                  Déclenche la fonction "openForm"-->

<div class="container_product_rdv">
    <?php function CallAPI() {//Fonction appel de l'API
      $url = "http://localhost:5000/api/v1/meetings";
      $raw = file_get_contents($url);
      $json = json_decode($raw,true);
        for ($i=0; $i < count($json); $i++) {?>
        <!-- Présentation des produits -->
        <div class="regroup_form_product_rdv">
          <!-- FORMULAIRE DE MODIFICATION D'UN RENDEZ-VOUS -->
          <form class="form_rdv_edit" action="./edit/edit_rdv.php" method="POST">
            <div class="form_left_rdv">
                <input class="input date" name="name" value="<?php echo $json[$i]['date'];?>"></input>
                <input class="input users" name="users" value="<?php
                $users = $json[$i]['users'];
                for ($u=0; $u < count($users); $u++) {
                  echo $users[$u]['name'].' ';echo $users[$u]['surname'].' / ';
                }?>"></input>
            </div>
            <div class="form_center_rdv">
              <input class="input zip" name="zip" value="<?php echo $json[$i]['zip'];?>"></input>
              <input class="input adress" name="adress" value="<?php echo $json[$i]['adress'];?>"></input>              
              <input type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>"></input>
            </div>
            <div>
              <button type="submit" name="./edit/rdv" class="btn_classic btn_edit">Modifier</button>
            </div>
          </form>
          <!-- FIN FORMULAIRE DE MODIFICATION D'UN RENDEZ-VOUS -->
          <!-- FORMULAIRE DE SUPPRESSION D'UN RENDEZ-VOUS -->
          <form class="form_rdv_delete" action="delete_rdv.php" method="POST">
              <input type="hidden" class="input id" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <button type="submit" name="delete_rdv" class="btn_classic btn_delete">Supprimer</button>
          </form>
          <!-- FIN FORMULAIRE DE SUPPRESSION D'UN RENDEZ-VOUS -->
        </div>
        <?php
        }
    }
    //Appel de la fonction
    CallAPI()?>
</div>
<!-- POP UP FORMULAIRE D'AJOUT D'UN PRODUIT -->
<div class="form-popup" id="myForm">
<?php function CallAPI_() {
$url = "http://localhost:5000/api/v1/users";
$raw = file_get_contents($url);
$json = json_decode($raw,true);?>
<!-- FORMULAIRE D'AJOUT D'UN RENDEZ-VOUS -->
<form action="./send/send_rdv.php" method="POST" class="form-container">
    <input name="token" type="hidden" value="<?php echo $_SESSION['token'];?>"></input>
    <label><b>Date :</b></label>
    <input name="date_rdv" type="text" placeholder="Date Rendez-vous" required>
    <label><b>Adresse :</b></label>
    <input name="adresse_rdv" type="text" placeholder="Adresse Rendez-vous" required>
    <label><b>Code Postal</b></label>
    <input name="cp_rdv" type="text" placeholder="CodePostal Rendez-vous" required>
    <label><b>Commercial</b></label>
    <select name="com_rdv"><?php
    for ($a=0; $a < count($json); $a++) {
        if ($json[$a]['type'] == 1) {?>
            <option value="<?php
            echo $json[$a]['id'];?>"><?php echo $json[$a]['surname'].' '; echo $json[$a]['name'];?></option><?php
        }
    }?>
    </select>
    <button type="submit" class="btn"> CRÉER</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Annuler</button><!--Bouton pour annuler la création d'un rendez-vous
                                                                                       Déclenche la fonction "closeForm"-->
</form>
<!-- FIN FORMULAIRE D'AJOUT D'UN RENDEZ-VOUS -->
<?php }
CallAPI_()?>
</div>
<!-- FIN POP UP FORMULAIRE D'AJOUT D'UN PRODUIT -->
<!-- SCRIPT POUR AFFICHER POPUP AJOUT RENDEZ-VOUS -->
<script>
  //Bouton "CRÉER UN RENDEZ-VOUS"
  function openForm() {document.getElementById("myForm").style.display = "block";}
  //Bouton "ANNULER"
  function closeForm() {document.getElementById("myForm").style.display = "none";}
</script>
<!-- FIN SCRIPT POUR AFFICHER POPUP AJOUT RENDEZ-VOUS -->