<?php 
require_once('include/init.php');

if(!internauteEstConnecte()) // Si l'internaute n'EST PAS (!) connecté, il n'a rien à faire sur la page profil, on le redirige vers la page connexion
{
    header("Location: connexion.php");
}

require_once('include/header.php');

// echo '<pre>'; print_r($_SESSION); echo '</pre>';



// foreach($_SESSION['membre'] as $key => $value)
// {
//     if ($key != 'id_membre' && $key != 'statut')
//     {
//         echo "$key => $value<br>";
//     }
// }

?>
 
 <!-- Exo :  Afficher le pseudo de l'internaute en passant par son fichier -->
<h1 class="display-4 text-center">BONJOUR <strong class="text-info"><?=$_SESSION['membre']['pseudo']?></strong></h1><hr>

<!-- Réaliser une page profil en afichant toutes les données de l'internaute contenu dans la session sauf l'id_membre et le statut -->

<table class="col-md-6 mx-auto table table-dark text-center">

<!-- les ':' et les endif / endforeach remplace les accolades {} -->
<?php foreach($_SESSION['membre'] as $key => $value):?>
    <tr>
    <?php if ($key != 'id_membre' && $key != 'statut'):?> <!-- on exclue id_membre et statut -->

        <th><?= $key ?></th><td><?= $value ?></td>

    <?php endif; ?>
    </tr>
<?php endforeach; ?>
</table>

<?php 
// si le statut dans la session, donc dans la BDD est à 1, cela veut dire que l'on est administrateur du site 
if($_SESSION['membre']['statut'] == 1)
    $statut = "ADMIN";
else // on tombe dans le else si le statut est à 0, donc si on est membre classique du site
    $statut = 'MEMBRE';
?>
<h3 class="text-center">Vous êtes <strong class="text-info"><?= $statut ?></strong> du site</h3>

<?php
require_once('include/footer.php');