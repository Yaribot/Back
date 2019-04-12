<?php 
$formule = '';
$photo = '';
$prix = 0;

if (!= $_GET) {
    $formule = $_GET['menu'];
    $photo = $_GET['photo'];
    $prix = 0;
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Srisakdi" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <title></title>




  </head>
  <body>
    
    <div class="container">

        <header classe="col-md-12">
            <h1 class="display-4"><i class="fas fa-kiwi-bird"></i>Au Pois gourmand</h1>
        </header>
<?php
if(!=($_GET){
?>  
    <main>

        <section class="row">
            <!-- <div class="d-flex justify-content-around"> -->

                <div class="p-2 col-md-4 offset-md-1">

                    <img src="img/rome.jpg" alt="">
                    <h3>Formule Rome</h3>
                    <p>
                    Tomates buratrina<br>Rizotto aux asperges<br>Panna cotta
                    </p>
                    <button type="button" class="btn btn-info col-md-12">Choisir</button>

                </div>
            
            
            <!-- <div class="d-flex justify-content-around"> -->

                <div class="p-2 col-md-4 offset-md-2">
                <img src="img/nyork.jpg" alt="">
                    <h3>Formule New-York</h3>
                    <p>
                    César salade<br>Cheese burger<br>Cheesecake
                    </p>
                    <button type="button" class="btn btn-danger col-md-12">Choisir</button>

                </div>
            
        </section>
       <section class="row">
            <!-- <div class="d-flex justify-content-around"> -->

                <div class="p-2 col-md-4 offset-md-1">
                <img src="img/delhi.jpg" alt="">
                    <h3>Formule Delhi</h3>
                    <p>
                    Poppadoms<br>Agneau byriani<br>Lassi mangue
                    </p>
                    <button type="button" class="btn btn-warning col-md-12">Choisir</button>

                
            </div>
            <!-- <div class="d-flex justify-content-around"> -->
                <div class="p-2 col-md-4 offset-md-2">
                <img src="img/hanoi.jpg" alt="">
                    <h3>Formule Hnoï</h3>
                    <p>
                    Nems aux crevettes<br>Poulet saté<br>Perles de coco
                    </p>
                    <button type="button" class="btn btn-primary col-md-12">Choisir</button>
                </div>
            
       </section>
    </main>

<?php
} else {
?>

       <section class="s3">
           <h2 class="display-6 h2com">Merci pour votre commande</h2>
           <div class="row">
               <div class="col-md-4"><img src="img/rome.jpg" alt="" id="imgvar"></div>
                <div class="col-md-8">
                    <h3>Votre formule ... arrive dans quelques instants...<i class="fas fa-kiwi-bird"></i></h3>
                    <p>Nous vous souhaitons une bonne dégustation.</p>
                    <p> Un café gourmand vous est proposé pour terminer votre pause gourmande en douceur.</p>
                    <p id="facture">Votre facture sera de ... €</p>
                    <button type="button" class="btn btn-success col-md-12">Choisir un autre menu</button>
                </div>
            </div>
       </section>
       <section>
           <div class="img d-flex justify-content-center">
               <img src="img/pg.jpg" alt="">
           </div>
       </section>
<?php 
}
?>
    <footer>
            <h4><i class="fas fa-kiwi-bird"></i>.....<i class="fas fa-kiwi-bird"></i>....<i class="fas fa-kiwi-bird"></i>...<i class="fas fa-kiwi-bird"></i>..<i class="fas fa-kiwi-bird"></i>.Au Pois gourmand</h4>
        </footer>
    

    
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>