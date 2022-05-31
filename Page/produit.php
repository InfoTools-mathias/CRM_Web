<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Produit</title>
</head>
<!-- Header spéciale pour les pages -->
<?php include('header_page.php');?>

<!-------------------------------------->
<!--------------- Produit -------------->
<!-------------------------------------->

<div class="container_product_rdv">
    <?php function CallAPI() {//Fonction appel de l'API
      $url = "http://localhost:5000/api/v1/products";
      $raw = file_get_contents($url);
      $json = json_decode($raw,true);
        for ($i=0; $i < count($json); $i++) {?>
        <!-- Présentation des produits -->
        <div class="regroup_form_product_rdv">
          <!-- FORMULAIRE DE MODIFICATION D'UN PRODUIT -->
          <form class="form_product_edit" action="./edit/edit_product.php" method="POST">
              <input class="input name" name="name" value="<?php echo $json[$i]['name'];?>"></input>
              <textarea class="textarea_des des" name="description"><?php echo $json[$i]['description'];?></textarea>
            <div>
              <input class="input price" name="price" value="<?php echo $json[$i]['price'];?>"></input><label class="lbl_euro" for="">€</label>
              <?php if ($json[$i]['quantity'] >= 10) {?>
                <input class="input qte" name="qte" value="<?php echo $json[$i]['quantity'];?>"></input><?php
              } else {?>
                <input class="input qte red" name="qte" value="<?php echo $json[$i]['quantity'];?>"></input><?php
              }?>              
              <input type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>"></input>
            </div>
            <div>
              <button type="submit" name="edit_product" class="btn_classic btn_edit">Modifier</button>
            </div>
          </form>
          <!-- FIN FORMULAIRE DE MODIFICATION D'UN PRODUIT -->
          <!-- FORMULAIRE DE SUPPRESSION D'UN PRODUIT -->
          <form class="form_product_delete" action="./delete/delete_product.php" method="POST">
              <input class="input id" type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <button type="submit" name="delete_product" class="btn_classic btn_delete">Supprimer</button>
          </form>
          <!-- FIN FORMULAIRE DE SUPPRESSION D'UN PRODUIT -->
        </div>
        <?php
        }
    }
    //Appel de la fonction
    CallAPI()?>
</div>
<button class="btn_ajout" name="AddProduct" onclick="openForm()">CRÉER UN PRODUIT</button><!--Bouton pour créer un produit / Déclenche la fonction "openForm"-->
<!-- POP UP FORMULAIRE D'AJOUT D'UN PRODUIT -->
<div class="form-popup" id="myForm">
  <!-- FORMULAIRE D'AJOUT D'UN PRODUIT -->
  <form action="./send/send_product.php" method="POST" class="form-container">
    <label><b>Nom :</b></label>
    <input name="name_product" type="text" placeholder="Nom Produit" required>
    <label><b>Description :</b></label>
    <input name="description_product" type="text" placeholder="Description Produit" required>
    <label><b>Prix :</b></label>
    <input name="price_product" type="text" placeholder="Prix Produit" required>
    <label><b>Quantité :</b></label>
    <input name="quantity_product" type="text" placeholder="Quantité Produit" required>
    <button type="submit" class="btn"> CRÉER</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Annuler</button><!--Bouton pour annuler la création d'un rendez-vous / Déclenche la fonction "closeForm"-->
  </form>
  <!-- FIN FORMULAIRE D'AJOUT D'UN PRODUIT -->
</div>
<!-- FIN POP UP FORMULAIRE D'AJOUT D'UN PRODUIT -->
<!-- SCRIPT POUR AFFICHER POPUP AJOUT PRODUIT -->
<script>
  //Bouton "CRÉER UN PRODUIT"
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  //Bouton "ANNULER"
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }
</script>
<!-- FIN SCRIPT POUR AFFICHER POPUP AJOUT PRODUIT -->