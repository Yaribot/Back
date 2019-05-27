<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    

    

    <title>EXO AJAX</title>

</head>
<body>

<div class="container"></div>
    <h1 class="display-4 text-center">EXO AJAX</h1><hr><br>
    <form method="post" action="" class="col-md-4 offset-md-4" id="form1">
        <div class="form-group">

        <div id="resultat"></div>

        <div id="message"></div>

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom du produit">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Couleur</label>
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Enter la couleur">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Quantité</label>
            <input type="text" class="form-control" id="quantite" name="quantite" placeholder="Indiquer la quantite de produit">
        </div>
        <input type="submit" value="Selectionner" id="submit" class="col-md-12 btn btn-dark">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="fichier-aj.js"></script>    
</body>
</html>