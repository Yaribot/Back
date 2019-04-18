<?php 


echo '<pre>'; print_r($_POST); echo '</pre>';
foreach($_POST as $key => $value)
{
    echo "$key : $value<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>RECEPTION DONNEES</title>
</head>
<body>
    <h1 class="dislplay-4 text-center mt-4">RECEPTION FORMULAIRE</h1><hr><br>
    
</body>
</html>