<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>TCHAT</title>
</head>
<body>
    <!-- 
        Exercice : espace de dialogue  (tchat)
        1. Modelisation et création 
            BDD : tchat
            Table : commentaire
                    id_commentaire        // INT(3) PK - AI
                    pseudo                // VARCHAR (20)
                    dataEnregistrement    // DATETIME
                    message               // TEXT
        2. Connexion à la BDD
        3. Création d'un formulaire HTML (pour l'ajout de message)
        4. Recuperation et affichage des saisies en PHP ($_POST)
        5. Requete SQL d'enregistrement (INSERT)
        6. Affichage des messages
     -->

     <div classe="container">
        <h2 class="display-4 text-center">EXO : TCHAT</h2><hr>
        <?php 
        $bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

        echo '<pre>'; var_dump($_POST); echo '</pre>';

        if($_POST)
        {
            foreach($_Post as $key =>$value)
            {
                $_POST[$key] = strip_tag($value);
                // on passe en revue le formulaire en executant la fonction strip_tag sur chaque valeur saisie dans le formulaire
            }
            extract($_POST);
            // $req = "INSERT INTO commentaire (pseudo, dataEnregistrement,message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')"

            // $resultat = $bdd->exec($req);

            // echo "nombre d'enregistrement : $resultat<br>";

            // echo $req;
            // $req = "INSERT INTO commentaire (pseudo, dataEnregistrement, message) VALUES (:pseudo, NOW(), :message)";
            $resultat = $bdd->prepare("INSERT INTO commentaire (pseudo, dataEnregistrement, message) VALUES (:pseudo, NOW(), :message)");
            $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $resultat->bindValue(':message', $message, PDO::PARAM_STR);
            $resultat->execute();

            // echo $req;

            /* 
                INJECTION SQL : 
                ok'); DELETE FROM commentaire; (

                FAILLES XSS : 
                <script type"text/javascript">
                var point = true;
                while(point == true)
                alert("J'ai planté ton site, ta la haine !?")
                </script>

                <style>
                body{
                    display: none;
                }
                </style>

                Pour parer aux failles XSS, il existe plusieurs fonctions prédéfinies : 
                - strip_tags() : permet de supprimer les balises HTML 
                - htmlspecialchars() : permet de rendre innofensives les balises HTML
                - htmlentities() : permet de convertir les balises HTML en entités HTML
            */

            

           

             $resultat = $bdd->query("SELECT pseudo, message, DATE_FORMAT (dataEnregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT (dataEnregistrement, '%H:%i,%S') AS heurefr FROM commentaire ORDER BY dataEnregistrement DESC");

             //echo '<pre>'; var_dump($_POST); echo '</pre>';

           
            while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                // echo '<pre>'; var_dump($commentaire); echo '</pre>';
                 echo'<div class="col-md-6 offset-md-3 alert alert-secondary">';
                    echo "<div><em>Par <strong> $commentaire[pseudo]</strong>, le $commentaire[datefr] à $commentaire[heurefr]</em></div><hr>";
                    echo "<div class='text-justify'>$commentaire[message]</div>";
                 echo '</div>';
            }
            
            echo "<hr><div class='text-center'>Nombre de commentaire(s) : <strong class='badge badge-danger'>" . $resultat->rowCount() . '</strong></div>'; 
        }

        ?>

        <form class="col-md-4 offset-md-4 text-center" method="post" action=""> 
        <div class="form-group">
                <label for="exampleInputEmail1">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Entrer message</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
     </div>
</body>
</html>