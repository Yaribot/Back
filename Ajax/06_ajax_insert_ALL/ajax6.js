$(document).ready(function (){
    $('#submit').click(function (event) {
        event.preventDefault();
        ajax();
    });

    function ajax()
    {
        var prenom = $('#prenom').val();
        console.log(prenom);

      

        var nom = $('#nom').val();
        console.log(nom);

       

        var sexe = $('#sexe').val();
        console.log(sexe);

      

        var service = $('#service').val();
        console.log(service);

       

        var date_embauche = $('#date_embauche').val();
        console.log(date_embauche);

        var salaire = $('#salaire').val();
        console.log(salaire);

        var parameters = {
            prenom: prenom,
            nom: nom,
            sexe: sexe,
            service: service,
            date_embauche: date_embauche,
            salaire: salaire,
        }
        console.log(parameters);

        $.post("ajax6.php", parameters, function (data) {
            
            $('#resultat').html(data.resultat);
            $('#message').html(data.message);

        }, 'json');

        $('#form1')[0].reset(); // permet de rebouter le formulaire et de vider chaque champs
    }
});