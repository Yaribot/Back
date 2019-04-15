<?php 
require_once('include/init.php');
extract($_POST);

if(internauteEstConnecte()) // Si l'internaute est connecté, il n'a rien à faire sur la page connexion, on le redirige vers page profil
{
    header("Location: profil.php");
}

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    session_destroy();
}

// Si l'indice 'action' est définit dans l'URL et qu'il a comme valeur 'deconnexion' , cela veut dire que l'on a cliqué sur le lien 'deconnexion', du coup on supprime le fichier session
if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-6 offset-md-3 text-center alert alert-success">Félicitation !! vous êtes inscrit sur le site. Vous pouvez dès à présent vous connecter !!</div>';
}

if($_POST)
{
    // On sélectionne tout dans la table 'membre' à condition que l'a colonne pseudo ou email de la BDD soit bien égale au pseudo ou email saisie dans le formulaire
    $verif_pseudo_email = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo OR email = :email");
    $verif_pseudo_email->bindValue(':pseudo', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->bindValue(':email', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->execute();

    //si le résultat de la requete de sélection est supérieur à 0, cela veut dire que l'internaute a saisie un bon email ou bon pseudo , donc on rentre dans la IF
if($verif_pseudo_email->rowCount() > 0)
{
    $membre = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC);
    //on récupère les données de l'internaute qui a saisi le bon pseudo ou le bon email, on va pouvoir comparer les mots de passe
    echo '<pre>'; var_dump($membre); echo '</pre>';

    // Si le mot de passe de la BDD est égale au mot de passe que l'internaute a saisie dans le formulaire, on entre dans le IF 
    // if(password_verify($mdp, $membre['mdp'])) // si on hache le mot de passe à l'inscription (password_hash) / passord_verify permet de comparer une clé de hachage à une chaine de caractères

    // on entre dans le IF seulement dans le cas ou l'internaute a saisie le bon email/pseudo et le bon mdp
    if($membre['mdp'] == $mdp)
    {
        // on passe en revu les données de l'internaute qui a saisi le bon email/pseudo et le bon mdp 
        foreach($membre as $key => $value)
        {
            if($key != 'mdp') // on exclue le mdp
            {
                $_SESSION['membre'][$key] = $value; // pour chaque tour de boucle foreach, on enregistre les données de l'internaute dans son fichier session
            }
        }
        // echo 'mot de passe valide';
        // echo '<pre>'; var_dump($_SESSION); echo '</pre>';
        header("Location: profil.php"); // après enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil
    }
    else // on entre dans le ELSE dans le cas ou l'internaute n'a pas saisie le bon mot de passe
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le mot de passe est incorrect</div>';
    }
}
else // On entre dans le ELSE si l'internaute n'à pas saisie le bon email ou le pseudo
{
    $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo ou le mail <strong>' . $email_pseudo . '</strong> est incorrect</div>';
}
}

// echo '<pre>'; var_dump($_POST); echo '</pre>';

require_once('include/header.php');
?>



<h1 class="display-4 text-center">CONNEXION</h1>

<?= $validate ?>
<?= $error ?>

<form class="col-md-6 offset-md-3" method="post" action="">
     <div class="form-row">
        <div class="form-group col-md-12 text-center">
            <label for="exampleInputEmail1">Email ou Pseudo</label>
            <input type="text" class="form-control" id="email_pseudo" name="email_pseudo" placeholder="Enter l'email ou le pseudo">
        </div>
        <div class="form-group col-md-12 text-center">
            <label for="exampleInputEmail1">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Enter votre mot de passe">
        </div>
        <button type="submit" class="btn btn-dark col-md-4 offset-md-4">Valider</button>
    </div>
</form>


<?= $validate ?>

<!-- 

    1.réaliseer un formulaire de connexion avec les champs suivants : email ou pseudo / mot de passe / boton submit
    2.Controler en php que l'on réceptionne bien toutes les données du formulire

 -->


<?php
require_once('include/footer.php');
