<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Entrainement PHP</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h2 class="display-4 text-center">Ecriture et affichage</h2>

        <hr>

        <!-- ecrire du html dans un php est usuel, mais pas l' inverse. Impossible -->

        <?php

        // ouverture de la balise php.

        // on peut en ouvrir ( mais fermer ensuite) autant de fois que l' on veut, selon nos besoins

        echo 'Bonjour';

        // echo est une instruction d' affichage => "affiche moi"

        echo '<br>';

        // on peut ecrire des balises html dans du php

        print 'Salam alikoum';

        // autre instruction d' affichage, pas de différnece avec echo

        echo '<hr> <h2 class="display-4 text-center">Comment insérer du commentaire en php</h2><hr>';

        // fermeture de la balise php

        ?>

        <?= "Priviet" ?>

        <!-- le = remplace le echo -->

        <strong>Shalom</strong>

        <!--  il  est également possible de fermer et réouvrir des php pour mélanger du html et du php -->

        <?php

        echo 'Ni Hao';

        // ceci est un commentaire sur une seule ligne

        # idem, une seule ligne

        echo 'Sabah El Kheir';

        /*              commentaire sur 

                             plusieurs lignes

        */

        echo '<hr> <h2 class="display-4 text-center">Variables: Types/ Declarations/ Affectations</h2><hr>';

        //  Une variable est un espace nommé permettant de conserver une valeur

        $a = 127;

        // on ne peut ecrire de chiffre après $, mais on peut ecrire $a2 ( masi pas $2a). On ne peut ecrire aussi d' accents, d' espaces...

        // ici, nous avons affecté la valeur 127 a 'a'

        echo gettype($a);

        // le navigateur va nous retourner Integer, type de valeur de 127 ( un entier)

        echo '<br>';

        $b = 1.5;

        echo gettype($b);

        echo '<br>';

        // le navigateur va nous retourner: double. L' équivalent de Float pour le php

        $c = "une chaine";

        echo gettype($c);

        echo '<br>';

        // va nous retourner String

        $d = '127';

        echo gettype($d);

        echo '<br>';

        // toujours un string car même si c' est un chiffre, il est entre "" et est donc interprété comme une chaine de caracteres

        $e = true;

        echo gettype($e);

        echo '<br>';

        // va retourner Boolean

        echo '<hr> <h2 class="display-4 text-center">Concaténation</h2><hr>';

        $x = "Salam ";

        $y = "Alikoum";

        echo $x . $y . '<br>';

        //  le '.' est l' équivalent du + pour concaténer, en php

        $x = "Ni";

        $y = " Hao";

        echo "$x $y <br>";

        // fonctionne aussi sans la concaténation

        // fonctionne car double quote. Mais avec des simple quote, ne fonctionne pas ( les variables ne seront pas évaluées, elles deviennent des chaines de caracteres)

        echo 'aujourd\' hui';

        echo '<br>';

        // echo 'aujourd' ui'

        // pbs ci dessus car usage des simple quotes, en conflit avec l' apostrophe de 'hui...on peut mettre des double quote, ou un anti slash pour que le navigateur interprete ça bien

        echo $x, " doit précéder ", $y, " pour signifier; bonjour en Pin Yin";

        // le point, comme ci dessus la virgule, servent a concaténer

        echo '<br>';

        echo '<hr> <h2 class="display-4 text-center">Concaténation lors de l\' affectation</h2><hr>';

        $prenom1 = "Mourad";

        $prenom1 = "Bruno";

        echo $prenom1 . '<br>';

        // Va afficher Bruno, car la réaffectation a ecrasé la valeur de la premiere affectation

        $prenom2 = "Mourad";

        $prenom2 .= " Bruno";

        echo $prenom2 . '<br>';

        // ici, grace a ".=" on va afficher " Mourad Bruno". On ajoute, et non remplace les deux  affectations

        echo '<hr> <h2 class="display-4 text-center">Constante et constante magique</h2><hr>';

        // une constante comme une variable permet de conserver une variable, sauf qu' on ne pourra lui réaffecter une autre valeur

        define("CAPITALE", "Paris");

        // la constante, par convention, est toujours declarée en majuscule. Ici, la constante est capitale, a laquelle on affecte la valeur Paris

        echo CAPITALE . '<br>';

        // define("CAPITALE", "Rome");

        // nou affiche une erreur car la constante est déjà définie

        // constant magique

        // double underscore _

        echo __FILE__ . '<br>';

        // affiche le chemin complet vers le fichier

        echo __LINE__ . '<br>';

        // affiche le numéro de la ligne

        // __FUNCTION__ / __CLASS__ / __METHOD__

        // exo: afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable. Faire en sorte que chaque mot soit de la bonne couleur

        // ci dessous, mon exo

        // $v = 'vert';

        // $j = 'jaune';

        // $r = 'rouge';

        // echo "<font color = green>" . $v . "<font color = black> - " . "<font color = yellow>" . $j . "<font color = black> - "  . "<font color = red>" . $r . '<br>';

        // correction du formateur

        $vert = '<span class="text-success">vert</span>';

        $jaune = '<span class="text-warning">jaune</span>';

        $rouge = '<span class="text-danger">rouge</span>';

        // $rouge = '<span style="color:red">rouge</span>

        // la solution juste ci dessus est valable si on n' est pas sur Bootstrap

        echo "$vert-$jaune-$rouge<br>";

        // ou alors

        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';

        echo '<hr> <h2 class="display-4 text-center">Opérateurs arithmétiques</h2><hr>';

        $a = 10;

        $b = 2;

        echo $a + $b . '<br>';

        echo $a - $b . '<br>';

        echo $a * $b . '<br>';

        echo $a / $b . '<br>';

        // Opérateurs et affectations

        $a += $b;

        // équivaut a $a = $a + $b

        echo $a . '<br>';

        $a -= $b;

        // équivaut a $a = $a - $b

        echo $a . '<br>';

        $a *= $b;

        // équivaut a $a = $a * $b

        echo $a . '<br>';

        $a /= $b;

        // équivaut a $a = $a / $b

        echo $a . '<br>';

        echo '<hr> <h2 class="display-4 text-center">Structures conditionelles (if/else) - opérateurs de comparaison</h2><hr>';

        //  Isset & Empty

        $var1 = 127;

        $var2 = '';

        if (empty($var1)) {

            echo " 0, vide ou non défini <br>";

        } else {

            echo " Cette variable n' est pas vide<br>";

            //  empty permet de tester si une variable ou non, et donc cette condition sera TRUE ou FALSE. Ici, FALSE, donc retournera le second echo

        }

        if (isset($var2)) {

            echo "var2 existe et est définie par rien<br>";

            //  isset teste l' existance d' une variable

        } else {

            echo "var2 n' existe pas";

        }

        /*

        OPERATEURS DE COMPARAISONS

        = égal à

        == comparaison de la valeur

        === comparaison de la valeur et du type

        < strictement inférieur à

        > strictement supérieur à

        <= inférieur ou égal

        >= supérieur ou égal

        ! n' est pas

        != différent de

        ||, OR => OU

        &&, AND => ET

        XOR: condition exclusive

        */

        $a = 10;

        $b = 5;

        $c = 2;

        if ($a > $b) {

            echo " A est bien supérieur a B<br>";

            // cas par défaut. Ou sinon, c' est le code du else qui va etre affiché

        } else {

            echo " non, c' est B qui est supérieur a A<br>";

        }

        //  if / else if / else

        if ($a > $b && $b > $c) {

            echo " ok, les deux conditions sont réunies<br>";

        } elseif ($a == 9 || $b > $c) {

            echo "Au moins une des deux conditions est fausse";

        } else {

            echo "tout est faux";

        }

        // elseif permet d' ajouter des cas supplémentaires a la condition IF

        // il peut y avoir plusieurs ELSEIF dans une même condition

        // si une des conditions supérieurs est vérifiée, ELSEIF bloque le script et toutes les conditions suivantes seront bloquées

        // condition exclusive

        if ($a == 10 xor $b == 6) {

            echo 'ok, condition exclusive<br>';

        }

        // XOR, condition exclusive, autorise juste une seule condition vraie. Si les deux ( ou encore plus) sont vraies, ou toutes fausses, alors XOR ne peut s' appliquer, et donc FALSE

        // forme contractée: 2éme possibilité d' ecriture

        echo ($a = 10) ? " A est égal a 10 <br>" : "A n' est pas égal a 10<br>";

        // condition ternaire: le ? remplace le IF, et les deux points le "ELSE"

        //  comparaison

        $varA = 1;

        $varB = '1';

        if ($varA == $varB) {

            echo "il s' agit de la même valeur<br>";

            // Ca fonctionne avec le double égalm, mais pas le triple, car si la valeur est la même, le type non ( INTEGER vs STRING)...voir plus haut

        }

        echo '<hr> <h2 class="display-4 text-center">Condition SWITCH</h2><hr>';

        $perso = 'Mario';

        switch ($perso) {

            case 'Luigi';

                echo "Vous avez choisi $perso <br>";

                break;

            case 'TOAD';

                echo "Vous avez choisi $perso <br>";

                break;

            case 'Bowser';

                echo "Vous avez choisi $perso <br>";

                break;

            default:

                echo "Vous etes fou, c' est Mario le meilleur <br>";

                break;

                // si on a une grande comparaison de cas, la condition SWITCH est a privilégier.

                // 'case' représente les cas dans lesquels nous pouvons potentiellement tomber

                // 'break' permet de stopper le script si nous rencontrons un des cas

        }

        // exo: faire la même chose avec du if, elseif, else

        // mon travail

        $perso = 'Mario';

        if ($perso == 'Luigi') {

            echo "Vous avez choisi $perso <br>";

        } elseif ($perso == 'Toad') {

            echo "Vous avez choisi $perso <br>";

        } elseif ($perso == 'Bowser') {

            echo "Vous avez choisi $perso <br>";

        } else {

            echo "Vous etes fou, c' est Mario le meilleur <br>";

        }

        echo '<hr> <h2 class="display-4 text-center">Fonctions prédifinies</h2><hr>';

        // tout retrouver sur php.net, liste des fonctions et méthodes

        echo 'Date: ' . date("l/d/m/Y") . '<br>';

        // lorsqu' on utilise une fonction prédifinie, il faut toujours savoir quoi envoyer comme argument, et ce que la fonction va retourner

        //  ci dessus, les arguments de date() sont l/d/m/Y...

        echo '<hr> <h2 class="display-4 text-center">Traitements des chaines</h2><hr>';

        // strpos() => string position

        $email = "aziz.tobbal@dbmail.com";

        echo strpos($email, "@");

        echo '<br>';

        // va afficher 11, car 11 caracteres avant @

        $email = "gregorylacroix78@gmail.com";

        echo strpos($email, "@");

        echo '<br>';

        // ici 16, car 16 caracteres avant @

        // fonction prédifinie qui permet de trouver la position du caractere dans la chaine

        // on lui donne deux arguments ( entre parentheses): la chaine dans laquelle chercher, puis le caractere a situer ( utile pour vérifier le format d' un mail)

        $email12 = "bonjour";

        echo strpos($email12, "@");

        echo '<br>';

        // cette ligne ne sort rien, pourtant il y a bien qlq chose dedans: FALSE

        // var_dump() permet d' apercevoir le FALSE. C' est donc une instruction d' affichage améliorée que l'on utilise régulierement en phase de developpement

        // il existe aussi print_r()

        var_dump(strpos($email12, "@"));

        echo '<br>';

        // iconv_strlen

        $phrase = "Mettez une phrase ici a cet endroit";

        echo iconv_strlen($phrase) . '<br>';

        // iconv_strln est une fonction prédifinie qui permet de connaitre le nombre de caracteres d' un string

        // on peut l' utiliser pour savoir si un pseudo, un mdp ont une taille conforme lors de l' inscription

        // substr()

        $texte = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, voluptatum perspiciatis. Animi voluptate, deleniti asperiores perspiciatis laboriosam iusto expedita eaque corrupti a architecto id, labore excepturi iste dolores quo eligendi!";

        echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a>";

        // c' est une fonction prédifinie permettant de retourner une partie de la chaine...

        // les argume,nts a donner sont:

        // la chaine a couper

        // la position du début

        // la position de fin

        // substr permet de couper un article pourne donner que l' accroche

        echo '<hr> <h2 class="display-4 text-center">Fonctions utilisateurs</h2><hr>';

        // elles permettent d' éviter de copier / coller un code récurent.

        // on l' enca^psule dans une fonction

        function separation()

        {

            echo "<hr><hr><hr>";

        }

        separation();

        // execution de la fonction

        // fonction avec arguments

        function bonjour($qui)

        {

            return "Bonjour $qui <br>";

            // permet de retourner le résultat, mais ne l' affiche pas

        }

        echo bonjour('Gregory');

        //  execution de la variable

        // quand i y a un return dans la fonction, i l faut faire un echo avant

        $prenom = 'Jacques';

        echo bonjour($prenom);

        // l' argument peut aussi etre une variable

        // ********************************************

        function appliqueTva($nombre)

        {

            return $nombre * 1.2;

        }

        echo "500 euros avec 20% de tva: " . appliqueTva(500) . '<br>';

        // pour calculer la tva de 500

        /* Exo: améliorer cette fonction piur qu' elle calcule un nombre avec le tx de tva de notre choix ( 19.6, 5.5, 7% etc....)

             */

        // mon travail

        // function appliqueTvaRandom($nombre, $x)

        // {

        //     $tx = 1 + $x / 100;

        //     return $nombre * $tx;

        //     un seul return par fonction, sinon, break, et ne s' occupe plus du reste

        // }

        // echo "500 euros avec 5.5% de tva: " . appliqueTvaRandom(500, 5.5) . '<br>';

        /*

        Correction du formateur

        */

        function appliqueTva2($nombre, $tx)

        {

            return $nombre * (1 + $tx / 100);

        }

        echo "500€ avec tva 19.6% font: " . appliqueTva2(500, 19.6) . '<br>';

        // *************************************************

        echo meteo("été", 20);

        // il est possible d' executer une fonction avant qu' elle ne soit declarée dans le code

        function meteo($saison, $temperature)

        {

            return "Nous sommes en $saison et il fait $temperature degrés <br>";

        }

        // exo gérer le s de degrés en fonction de la température. Gérer aussi le cas de figure: en été, au printemps etc....

        // mon travail

        // echo meteo2("printemps", -15);

        // function meteo2($saison, $temperature)

        // {

        //     if ($temperature <= 1 && $saison == "printemps") {

        //         return "Nous sommes au $saison et il fait $temperature degré <br>";

        //     } elseif ($temperature <= 1 && $saison != "printemps") {

        //         return "Nous sommes en $saison et il fait $temperature degré <br>";

        //     } elseif ($temperature > 1 && $saison = "printemps") {

        //         return "Nous sommes au $saison et il fait $temperature degrés <br>";

        //     } else {

        //         "Nous sommes en $saison et il fait $temperature degré <br>";

        //     }

        // }

        // correction du formateur

        function exoMeteo($saison, $temperature)

        {

            if ($temperature > 1 || $temperature < -1)

                $degre = "degrés";

            else

                $degre = "degré";

            if($saison =="printemps")

            $art = "au";

            else

            $art = "en";

            return " nous sommes $art $saison et il fait $temperature $degre <br>";

        }

        echo exoMeteo('été', 2);

        echo exoMeteo('automne', -2);

        echo exoMeteo('hiver', 0);

        echo exoMeteo('printemps', 0);

        

        // espace global et local

        function jourSemaine(){

            $jour ='jeudi';

            return $jour;

            echo 'Salut';

        }

        // echo $jour;

        // ligne ci dessus va retourner Undefined, car pour lui les deux $ ne sont pas similaires. Une variable d' une fonction ( espace local) ne peut -etre appelée a l' extérieur ( espace global). Il faut ecrire les lignes ci dessous ( on crée une variable pour récupérer l' entrée)

        $recup = jourSemaine();

        echo $recup . '<br>';

        // ***********************************************

        $pays = "France";

        function affichagePays(){

            global $pays;

            return $pays;

        }

        echo affichagePays();

        // la terminologie "global" permet d' importer une variable de l' espace global vers l' espace local, sinon, UNDEFINED


        echo '<hr> <h2 class="display-4 text-center">Structures itérative : Boucle</h2><hr>';


        // Boucle while 

        $i = 0;
        while($i < 5) // tant que $i est inférieur à 5 la boucle continue
        {
            echo"$i---";
            $i++; // equivaut à $i = $i + 1
        }
        echo '<br>';
        //exo : faites en sorte de ne pas avoir les tirets à la fin : 0---1---2---3---4

        $j = 0;
        while($j < 5) 
        {
        
            if($j == 4)
                echo"$j";
            else
            echo"$j---";
            $j++;
              
        }
        echo '<br>';
        //----------------------------------------

        $j = 0;
        while($j < 5) 
        {
        
            if($j !== 4)
                echo"$j---";
            else
            echo $j;
            $j++;
              
        }
        echo '<br>';

        //-----------------------------------------
        // La boucle FOR 
        // 0 
        for($j = 0; $j < 16; $j++)  // initialisation/condition d'entrée/incrémentation
        { // 0 
            echo $j.'<br>';
        }
        
        //----------------------------------------
        // Exo : affficher un selecteur de 30 options via une boucle
        
         echo '<select>';
            for($k = 0; $k < 31; $k++)
            {
                echo "<option>$k</option>";
            }
        echo '</select>';
        echo '<br>';
        // faites une boucle qui affiche de 0 à 9 sur la même ligne (soit 10 tours)

            for($l = 0; $l < 10; $l++) 
        { 
            echo $l;
        }
        echo '<br>';

        // les balises table englobe la boucle for

        echo '<table class="table-bordered text-center"><tr>';
            for($m = 0; $m < 10; $m++)
            {
                echo "<td>$m</td>"; // on crée une option par tour de boucle avec la valeur de $m dans chaque cellule
            }
        echo '</tr></table><hr>'; 

        echo '<br>';

        /* 
        echo "<table border='1'>";
            for($m = 0; $m < 10; $m++)
            {
                echo "<td>$m</td>";
            }
        echo '</table>'; 
        */



        // Exo : faites la même chose en allent de 0 à 99 sur plusieurs lignes sans faire 10 boucles

        /*echo '<table class="table table-bordered text-center"><tr>';
            for($m = 0; $m < 10; $m++)
            {
                echo '<tr>';
                //echo "<td>$m</td>";
                for($col = 1; $col <= 10; $col ++)
                {
                    echo "<td>", ($col + ($m * 10)), "</td>";
                }
                echo '</tr>';
            }
        echo '</table>';
        */
        
        $compteur = 0; 
        //la première boucle FOR tourne 10 fois parce qu'il y a 10 lignes 
        // la deuxième boucle FOR  tourne 10 fois sur chaque ligne et crée une cellule
        //$compteur permet d'avoir une variable qui ne se réinitialise jamais à zéro, elle augumente de 1 quelque soit le tour de boucle
        echo '<table class="table table-bordered text-center"><tr>';
  
            for($ligne = 0; $ligne < 10; $ligne++)
            {
                echo '<tr>';
                                    
                for($cellule = 0; $cellule < 10; $cellule++)
                {
                    echo "<td>$compteur</td>";
                    $compteur++;
                }
                echo '</tr>';
            }
        echo '</table>';

        echo '<hr> <h2 class="display-4 text-center">Tableau de données ARRAY</h2><hr>';
        // Un tableau array est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une valeur mais un ensemble de valeur

        $liste = array("Yannis", "Aziz", "Nassim", "Sylvain", "Nelson");
        //$liste = ["Yannis", "Aziz", "Nassim", "Sylvain", "Nelson"];
        //echo $liste; /!\ erreur !! on ne peut pas afficher un tableau array avec un simple echo

        echo '<pre>';
        var_dump($liste);
        print_r($liste);
        echo '</pre>';
        // <pre> est une balise qui permet de frmater la sortie du print_r ou var_dump
        // Ces instructions d'affichages améliorées permettent de consulter et d'afficher les données d'un tableau, d'une variable, d'un objet etc...

        /* 
        tableau horaire
        -------------------
        | indice | valeur |
        -------------------
        |    0   | Yannis |
        -------------------
        |    1   |  Aziz  |
        -------------------
        ...
        */

        //Exo : tenter de sortir Aziz en passant par le tableau de données ARRAY sans faire un 'echo Aziz';

        
        echo $liste[1] . '<br>'; //on va crocheter à l'indice 1 du tableau ARRAY pour extraire la valeur étant stocké à l'indice 1



        echo '<hr> <h2 class="display-4 text-center">Boucle foreach pour les tableau de données ARRAY</h2><hr>';
        
        $tab[] = "France";
        $tab[] = "Angleterre";
        $tab[] = "Espagne";
        $tab[] = "Italie";
        $tab[] = "Portugal";
        //echo $tab; /!\ erreur !! 

        echo '<pre>';
        print_r($tab);
        echo'</pre>';

        /* 
        tableau horaire
        -------------------
        | indice | valeur |
        -------------------
        |    0   | France |
        -------------------
        |    1   |Angleterre|
        -------------------
        |    2   | Espagne |
        -------------------
        |    3   | Italie |
        -------------------
        |    4   | Portugal|
        -------------------
                    $value
        */
        // Lorsqu'il n'y a qu'une seule variable, $value parcours la colonne des valeurs du tableau de données ARRAY
        // La boucle est un moyen simple de passer en revue un tableau de données ARRAY (aussi les objets : future chapitre)
        foreach($tab as $value) // as fait partie du langaue et est obligatoire, $value est une variable de reception que nous nommons, elle réceptionne une valeur du tableau par tour de boucle
        {
            echo "$value<br>"; // on affiche successivement les éléments du tableau
        }

        //foreach : indice + valeur
        // Lorsqu'il y a 2 variables, la première parcours la colonne des indices ($key) et l'autre la colonne des valeurs ($value)
        foreach($tab as $key => $value) // la flèche est obligatoire
        {
            echo"$key => $value<br>";
        }
        ?>
        <hr>
        <!-- 2ème possibilité d'écriture -->
        <?php foreach($tab as $key => $value):  ?>
                <?= $key;?> => <?= $value ?><br>
        <?php endforeach; ?>
        <!-- for(): /endfor -->
        <!-- if(): / else: / endif -->
        <!-- while(): endwhile -->

        <?php
        // il est possible de définir ses propres indices
        $perso = array("m"=> "Mario", "l" => "Luigi", "z" => "Aziz", "n" => "Nassim");
        echo '<pre>';
        print_r($perso);
        echo'</pre>';

        echo "Taille de tableau : " . count($perso) . '<br>';
        echo "Taille de tableau : " . sizeof($perso) . '<br>';
        //  sizeof et count retourne la taille d'un tableau ARRAY, combien d'éléments il y a à l'intérieur. Pas de différence les deux

        echo implode(" / ", $perso); // implode() est une fonction prédéfinie qui rassemble les éléments d'un tableu en un chaine (séparé par un symbole). L'inverse : explode

        echo '<hr> <h2 class="display-4 text-center"> Tableau ARRAY multidimensionnel</h2><hr>';
        // Nous parlons de tableau multidimensuionnel quand un tableau est contenu dans un autre tableau 

        $tab_multi = array(
            0 => array("nom" => "Macron", "salaire" => 1),
            1 => array("nom" => "Lacroix", "salaire" => 15000) 
        );

        echo '<pre>';
        print_r($tab_multi);
        echo'</pre>';


        // Exo : tenter de sortir "Macron" en passant par le tableau multi représenté par $tab_multi sans faire un 'echo Macron'

        echo $tab_multi[0]['nom'] . '<br>';

        //Exo : afficher l'ensemble du tableau multidimensionnel à l'aide de boucle foreach

        foreach($tab_multi as $key => $tab)
        {
            echo '<div class="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center">';
            foreach($tab as $key2 => $value)
            {
                echo "$key2 => $value<br>";
            }
            echo'</div>';
        }
        // ------------------------------------------------------------------------------------------------
        // La boucle for permet de tourner autant de fois qu'il y a de lignes dans le tableau multi, donc 2 tput de boucle dans notre cas
        for($i = 0; $i < count($tab_multi); $i++)
        {
            echo '<div class="col-md-2 offset-md-6 alert alert-info text-dark mx-auto text-center">';
            // on se sert de la variable $i de la boucle for pour aller crocheter à chaque indice du tableau multi et parcourir les données
            foreach($tab_multi[$i] as $key => $value)
            {
                echo "$key => $value<br>";
            }
            echo'</div>';
        }

        echo '<hr> <h2 class="display-4 text-center"> Superglobales</h2><hr>';

        // les superglobales sont des variables de type ARRAY , elles sont accessibles de partout, c'est à dire à la foids dans l'espace global et local, elle permettent de véhiculer des données

        /*
            $_SERVER : véhicule les données lié au server
            $_GET : véhicule les données transmit dans l'URL
            $_POST : véhicule les données d'un formulaire
            $_FILES : véhicule les données d'un fichier umploader
            $_COOKIE : véhicule les données d'un fichier cookie
            $_SESSION : véhicule les données d'une session en cours

            elles s'appellent toujours avec le signe $ suivi d'un '_' et toujours en MAJUSCULE 
        */
        echo '<pre>'; print_r($_SERVER); echo '</pre>';


        ?>
    </div>

    <!-- bibliotheque pour bootstrap -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html> 