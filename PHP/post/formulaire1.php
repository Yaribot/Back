<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire 1</title>
</head>
<body>
    <!-- Réaliser un formulaire HTML avec les champs suivants : email, mot de passe et un bouton submit -->
    <h1 class="display-4 text-center">Formulaire 1</h1><hr>

    <?php
    echo '<pre>'; print_r($_POST); echo '</pre>'; // permet d'observer les données saisie dans le, formulaire qui vont se stocker directement dans la superglobale $_POST, les indices correspondent aux attributs 'name' du formulaire HYML

    //Exo : afficher les données saisie dans le formulaire en passant par la superglobale $_POST

    //on parcourt la superglobale $_POST de type ARRAY avec une boucle foreach 
    foreach($_POST as $key => $value )
    {
      echo"$key => $value<br>";
    }
    echo'<hr>';

    // on extrait les valeurs une par une en passant par la superglobale $_POST en crochetant aux différents indices
    
    // Sans la condition if, au premier chargement de la page, nous avons 2 erreurs 'undifined', c'est du au fait que le formulaire n'a pas été validé et donc les indices 'email' et 'mdp' ne sont pas reconnu

    // si la condition if est vérifiée, si elle renvoi 'true', cela veut dire que l'on a soumit le formulaire et les indices 'email' et 'mdp' sont bien détectés
    
    if($_POST)
    {
    echo"Email : $_POST[email]<br>";
    echo"Mot de passe : " . $_POST['mdp'] . "<br>";

    echo'<hr>';
    }
    ?>

    <form class="col-md-4 offset-md-4" method="post" action=""> <!-- methode: comment vont circuler les données / action : url de destination-->
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"> <!--il ne faut surtout pas oublier les attributs name sur le formulaire html, sinon aucune donnée saisie ne sera récupéré en PHP-->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-dark">Submit</button>
</form>
</body>
</html>