<?php 
echo '<pre>'; print_r($_POST); echo'</pre>';

// on vérifie si on a bien cliqué sur le bouton submit qui à pour attribut name 'submit', si nous avions plusieurs formulaire sur la même page, la condition permet de différencier quel formulaire à été validé 
if(isset($_POST['submit']))
{
    // 1er argument :
    $destinataire = "yannis.aribot@lepoles.com";

    // 2eme argument : 
    $sujet = $_POST['objet'];

    //3eme argument
    $message = $_POST['message'];

    //4eme argument /!\ OBLIGATOIRE !!
    $entetes = "MIME-Version 1.0 \n"; //est un standard internet qui étend le format de données des courriels pour supporter des textes en différents codage des caractères autres que l'ASCII, des contenus non textuels, des contenus multiples, et des informations d'en-tête en d'autres codages que l'ASCII.

    // entetes expéditeur : toujours 'From' et non 'De' par exemple
    $entetes .= "From: $_POST[email]\n";

    //entetes d'adresse de retour : 
    $entetes .= "Reply-to: yannis.aribot@lepoles.com \n";

    //priorité urgente
    $entetes .= "X-priority: 1\n";

    //type de contenu HTML
    $entetes .= "Content-type: text/html; charset=utf-8\n";



    mail($destinataire,$sujet,$message,$entetes); // fonction prédéfinie permettant l'envoi de mail / toujours 4 arguments : destinataire / sujet / message / expéditeur (en-tête).
    // l'ordre est crucial sinon le test ne fonctionne pas
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire de contact</title>
</head>
<body>
    <!-- 1.Réaliser un formulaire avec les champs suivant :  objet, email, message et un bouton submit
    2.Controler en PHP que l'on récepationne bien toutes les données du formulaire -->
    <div class="container">
        <h1 class="display-4 text-center">Formulaire de contact</h1><hr>

        <form class="col-md-4 offset-md-4" method="post" action=""> 
            <div class="form-group">
                <label for="exampleInputEmail1">Objet</label>
                <input type="text" class="form-control" id="objet" name="objet" placeholder="Enter objet">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Entrer email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea type="text" class="form-control" id="message" name="message" placeholder="Entrer message"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>