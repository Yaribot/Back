$(document).ready(function () {
    $('#submit').click(function (event) {
        event.preventDefault();
        ajax();
    });

    function ajax()
    {
        var nom = $('#nom').val();
        console.log(nom);

        var couleur = $('#couleur').val();
        console.log(couleur);

        var quantite = $('#uantite').val();
        console.log(quantite);

        var parameters = {
            nom: nom,
            couleur: couleur,
            quantite: quantite,
        }
        console.log(parameters);



        $.post("fichier1.php", parameters, function (data) {

            $('#resultat').html(data.resultat);
            $('#message').html(data.message);

        }, 'json');
        $('#form1')[0].reset();
    }

   
});