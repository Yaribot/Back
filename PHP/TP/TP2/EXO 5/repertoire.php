<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>REPERTOIRE</title>
  </head>
  <body>
    <h1 class="dislplay-4 text-center mt-4">REPERTOIRE</h1>
<?php 

$bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
extract($_POST);
if($_POST)
{
    
    
    $resultat = $bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, adresse, date_de_naissance, sexe, ville, codepostal, description ) VALUES (:nom, :prenom, :telephone, :adresse, :date_de_naissance, :sexe, :ville, :codepostal, :description)");

    foreach($_POST as $key => $value)
    {
        $resultat->bindValue(":$key", $value, PDO::PARAM_STR);
        
    }
    $resultat->execute();

    

    echo '<pre>'; print_r($_POST); echo '</pre>';
}

?>
    <div class="container">
    <form class="col-md-8 offset-md-2" method="post">    <!--action="formulaire_reception.php" pour envoyer les données sur une autre page-->
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Enter votre nom">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter votre prénom">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter votre n° telephone">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" rows="3" placeholder="Enter votre adresse">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Date de naissance</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" placeholder="jj/mm/aaaa">
            </div>
            
            <div class="form-check col-md-12 offset-md-1">
                <input class="form-check-input" type="checkbox" value="m" id="sexe" name="sexe">
                <label class="form-check-label" for="defaultCheck1">
                    Homme
                </label>
            </div>
            <div class="form-check col-md-12 offset-md-1">
                <input class="form-check-input" type="checkbox" value="f" id="sexe" name="sexe">
                <label class="form-check-label" for="defaultCheck1">
                    Femme
                </label>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter votre ville">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Code Postal</label>
                <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Enter votre code postal">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Décrivez vous"></textarea>
            </div>
            <button type="submit" class="btn btn-dark col-md-4 offset-md-4">Envoyer</button>
        </div>
    </form><hr><br><br>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>