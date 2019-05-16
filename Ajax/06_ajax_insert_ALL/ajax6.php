<?php


require_once('init.php');
extract($_POST);
$tab = array();


//------------ REQUETE INSERTION


// dans ce cas condition if avec '&&'(et) et non des '||'(ou), et ne pas renseigner empty($sexe) car il y aura toujours une valeure dans $sexe: f, m ou g 

if(empty($prenom) &&  empty($nom) && empty($service) && empty($date_embauche) && empty($salaire))
{
    $tab['message'] = '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Veuillez renseigner tout les champs !!</div>';
    
}else{

    $result = $bdd->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$prenom', '$nom', '$sexe', '$service', '$date_embauche', '$salaire')");
    
    $tab['message'] = '<div class="col-md-6 offset-md-3 text-center alert alert-success">l\'employé <strong>' . $prenom . '</strong> à bien été enregistré !</div>';
}

$result = $bdd->query("SELECT * FROM employes");
   
$tab['resultat'] = '<table class="table table-dark text-center"><tr>';
    
    
    for($i = 0; $i < $result->columnCount(); $i++)
    {
        $colonne = $result->getColumnMeta($i);
        $tab['resultat'] .= "<th>$colonne[name]</th>";
    }
    $tab['resultat'] .= '</tr>';

    while($employes = $result->fetch(PDO::FETCH_ASSOC))
    {
        $tab['resultat'] .= '<tr>';

        foreach($employes as $value)
        {
             $tab['resultat'] .="<td>$value</td>";
        }

        $tab['resultat'] .= '</tr>';
    }
   

$tab['resultat'] .= '</table>';

echo json_encode($tab);
