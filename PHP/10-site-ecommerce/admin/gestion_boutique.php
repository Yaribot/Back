<?php 
require_once('../include/init.php');
extract($_POST);
extract($_GET);

// Si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page de connexion.php
if(!internauteEstConnecteEtEstAdmin())
{
    header("Location:" . URL . "connexion.php");
}

// ------------- SUPPRESSUION PRODUIT



//on entre dans le IF seulement dans le cas ou l'on a cliqué sur le bouton supression
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
    // EXO : requete de suppression / requete preparee
    $supr_data = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
    $supr_data->bindValue(":id_produit",$id_produit , PDO::PARAM_INT); // INTEGAR pour l'id.  id_produit fait référence à $_GET['id_produit'] (extract) 
    $supr_data->execute();
    echo 'suppresion produit';

    $_GET['action'] = 'affichage';

    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$id_produit</strong> a bien été supprimé !!</div>";
}

// ------------ ENREGISTREMENT PRODUIT
if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $photo_actuelle; // si on souhaite conserver la même photo en cas de modification, on affecte la valeur du champs photo 'hidden', c'est à dire l'URL de la photo selectionnée en BDD
    }
    if(!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploder une photo
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit la nom de la photo en concaténant la référence saisi dans le formulaire avec le nom de la photo
        // echo $nom_photo .'<hr>';

        $photo_bdd = URL . "photo/$nom_photo"; // on définit l'URL de la photo, c'est ce que l'on conserve en BDD 
        // echo $photo_bdd .'<hr>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo"; // on définit le chemin  physique de la photo sur le disque  dur du sever, c'est ce qui nous permettra de copier la photo dans le dossier photo
        // echo $photo_dossier .'<hr>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copier la photo dans le dossier photo . argument : copy(nom_temporaire_photo, chemin de destination)
    }

    // Exo : Réaliser la requete d'insertion permettant d'insérer un produit dans la table 'produit' dans la table (requete préparée)


    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
        $data_insert = $bdd->prepare("INSERT INTO produit(reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");

        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$reference</strong> a bien été ajouté !!</div>";
    }
    else
    {
        $data_insert = $bdd->prepare("UPDATE produit SET  reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit =  $id_produit");

        $_GET['action'] = 'affichage';

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° <strong>$id_produit</strong> a bien été modifié !!</div>";
    }


    

    foreach($_POST as $key => $value)
    {
        if($key != 'photo_actuelle') //on ejecte le champs 'hidden' de la photo
        {
            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        
    }
    $data_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);
    $data_insert->execute();
}

require_once('../include/header.php');

//  echo '<pre>'; print_r($_POST); echo '</pre>';
//  echo '<pre>'; print_r($_FILES); echo '</pre>';

 

$result_photo = $bdd->query("SELECT * FROM produit");
$produit = $result_photo->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($produit); echo '</pre>';
?>

<!-- AFFICHAGE PRODUIT -->

<!-- EXO : réaliser le traitement permettant l'affichage des produits sous forme de tableaux HTML -->


<!-- LIENS PRODUITS -->

<ul class="list-group col-md-4 offset-md-4 text-center">
  <li class="list-group-item bg-dark text-center text-white"><h5>BACK OFFICE</h5></li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE PRODUITS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT PRODUITS</a></li>
</ul>

<!-- FIN LIENS PRODUITS -->

<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>
 
    <h1 class="display-4 text-center">LISTE DES PRODUITS</h1>

    <?=$validate ?>

    <table class="col-md-6 mx-auto table table-dark text-center formulaire"><tr>
        <?php foreach($produit[0] as $indice => $value):?>

        
            <th><?= strtoupper($indice) ?></th>

        <?php endforeach; ?>
            <th>MODIFIER</th>
            <th>SUPPRIMER</th>
        </tr>
            <?php foreach($produit as $indice => $tab):?>
                <tr>
                <?php foreach($tab as $key2 => $value):?>

                    <?php if($key2 == 'photo'): ?>
                        <td><img src="<?=$value?>"alt="<?=$tab['titre'] ?>" class="card-img-top"></td>
                    <?php else: ?>
                        <td><?=$value?></td>
                    <?php endif; ?>

                <?php endforeach; ?>
                <td><a href="?action=modification&id_produit=<?= $tab['id_produit'] ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
                <td><a href="?action=suppression&id_produit=<?= $tab['id_produit'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certain ?'))"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
        <?php endforeach; ?>

    </table>

<?php endif; ?>




<?php 
if(isset($_GET['id_produit']))
{
    $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
    $resultat->bindValue(":id_produit",$id_produit , PDO::PARAM_INT);
    $resultat->execute();

    $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
    echo '<pre>'; print_r($produit_actuel); echo '</pre>';
}
                                                // IF                            ELSE
$reference = (isset($produit_actuel['reference'])) ? $produit_actuel ['reference'] : '';
$categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel ['categorie'] : '';
$titre = (isset($produit_actuel['titre'])) ? $produit_actuel ['titre'] : '';
$description = (isset($produit_actuel['description'])) ? $produit_actuel ['description'] : '';
$couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel ['couleur'] : '';
$taille = (isset($produit_actuel['taille'])) ? $produit_actuel ['taille'] : '';
$public = (isset($produit_actuel['public'])) ? $produit_actuel ['public'] : '';
$photo = (isset($produit_actuel['photo'])) ? $produit_actuel ['photo'] : '';
$prix = (isset($produit_actuel['prix'])) ? $produit_actuel ['prix'] : '';
$stock = (isset($produit_actuel['stock'])) ? $produit_actuel ['stock'] : '';
?>


<!-- 

    1.Réaliser un formulaire permettant d'insérer un produit dans la table 'produit' (sauf le champs : id_produit)

 -->
 
<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>

    <h1 class="display-4 text-center"><?=strtoupper($action) ?> D'UN PRODUIT</h1><hr>

    <form class="col-md-6 offset-md-3" method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter reference" value="<?=$reference?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Catégorie</label>
                <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter la catégorie" value="<?=$categorie?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter le titre"value="<?=$titre?>">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Entrer la description" value=""><?=$description?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Couleur</label>
                <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Indiquer la couleur" value="<?=$couleur?>">
            </div>
        <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Taille</label>
                <select class="form-control" id="taille" name="taille" value="taille">
                    <option value="xs" <?php if($taille =='xs') echo 'selected'; ?>>XS</option>
                    <option value="s" <?php if($taille =='s') echo 'selected'; ?>>S</option>
                    <option value="m" <?php if($taille =='m') echo 'selected'; ?>>M</option>
                    <option value="l" <?php if($taille =='l') echo 'selected'; ?>>L</option>
                    <option value="xl" <?php if($taille =='xl') echo 'selected'; ?>>XL</option>
                </select>
            </div>
            <div class="form-check col-md-12 offset-md-1">
                <input class="form-check-input" type="checkbox" value="m" <?php if($public =='m') echo 'checked'; ?> id="public" name="public">
                <label class="form-check-label" for="defaultCheck1">
                    Homme
                </label>
            </div>
            <div class="form-check col-md-12 offset-md-1">
                <input class="form-check-input" type="checkbox" value="f" <?php if($public =='f') echo 'checked'; ?> id="public" name="public">
                <label class="form-check-label" for="defaultCheck1">
                    Femme
                </label>
            </div>
            <div class="form-check col-md-12 offset-md-1">
                <input class="form-check-input" type="checkbox" value="mixte" <?php if($public =='mixte') echo 'checked'; ?> id="public" name="public">
                <label class="form-check-label" for="defaultCheck1">
                    Enfant
                </label>
            </div>

            <?php if(!empty($photo)): ?>
                <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>
                <img src="<?= $photo ?>" alt="<?= $titre ?>" class="card-img-top">
            <?php endif ?>
            <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">

            <div class="form-group">
                <label for="exampleFormControlFile1">Photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter un prix" value="<?=$prix?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" placeholder="Nombre de produit" value="<?=$stock?>">
            </div>
            <button type="submit" class="btn btn-dark col-md-4 offset-md-4"><?=$action?></button>
        </div>
    </form>
<?php endif; ?>











<?php
require_once('../include/footer.php');