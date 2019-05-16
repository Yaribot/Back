<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="ajax6.js"></script>

    <title>06 INSERT ALL</title>
</head>
<body>

<div class="container">
    <h1 class="display-4 text-center">06 INSERT ALL</h1><hr><br>


    <div id="resultat">
        <?php require_once('init.php'); ?>
        <?php $result = $bdd->query("SELECT * FROM employes"); ?>
            <table class="table table-dark text-center"><tr>
            <?php for($i = 0; $i < $result->columnCount(); $i++): 
                $colonne = $result->getColumnMeta($i); ?>

                <th><?= $colonne['name'] ?></th>
            
            <?php endfor; ?>
            </tr>
            <?php while($employes = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <?php foreach($employes as $value): ?>
                    <td><?= $value ?></td>
                <?php endforeach ?>
            </tr>
            <?php endwhile; ?>
            
            </table>
    </div>

    <br>

    <div id="message"></div>

    <br>
    <!-- l'id="form1" est la cible de ma commande restet() (dans ajax6.js) pour vider les champs -->
    <form method="post" action="" class="col-md-4 offset-md-4" id="form1"> 
        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter votre prenom">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter votre nom">
            </div>
            <select name="sexe" id="sexe">
                <option value="g">-- Genre --</option>
                <option value="f">Femme</option>
                <option value="m">Homme</option>
            </select>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Service</label>
                <input type="text" class="form-control" id="service" name="service" placeholder="Enter votre service">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Date d'embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" placeholder="Enter date">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Salaire</label>
                <input type="text" class="form-control" id="salaire" name="salaire" placeholder="Enter votre salaire">
            </div>
        </div>
        <br>
        <input type="submit" value="Selectionner" id="submit" class="col-md-12 btn btn-dark">
    </form>

    <br>

    <div id="personne" class="text-center"><?$prenom?></div>

</div>
    
</body>
</html>