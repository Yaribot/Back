<?php
require_once('init.php');
extract($_POST);
$tab = array();

//---------------- REQUETE DE SUPPRESSION 
// requete test
// $result = $bdd->exec("DELETE FROM employes WHERE  id_employes = 990");
// echo $result;

$result = $bdd->exec("DELETE FROM employes WHERE  id_employes = '$id'");



//----------------- DECLARATION DU SELECTEUR A JOUR 

$result = $bdd->query("SELECT * FROM employes");
$tab['resultat'] = '<div class="form-group">';
$tab['resultat'] .= '<select class="form-control" id="personne" name ="personne">';
$tab['message'] = '<div class="col-md-6 offset-md-3 text-center alert alert-success">l\'employé avec l\'id <strong>' . $id . '</strong> à bien été supprimé !</div>'; // on crée un nouvel indice dans le tableau ARRAY pour stocker un message de validation

while($employes = $result->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'] .= "<option value='$employes[id_employes]'>$employes[nom]</option>";
    
}
$tab['resultat'] .= '</select>';
$tab['resultat'] .= '</div>';


echo json_encode($tab);
                   