<?php
require_once('init.php');
extract($_POST);

$tab= array();

// requete test
// $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('Yannis')");

if(!empty($personne))
{

    $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$personne')");
    $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$personne</strong> a bien été  enregisté</div>";
}
else
{
    $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-danger text-center'>Merci de saisir un prénom</div>";
}

echo json_encode($tab); // pour pouvoir faire véhiculer des données en HTTP via une requete AJAX, nous devons encoder les données en JSON, c'est un format léger. C'est la réponse de la requete 'retour' AJAX que l'on retrouve dans fonction(data) dans le fichier ajax2.js