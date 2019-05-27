<?php 
require_once('connexion.php');

extract($_POST);
$tab = array();
$result = $bdd->query('SELECT * FROM produits');

$tab['resultat'] = '<table class="table table-dark text-center">';
$tab['resultat'] = '<tr>';
    for($i = 0 ; $i < $result->columnCount(); $i++){
        $column = $result->getColumnMeta($i);
        $tab['resultat'] .= '<th>' .$column['name'] .'</th>';
    }
$tab['resultat'] = '</tr>';
while($produit = $result->fetch(PDO::FETCH_ASSOC))
    {
        $tab['resultat'] .= '<tr>';
        {
            foreach($produit as $values)
            {
                $tab['resultat'] .= "<td>$values</td>";
            }
        }

        $tab['resultat'] .= '</td>';
    }
$tab['resultat'] .= '</table>';

echo json_encode($tab);
