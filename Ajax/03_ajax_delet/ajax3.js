$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax(); // pour chaque click sur le bouton, on execute la fonction ajax() déclarée ci-dessous
    });
    function ajax()
    {
        var id = $('#personne').val(); // on sélectionne le sélecteur id 'personne' afin de récupérer l'id de l'employé sélectionné
        console.log(id);

        var parameters = "id="+id; // on définit les paramètres à envoyer à la requete AJAX 'aller', qui sera transmit à la requete de suppression PHP dans le fichier ajax3.php
        console.log(parameters);

        
        /*
            post : méthode  JQUERY permettant d'envoyer des requetes AJAX en HTTP 
            arguments : 1. L' URL de destination  des requetes AJAX 'aller'
                        2. Les paramètres envoyés avec la requete AJAX  'aller'
                        3. En cas de succès on receptionne le résultat de la requete AJAX 'retour'
                        4. Type de transport de données 'JSON'
        */

        $.post("ajax3.php", parameters, function(data){
            $('#employes').html(data.resultat); // on sélectionne la div id 'employés' et on remplace le selecteur initial par le selecteur mis à jour, on écrase un sélecteur par un autre
            $('#message').html(data.message); // on sélectionne la div id 'message'(index.php) via la requete 'retour' le message de validation
        }, 'json');
    }
});