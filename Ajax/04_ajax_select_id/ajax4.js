$(document).ready(function ()
{
    
    var prenom = $('#personne').text(); // on récupère le contenu de la div, qui sera envoyé comme paramètre à la requete AJAX 'aller'
    console.log(prenom);

    var parameters = "prenom=" + prenom; // on définit les paramètres 
    console.log(parameters);

    // la réponse de la requete 'retour' AJAX se trouve dans 'data'
    $.post("ajax4.php", parameters, function (data){
    
        $('#resultat').html(data.resultat); // on selectionne la div id 'résultat' pour coller le tableaux $tab 'resultat' définit dans la page ajax4.php

    }, 'json');
    
});