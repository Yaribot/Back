<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Entrainement PHP</title>

</head>
<body>
<div class="container">
    <h2 class="display-4 text-center">Ecriture et affichage</h2><br>
    <!-- Nous pouvons écrire du HTML dans un fichier ayant l'extension PHP, l'inverse n'est pas possible -->

    <?php // Ouverture de la blaise PHP
    // Il est possible d'ouvrir la balise PHP autant de fois que l'on souhaite sur un fichier PHP


    echo 'Bonjour';  // echo est une instruction d'affichage que l'on peut traduire par 'affiche moi'

    echo '<br>';     // Nous pouvons également y mettre du HTML 


    print 'Bonjour'; // print est une autre instruction d'affichage , pas de différence avec 'echo'

    echo '<hr><h2 class="display-4 text-center">Commentaires</h2><hr>';


    // Fermeture de la balise PHP
    ?> 
    <?= "Allo" ?> <!-- le = remplace le 'echo' -->
    <strong>Bonjour</strong> <!-- Il est également possible de fermer  et ré-ouvrir PHP pour mélanger du code HTML et PHP -->

    <?php
    echo 'texte'; // Ceci est un commentaire sur une seul ligne 
    echo 'texte'; /* Ceci est un commentaire 

    sur plusieurs lignes
    */
    echo 'texte'; # Ceci est un commentaire sur une seul ligne


    echo '<hr><h2 class="display-4 text-center">Variables : Type / Déclaration / Affectation</h2><hr>';
    // Une variable est un espace nommé permettant de conserver une valeur

    // $2a -> !! / $a2 -> OK
    // Caractère autorisé : A à Z / a à z / de 0 à 9 
    // pas d'accents, pas d'espaces
    $a = 127; // affectation de 127 dans la variable nommé "a"
    // gettype() est une fonction prédéfini qui retourne le type d'une variable
    echo gettype($a); // il s'agit d'un entier : INTEGER
    echo '<br>';

    $b = 1.5;
    echo gettype($b); // un nombre à virgule : DOUBLE
    echo '<br>';

    $c = 'une chaine';
    echo gettype($c); // une chaine de charactères : STRING
    echo '<br>';

    // Entre quotes c'est une chaine de caractères
    $d = '127';
    echo gettype($d); // une chaine de caractères : STRING
    echo '<br>';

    $e = true;
    echo gettype($e); // BOOLEAN
    echo '<br>';

    $f = false;
    echo gettype($f); // BOOLEAN
    echo '<br>';

    echo '<hr><h2 class="display-4 text-center">Concaténation</h2><hr>';

    $x = 'Bonjour ';
    $y = 'Tout le monde !';
    echo $x . $y . '<br>'; // Point de concaténation que l'on peut traduire par  'suivi de'
    echo "$x $y <br>"; // entre guuillemets, les variables sont évaluées
    echo '$x $y <br>'; // entre simple quote, les variables ne sont pas évaluées, c'est une chaine de caractère
    echo 'aujourd\'hui<br>';  //si il y a une apostrophe dans la chaine de caractère, nous plaçons un antislash pour dire que c'est bien une apostrophe
    echo "aujourd'hui<br>";
    echo "Hey ! " . $x . $y . '<br>'; // concaténation texte et variables
    echo "<br>" , "coucou" , "<br>"; // concaténation avec une virgule ( la virgule et le point de concaténation sont similaire)


    echo '<hr><h2 class="display-4 text-center">Concaténation lors de l\'affectation</h2><hr>';

    $prenom1 = "Yannis";
    $prenom1 = "Claire";
    echo $prenom1 . '<br>'; // Cela remplace 'Yannis' par 'Claire', donc affiche 'Claire'

    $prenom2 = "Nicolas";
    $prenom2 .= " Marie";
    echo $prenom2 . '<br>'; // Cela rajoute sans remplacer la valeur précédente grace à l'opérateur '.=' , affiche 'Nicolas Maria'


    echo '<hr><h2 class="display-4 text-center">Constante et constante magique</h2><hr>';
    // Une constante  tout comme une variable permet de conserver une valeur mais comme son nom l'indique, la valeur est ... constante !! On ne pourra pas changer sa valeur durant l'éxécution du script
    define("CAPITALE", "Paris"); // Par convention, une constante se déclare toujours en majuscule
    // define("nom_de_la_constante", "valeur_de_la_constante");
    echo CAPITALE . '<br>';

    define("CAPITALE", "Rome");

    // define("CAPITALE", "Rome"); /!\ erreur !! il n'est pas possible de redéclarer une constante déjà définit

    // constante magique
    echo __FILE__ . '<br>' ; // chemin complet vers le fichier
    echo __LINE__ . '<br>' ;// affiche le numéro de la ligne
    //__FUNCTION__ / __CLASS__ / __METHOD__


    // Exo : afficher vert - jaune - rouge  (avec les tirets) en mettant chaques couleur dans une variable, faite en sorte que chaque mot soit de la bonne couleur

    $c1 = "vert -";
    $c2 = " jaune -";
    $c3 = " rouge";
    
    echo "$c1 $c2 $c3 <br>";

    ?>
</body>
</html>