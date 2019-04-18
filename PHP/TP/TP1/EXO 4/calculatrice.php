<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CALCULATRICE</title>
  </head>
  <body>
    <h1 class="dislplay-4 text-center mt-4">CALCULATRICE</h1>

<?php 
echo '<pre>'; print_r($_POST); echo '</pre>';



if($_POST)
{
    if($_POST['choix'] == 'division' && $_POST['nombre2'] == 0)
    {
       echo"<div class='col-md-4 offset-md-4 mx-auto text-center alert alert-danger'>ERROR</div>";
    }
    else
    {

        if($_POST['choix'] == 'addition')
        {
            $resultat = $_POST['nombre1'] + $_POST['nombre2'];
        }

        elseif($_POST['choix'] == 'soustraction')
        {
            $resultat = $_POST['nombre1'] - $_POST['nombre2'];
        }

        elseif($_POST['choix'] == 'multiplication')
        {
            $resultat = $_POST['nombre1'] * $_POST['nombre2'];
        }

        elseif($_POST['choix'] == 'division')
        {
            $resultat = $_POST['nombre1'] / $_POST['nombre2'];
        }
        
    echo"<div class='col-md-4 offset-md-4 mx-auto text-center alert alert-info'>= $resultat</div>";
    }
    

    

}
?>

    <div class="container">
    <form class="col-md-8 offset-md-2" method="post">    <!--action="formulaire_reception.php" pour envoyer les données sur une autre page-->
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1"></label>
                <input type="number" class="form-control" id="nombre1" name="nombre1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="choix" name="choix">
                <option value="addition">+</option>
                <option value="soustraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1"></label>
                <input type="number" class="form-control" id="nombre2" name="nombre2" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-dark col-md-4 offset-md-4">Calculer</button>
        </div>
    </form><hr><br><br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>