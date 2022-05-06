<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Produit</title>
</head>
<?php include('header_page.php');?>

<!---------- Produit ---------->

<button class="btn_ajout" name="AddProduct" onclick="openForm()">CRÉER UN PRODUIT</button>

<div class="container_product_rdv">
    <?php function CallAPI() {
      $url = "http://localhost:5000/api/v1/products";
      $raw = file_get_contents($url);
      $json = json_decode($raw,true);
        for ($i=0; $i < count($json); $i++) {?>
        <div class="regroup_form_product_rdv">
          <form class="form_product_edit" action="./edit/edit_product.php" method="POST">
              <input class="input name" name="name" value="<?php echo $json[$i]['name'];?>"></input>
              <textarea class="textarea_des des" name="description"><?php echo $json[$i]['description'];?></textarea>
            <div>
              <input class="input price" name="price" value="<?php echo $json[$i]['price'];?>"></input><label class="lbl_euro" for="">€</label>
              <input class="input qte" name="qte" value="<?php echo $json[$i]['quantity'];?>"></input>
              <input type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>"></input>
            </div>
            <div>
              <button type="submit" name="edit_product" class="btn_classic btn_edit">Modifier</button>
            </div>
          </form>
          <form class="form_product_delete" action="./delete/delete_product.php" method="POST">
              <input class="input id" type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"></input>
              <button type="submit" name="delete_product" class="btn_classic btn_delete">Supprimer</button>
          </form>
        </div>
        <?php
        }
    }
    CallAPI()?>
</div>
<div class="form-popup" id="myForm">
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
    <button type="button" class="btn cancel" onclick="closeForm()">Annuler</button>
  </form>
</div>
<script>
	function openForm() {
    var div = document.getElementById("myForm");
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {div.style.display = "none";}
	}
  
	function closeForm() {
    var div = document.getElementById("myForm");
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {div.style.display = "none";}
	}
</script>