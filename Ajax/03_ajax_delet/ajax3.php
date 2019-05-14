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


while($employes = $result->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'] .= "<option value='$employes[id_employes]'>$employes[nom]</option>";
    
}
$tab['resultat'] .= '</select>';
$tab['resultat'] .= '</div>';

echo json_encode($tab);
                   