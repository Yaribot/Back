<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>TP ELEVES</title>
  </head>
  <body>
    <h1 class="dislplay-4 text-center mt-4">TP ELEVES</h1><hr><br>

<?php 

extract($_POST);
// echo '<pre>'; print_r($_POST); echo '</pre>';

    // echo '<pre>'; print_r($eleve); echo '</pre>';
$tel_error = "";
$nom_error = "";
$error = "";
$error = "";
$error = "";
$validate = "";
    
if($_POST)
{
    

    

    if(empty($telephone) || iconv_strlen($telephone) !== 10 || !is_numeric($telephone) || !preg_match('#^[0-9]{10}+$#', $telephone)) 
        {
            $tel_error .= '<small class = "alert alert-danger text-center text-dark">Le n° de telephone n\'est pas valide !! </small>';
        }
    

    if(empty($nom) || iconv_strlen($nom)  < 2 || iconv_strlen($nom) > 20 ) 
        {
            $nom_error .= '<small class = "alert alert-danger text-center text-dark">Le nom n\'est pas valide !! </small>';
        }
    
    if(empty($tel_error) && empty($nom_error))
        {
            
           
            $pdo = new PDO('mysql:host=localhost;dbname=eleve', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

            $resultat = $pdo->prepare("INSERT INTO eleves (nom, prenom, classe, parents, telephone) VALUES (:nom, :prenom, :classe, :parents, :telephone)");

            $affiche_eleves = $pdo->query("SELECT * FROM eleves");
            $eleve = $affiche_eleves->fetchAll(PDO::FETCH_ASSOC);

            foreach($eleve as $key1 => $tab)

                {
                    
                    foreach($tab as $key2 => $value2)
                    {
                        
                        echo"$value2<br>";
                    }
                }

            foreach($_POST as $key => $value)
                {
                    $resultat->bindValue(":$key", $value, PDO::PARAM_STR);
                    
                }
                $resultat->execute(); 

            $validate .= '<div class = "col-md-4 offset-md-4 alert alert-success text-center text-dark">Eleve enregistrer !! </div>';   
        }   
    
    // foreach($_POST['eleves'] as $key => $value)
    // {
    //     echo "$key => $value<br>";
    // }
    
}

?>

    <div class="container">
    <?="$validate" ?>
        <form class="col-md-8 offset-md-2" method="post">    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nom</label>
                    <?="$tel_error" ?>
                    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Enter votre nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter votre prénom">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Classe</label>
                    <input type="text" class="form-control" id="classe" name="classe" placeholder="Enter votre classe">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Parents</label>
                    <input type="text" class="form-control" id="parents" name="parents" placeholder="Enter vos parents">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Telephone</label>
                    <?="$tel_error" ?>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter votre n° de telephone">
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