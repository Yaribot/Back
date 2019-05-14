
// On sélectionne le DOM auquel on associe la méthode 'ready' qui executera la fonction une fois que le DOM sera chargé complètement 
$(document).ready(function(){ 
    // On sélectionne le bouton submit auquel on associe l'évènement 'click'
    // 'event' représente l'évènement 'click'
    $('#submit').click(function(event){
        event.preventDefault(); // preventDefault() fonction prédéfinit, permet d'annuler le comportement du bouton submit qui a pour role de recharger le code de la page 
        ajax(); // fonction utilisateur executée ci-dessous
    });

    function ajax()
    {
        var personne = $('#personne').val(); // on sélectionne le champs input afin de récupérer la valeur saisie dans le champ pour la transmettre à la requete 'aller' AJAX  
        //.val fonction permettant de récupérer la valeur dans le champs
        console.log(personne);

        var parameters = "personne="+personne; // on définit le paramètre à envoyer avec la requete 'aller' AJAX  
        // "personne=" permet de définir ou le paramètre va être envoyé dans le fichier PHP ($personne)        
        console.log(parameters);

        // la méthode 'post' de JQUERY permet d'envoyer des requetes HTTP  AJAX, plusieurs paramètres: 
        /*
            1. L'URL de destination  des requetess AJAX 
            2. Les paramètres à fournir à la requète 
            3. En cas de succès, function(data) récupère les données de la requete 'retour', tout se trouve dans 'data'
            4. Type de transport de données : JSON 
        */
        $.post("ajax2.php", parameters, function(data){
            $('#resultat').html(data.resultat); // on selectionne la div  id 'resiltat et on accroche le message d'erreur ou de validation à l'intérieur
            // data.resultat --> résultat correspond à l'indice 'résultat' du tableau array $tab['resultat'] du fichier ajax2.php
            $('#personne').val(''); // permet de vider le champs input une fois le formulaire validé
        }, 'json');
    }
});