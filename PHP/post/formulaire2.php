<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <!-- 
        1.Réaliser un formulaire html avec les champs suivants : pseudo, mdp, confirmer mdp, nom, prenom, email, sexe, telephone, adresse, ville, code_postal et un bouton submit

        2.Controler en PHP que l'on receptionne bien toutes les données du formulaire

        3. Faites en sorte d'informer l'internaute si le pseudo n'est pas compris entre 2 et 20 caractères

        4. Faites en sorte d'informer l'internaute si les mots de passes ne sont pas identiques

        5. Faites en sorte d'informer l'internaute si l'email n'est pas au bon format (indice : fonction prédéfinie filter_var)

        6. Faites en sorte d'informer l'internaute si le code postal n'est pas de type numérique (is_numéric) et si il est différent de 5 caractères

        7. Faites en sorte d'informer l'internaute si le champs nom est laissé vide

        8. Faitees en sorte d'informer l'internaute si le champ téléphone n'est pas valide (indice : expression régulière -> fonction prédéfinie preg_match())

        9. Faitees en sorte d'informer l'internaute si il a correctement rempli le formulaire
     -->

    <?php 

    //.2
    echo '<pre>'; print_r($_POST); echo '</pre>';
    $error ="";
    if($_POST)
    {
        foreach($_POST as $key => $value )
        {
        echo"$key => $value<br>";
        }
        echo'<hr>';
    

        //.3
        if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20 ) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractère !! </div>';
        }

        //.4
        if($_POST['mdp'] !== $_POST['mdp_confirm'])
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Les mots de passes doivent être identiques !! </div>';
        }
            
        //.5
        //si le champs 'email' n'est pas (!) au bon format alord on rentre dans les accolades du IF
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Adresse non valide !! </div>';
        } 

        //.6

        if(iconv_strlen($_POST['code_postal']) !== 5 || !is_numeric($_POST['code_postal'])) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le code postal est non valide !! </div>';
        }
        
        //Si le champ 'nom' est vide, alors on entre dans la condition if
        //.7
        if(empty($_POST['adresse'])) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ adresse !! </div>';
        }
        
        //.8
        if(!preg_match('#^[0-9]{10}+$#', $_POST['telephone']))
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Caactères non valide, caractères non autorisés !! </div>';
        }
        //.9
        echo $error;
        if(empty($error))
        {
            echo '<div class = "col-md4 offset-md-4 alert alert-success text-center text-dark">Instruction validé !! </div>';
        }
    }


    ?>


    <form class="col-md-4 offset-md-4" method="post" action=""> 
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="mdp_confirm" name="mdp_confirm" placeholder="confirm Password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Sexe</label>
            <input type="text" class="form-control" id="sexe" name="sexe" placeholder="Enter gender">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter location">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter town">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Code Postal</label>
            <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter code postal">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</body>
</html>