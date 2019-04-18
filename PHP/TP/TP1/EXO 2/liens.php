
<?php 
  echo '<pre>'; print_r($_GET); echo '</pre>';
if($_GET)
{
echo '<div class="col-md-4 offset-md-4 mx-auto text-center alert alert-info">';
  foreach($_GET as $key => $value)
  {
   if($key != 'id')
   {
      echo"Vous êtes $value ?<br>";
   }
  }
echo '</div>';
}
  
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>LIENS GET</title>
  </head>
  <body>
    <h1 class="dislplay-4 text-center mt-4">LIENS GET</h1><hr><br>

    <div class="container">
        <div class="row">
            <ul class="list-group text text-center col-md-6">
                <li class="list-group-item"><a href="?id=1&pays=francais">France</a></li>
                <li class="list-group-item"><a href="?id=2&pays=italien">Italie</a></li>
                <li class="list-group-item"><a href="?id=3&pays=espagnol">Espagne</a></li>
                <li class="list-group-item"><a href="?id=4&pays=anglais">Angleterre</a></li>  
            </ul>
            <ul class="list-group text text-center col-md-6">
                <li class="list-group-item"><a href="plats_choisi.php?id=5&plat=pizza">Pizza</a></li>
                <li class="list-group-item"><a href="plats_choisi.php?id=6&plat=salade">Salade</a></li>
                <li class="list-group-item"><a href="plats_choisi.php?id=7&plat=viande">Viande</a></li>
                <li class="list-group-item"><a href="plats_choisi.php?id=8&plat=poisson">Poisson</a></li>
            </ul>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>