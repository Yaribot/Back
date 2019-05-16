$(document).ready(function (){
    $("#personne").change(function () {
        ajax();
    }); 
    function ajax(){

        var service = $('#personne').val();
        console.log(service);
    
        var parameters = "service="+ service;
        console.log(parameters);
        
        $.post("ajax7.php", parameters, function (data) {
    
            $('#resultat').html(data.resultat);
    
        }, 'json');
    }
});