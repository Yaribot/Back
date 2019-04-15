<?php 
require_once('include/init.php');

extract($_POST); // $_POST['pseudo'] --> $pseudo

// echo '<pre>'; print_r($_POST); echo '</pre>';

if(internauteEstConnecte()) // Si l'internaute est connecté, il n'a rien à faire sur la page connexion, on le redirige vers page profil
{
    header("Location: profil.php");
}

// EXO 3
if($_POST)
{
    $verif_pseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $verif_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_pseudo->execute();
    if($verif_pseudo->rowCount() > 0)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Lepseudo <strong>' . $pseudo . '</strong> est déjà existant en BDD. Merci d\'en saisir un nouveau !!</div>';
    }

    if($mdp !== $conf_mdp)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Merci de vérifier les mots de passes !!</div>'; 
    }
    // EXO :  si l'internaute a bien rempli le formulaire, cela veut dire qu'il n'est pas passé dans les conditions if donc la variable $error est vide, nous pouvons donc executer le traitement de l'insertion (requete préparée)

    if(!$error)
    {
        // $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // on ne conserve jamais en clair les mots de passe dans la BDD, password_hash permet de créer une clé de hashage
        $data_insert = $bdd->prepare("INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)");
        foreach($_POST as $key => $value)
        {
            if($key != 'conf_mdp')
            {
                 $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
                //  $data_insert->bindValue(":pseudo", Yanndev, PDO::PARAM_STR);
                //  $data_insert->bindValue(":nom", Aribot, PDO::PARAM_STR);
                //  ...
            }
        }
        $data_insert->execute();
        header("Location: connexion.php?action=validate"); // header() fonction prédéfinie qui permet d'effectuer une redirection de page /URL
    }
}
require_once('include/header.php');
?>



<!-- 

    1. Créer un formulaire HTML corrsepondant à la table membre de la BDD 'site' (sauf id_membre et statut), ajouter le champs confirmer  mot de passe
    2. Contrôler en PHP que l'on recepationne  bien toutes les données du formulaire ($_POST)
    3. Contrôler la disponibilité du pseudo
    4. Faites en sorte d'informer l'internaute si les mdp ne sont pas identique

 -->
<h2 class="display-4 text-center"> INSCRIPTION</h2>
<?= $error ?>
<form class="col-md-6 offset-md-3" method="post" action="">
     <div class="form-row">
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter votre nom">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter votre prenom">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Mot-de-passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot-de-passe">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Confirmer mot-de-passe</label>
            <input type="password" class="form-control" id="conf_mdp" name="conf_mdp" placeholder="Confirmer mot-de-passe">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter votre email">
        </div>
        <div class="form-group form-check-inline col-md-6">
            <input type="checkbox" class="form-check-input" id="civilite" name="civilite" value="h">
            <label class="form-check-label" for="exampleCheck1">Homme</label>
        </div>
        <div class="form-group form-check-inline col-md-6">
            <input type="checkbox" class="form-check-input" id="civilite" name="civilite" value="f">
            <label class="form-check-label" for="exampleCheck1">Femme</label>
        </div>
        <div class="form-group col-md-8">
            <label for="exampleInputEmail1">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter votre ville">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Code postal</label>
            <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter le code postal">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter votre adresse">
        </div>
        <button type="submit" class="btn btn-dark col-md-4 offset-md-4">Valider</button>
    </div>
</form>











<?php 
require_once('include/footer.php');
?>