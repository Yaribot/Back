$(document).ready(function(){
    $('#submit').click(function (event) {
        event.preventDefault();
        afficheProduit();
    });

    function afficheProduit()
    {
        var resultat = $('#resultat').val();
        console.log(resultat);
        var parameters = "resultat=" + resultat;
        console.log(parameters);

        $.post('ajax.php', parameters, function(data){
            $('#resultat').html(data.resultat);
        },'json');
    }
}); 