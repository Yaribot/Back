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
    <form class="col-md-6 offset-md-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="mdp" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-dark">Submit</button>
</form>
</body>
</html>