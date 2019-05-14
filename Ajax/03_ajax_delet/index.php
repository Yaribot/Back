<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- lien bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de notre fichier JS -->
    <script src="ajax3.js"></script>

    <title>03 AJAX DELET</title>
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">Supprimer un employé</h1><hr><br>
        <form method="post" action="" class="col-md-6 offset-md-3 text-center">
            <div id="employes">
                <?php 
                // réaliser un selecteur avec tout les nom des employés

                require_once('init.php');
                extract($_POST);

                $resultat = $bdd->query("SELECT * FROM employes");
                
                
                echo '<div class="form-group">';

                    echo '<select class="form-control" id="personne" name ="personne">';
                    while($employes = $resultat->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<option value='$employes[id_employes]'>$employes[nom]</option>";
                        
                    }
                    echo '</select>';
                echo '</select>';
                   
            
                ?>

            </div>
            <br>
            <input type="submit" value="supprimer" id="submit" class="col-md-12 btn btn-dark">
                 
        </form>
    </div>
</body>
</html>