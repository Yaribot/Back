<?php 
require_once('include/init.php');
require_once('include/header.php');

/*
    EXO : 
    1. Realiser la requete permettant de selectionner le produit par rapport à l'id_produit envoyé dans l'URL 
    2. Associer une méthode pour rendre le résultat exploitable 
    3. Créer une fiche produit avec les informations du produit : photo / categorie / description / couleur / taille / prix / public / selecteur quantité et un bouton d'ajout au panier

*/
if(isset($_GET['id_produit'])): // si l'indice 'id_produit' est définit dans l'URL

    $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $resultat->bindValue(':id_produit', $_GET['id_produit'], PDO::PARAM_INT);
    $resultat->execute();
    $id_prod = $resultat->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>'; print_r($id_prod); echo '</pre>';
        

?>
<h1 class="dislplay-4 text-center mt-4"><strong><?= $id_prod['titre']?></strong></h1><hr><br>

<div class="col-lg-8 col-md-4 col-mb-4">
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <img src="<?= $id_prod['photo']?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><?= $id_prod['titre']?></h5>
            <h5 class="card-title"><?= $id_prod['categorie']?></h5>
            <p class="card-text"><?= $id_prod['description']?></p>
            <h5 class="card-title"><?= $id_prod['couleur']?></h5>
            <p class="card-text"><?= $id_prod['taille']?></p>
            <h5 class="card-title"><?= $id_prod['prix']?></h5>
            <p class="card-text"><?= $id_prod['public']?></p>
            <label for="exampleFormControlSelect1">Quantité</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <?php 
            for ($i = 1; $i <= 10; $i++):
            ?>
            <option><?=$i?></option>
            <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success col-md-11">Ajouter au panier</button>

        </div>
    </div>
    </div>
</div>











<?php
else:  // Si l'indice id_produit n'est pas définit dans l'URL, on redirige vers la boutique
    header("Location; boutique.php"); 
endif;
require_once('include/footer.php');