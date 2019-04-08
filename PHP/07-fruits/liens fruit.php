<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Liens fruit</title>
</head>
<body>
    <!--
        1. Effectuer 4 liens  HTML sur la même page avec le nom des fuits.
        2. Faites en sorte d'envoyer 'cerises' dans l'URL si on clic sur lien "cerises". (faites la même chose avec tous les fruits )
        3. Tenter d'afficher "cerises" sur la page web si il y l'on a cliqué dessus (si cerise est passé dans l'URL par conséquent/ même avec tout les fruits)
        4. Envoyer l'information à la fonction calcul() afin d'afficher le prix pour 1kg de cerise (pareil pour tout les fruits)
     -->
     <!-- condition ternaire PHP 7: si l'indice 'choix' est définit dans l'URL, c'est à dire que l'on a cliqué sur un lien, on affiche le fruit sinon on affiche un message d'erreur -->
    <div class="container text-center">
        <h1 class="display-4 text-center">LIEN FRUIT</h1><hr>

        <?php 
        // <?= ---> echo
        // ? remplace le if
        // : remplace le else
        ?>
                                                    <!-- echo                       if              else -->
            <h4>Votre choix : <strong class="text-info"><?= (isset($_GET['choix'])) ? $_GET['choix'] : "Aucun fruit sélectionné !"; ?></strong></h4><hr>
            <?php 
            require_once("fonction.php");
            //La condition permet de vérifier si l'indice 'choix' est bien définit dans l'URL, donc par conséquant que l'on a a cliqué sur un lien
            if(isset($_GET['choix']))
            {
                echo calcul($_GET['choix'], 1000);
            }
            
            // echo '<pre>'; print_r($_GET); echo'</pre>';

            ?>
            <ul class="col-md-2 offset-md-5 list-group">
                <li class="list-group-item"><a href="?choix=cerises">cerises</a></li>
                <li class="list-group-item"><a href="?choix=bananes">bananes</a></li>
                <li class="list-group-item"><a href="?choix=pommes">pommes</a></li>
                <li class="list-group-item"><a href="?choix=peches">pêches</a></li>
            </ul>
    </div>
     
     
     
     
</body>
</html>