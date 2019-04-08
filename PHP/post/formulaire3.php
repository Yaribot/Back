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
    <!-- Réaliser un formulaire HTML (pseudo, email) en récupérant les données directement sur la page formulaire4.php -->
<h1 class="display-4 text-center">Formulaire 3</h1>
    <?php 
    
    echo '<pre>'; print_r($_POST); echo '</pre>';
    if($_POST)
    {
        
        foreach($_POST as $key => $value )
        {
        echo"$key => $value<br>";
        }
        echo'<hr>';

        if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20 ) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractère !! </div>';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Adresse non valide !! </div>';
        } 
    }

    ?>


    <form class="col-md-4 offset-md-4" method="post" action="formulaire4.php"> 
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>


</body>
</html>