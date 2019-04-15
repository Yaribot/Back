<?php 
require_once('../include/init.php');
extract($_POST);

// Si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page de connexion.php
if(!internauteEstConnecteEtEstAdmin())
{
    header("Location:" . URL . "connexion.php");
}

// ------------ ENREGISTREMENT PRODUIT
if($_POST)
{
    $photo_bdd = '';
    if(!empty($_FILES['photo']['name']))
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name'];
        echo $nom_photo .'<hr>';

        $photo_bdd = URL . "photo/$nom_photo";
        echo $photo_bdd .'<hr>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        echo $photo_dossier .'<hr>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
}

require_once('../include/header.php');

 echo '<pre>'; print_r($_POST); echo '</pre>';
 echo '<pre>'; print_r($_FILES); echo '</pre>';

?>


<h1 class="display-4 text-center">CONNEXION</h1>
<!-- 

    1.Réaliser un formulaire permettant d'insérer un produit dans la table 'produit' (sauf le champs : id_produit)

 -->

 <form class="col-md-6 offset-md-3 form1" method="post" action="" enctype="multipart/form-data">
     <div class="form-row">
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Référence</label>
            <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter reference">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter la catégorie">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter le titre">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Couleur</label>
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Indiquer la couleur">
        </div>
       <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Taille</label>
            <select class="form-control" id="taille" name="taille" value="taille">
                <option>XS</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>
        </div>
        <div class="form-check col-md-12 offset-md-1">
            <input class="form-check-input" type="checkbox" value="Homme" id="public">
            <label class="form-check-label" for="defaultCheck1">
                Homme
            </label>
        </div>
        <div class="form-check col-md-12 offset-md-1">
            <input class="form-check-input" type="checkbox" value="Femme" id="public">
            <label class="form-check-label" for="defaultCheck1">
                Femme
            </label>
        </div>
        <div class="form-check col-md-12 offset-md-1">
            <input class="form-check-input" type="checkbox" value="Enfant" id="public">
            <label class="form-check-label" for="defaultCheck1">
                Enfant
            </label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter un prix">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Nombre de produit">
        </div>
        <button type="submit" class="btn btn-dark col-md-4 offset-md-4">Valider</button>
    </div>
</form>











<?php
require_once('../include/footer.php');