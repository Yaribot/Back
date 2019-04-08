<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SESSION PHP</title>
</head>
<body>
    <div class="container text-center">
        <h1 class="display-4 text-center">SESSION PHP</h1><hr>

        <?php 
        //une session est un moyen simple de garder des variables accessibles quelque soit la page ou l'on se trouve 
        // par exemple, sans session active, nous ne pourrions naviguer sur un site tout en restant connecté
        // Les seesions sont conservé côté serveur puisqu'elles contiennent des données sensibles tel que votre email, nom, prenom etc... 
        session_start(); //permet de créer un fichier session se trouvant dans le dossier c:/xampp/tmp

        //On stock des données dans la session en créant des indices au tableau ARRAY 
        $_SESSION['pseudo'] = 'Yann';
        $_SESSION['nom'] = 'Aribot';
        $_SESSION['prenom'] = 'Yannis';

        echo '<pre>'; print_r($_SESSION); echo'</pre>';

        //vider une partie de la session
        unset($_SESSION['prenom']);
        echo '<pre>'; print_r($_SESSION); echo'</pre>';

        //supprimer la session 
        // session_destroy();

        ?>

    </div>
</body>
</html>