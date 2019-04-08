<?php 
    $tab_fruit = array('cerises', 'bananes', 'pommes', 'peches');
    $tab_poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);
   
    echo'<pre>';var_dump($tab_fruit);'</pre>';
    echo'<pre>';var_dump($tab_poids);'</pre>';

    require_once("fonction.php");

    echo calcul($tab_fruit[0], $tab_poids[1]) . '<hr>';

    echo'<br>' . '<br>';

    foreach($tab_poids as $key => $value)
    {
        echo calcul($tab_fruit[0], $value) . '<hr>';
    }
    echo'<br>' . '<br>';

    echo '<table class="table-bordered text-center"><tr>';
        foreach($tab_fruit as $key1 => $value1)
        {
            foreach($tab_poids as $key => $value)
            {
                echo calcul($value1, $value) . '<hr>';
            }
        }
    echo '</tr></table><hr>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tableau Fruits PHP</title>
</head>
<body>
    <!-- 
        1- Déclarer un tableau ARRAY avec tout les fruits
	2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	3- Affichez les 2 tableaux
	4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.
	5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
	7- Faire un affichage dans une table HTML pour une présentation plus sympa.
     -->
     
</body>
</html>