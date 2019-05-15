<?php
require_once('init.php');
extract($_POST);
$tab = array();


$result = $bdd->query("SELECT * FROM employes WHERE prenom = '$prenom'");
// echo '<pre>'; print_r($result); echo '</pre>';


// ------------REQUETE RETOUR TABLEAU

$tab['resultat'] = '<table class="col-md-6 mx-auto table table-dark text-center"><tr>';
for($i = 0; $i < $result->columnCount(); $i++)
{
    $colonne = $result->getColumnMeta($i);
    $tab['resultat'] .= "<th>$colonne[name]</th>";
}
$tab['resultat'] .= "</tr><tr></tr>";

$employes = $result->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($employes); echo '</pre>';
foreach($employes as $value)
{
    $tab['resultat'] .="<td>$value</td>";
}


$tab['resultat'] .= '</table>';


echo json_encode($tab);