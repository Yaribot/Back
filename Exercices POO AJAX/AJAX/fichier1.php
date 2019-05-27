<?php
require_once('init.php');
extract($_POST);

$tab= array();

if(empty($nom) &&  empty($couleur) && empty($quantite))
{
    $tab['message'] = '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Veuillez renseigner tout les champs !!</div>';
    
}else{

    $result = $bdd->query("INSERT INTO produits (nom, couleur, quantite) VALUES ('$nom', '$couleur', '$quantite')");
    
    $tab['message'] = '<div class="col-md-6 offset-md-3 text-center alert alert-success">le produit <strong>' . $nom . '</strong> à bien été enregistré !</div>';
}

$result = $bdd->query("SELECT * FROM produits");

$tab['resultat'] = '<table class="table table-dark text-center"><tr>';
    
    
    for($i = 0; $i < $result->columnCount(); $i++)
    {
        $colonne = $result->getColumnMeta($i);
        $tab['resultat'] .= "<th>$colonne[name]</th>";
    }
    $tab['resultat'] .= '</tr>';

    while($list = $result->fetch(PDO::FETCH_ASSOC))
    {
        $tab['resultat'] .= '<tr>';

        foreach($list as $value)
        {
             $tab['resultat'] .="<td>$value</td>";
        }

        $tab['resultat'] .= '</tr>';
    }
   

$tab['resultat'] .= '</table>';

echo json_encode($tab);

// echo '<pre>';print_r($list);'</pre>';