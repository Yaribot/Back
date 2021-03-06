<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Requete PDO</title>
</head>
<body>
<div class="container">
    <h2 class="display-4 text-center">01. PDO : Connexion</h2><hr>
    <?php 
        /*class PDO
        {
             methodes (fonction)
             propriétés (variables)
             public function querry()
             {
                 traitement...
             }
        }
         connexion BDD*/
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

        /* 
            PDO est une classe prédéfinie en PHP qui permet de se connecter à une base de donnée. Cette classe possède ses propres méthodes (fonctions) qui nous permettrons par exemple de formuler et d'executer une requète SQL
            $pdo est l'objet qui permet d'intéragir, d'interroger la BDD

            argument : 1 (server + BDD) / 2 (identifiant) / 3 (mdp) /4 (options >PDO)
        */

        echo '<pre>'; var_dump($pdo); echo '</pre>'; // affiche l'objet PDO 
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; // affiche les méthodes issu de la classe prédéfinie PDO

    echo'<h2 class="display-4 text-center">02. PDO : EXEC-INSERT / UPDATE / DELETE</h2><hr>';
        // Exo : formuler la requete permettant de vous insérer dans la BDD entreprise donc dans la table employes

        //$true n'est pas définie, donc on entre pas dans la condition
        if(isset($true)) //permet de ne plus avoir l'INSERT à chaque rechargement de page 
        {
            $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Yannis', 'Aribot', 'm', 'informatique', '2019-04-09', 10000)");
            echo "Nombre d'enregistrement affecté(s) par l'INSERT :$resultat<br>";
            echo "Dernier ID généré : " . $pdo->lastInsertId() . '<hr>';
        }

        /* 
            EXEC() est une méthode issu de la classe prédéfinie PDO, elle permet de formuler et executer des requètes SQL, c'est un argument (entre les parenthèses de la méthode) que l'on envoi la requete
            EXEC() est prévu pour des requetes  ne retournant pas de jeu de résultats (INSERT / UPDATE / DELETE)
        */

        //UPDATE
        // EXO :  réaliser le traitement permettant de modifier le salaire de l'employé n° 350 par 1200

        $resultat = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");
        echo "Nombre d'enregistrement affecté(s) par l'UPDATE :$resultat<br>";

        //DELETE
        // EXO :  réaliser le traitement permettant de modifier le salaire de l'employé n° 350
        $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");
        echo "Nombre d'enregistrement affecté(s) par l'DELETE FROM :$resultat<br>";


    echo'<h2 class="display-4 text-center">03. PDO : SELECT FETCH_ASSOC (1 seul résultat)</h2><hr>';

    /* 
        requete selection  -> query() -> retour objet PDOStatement (inexploitable)
        Pour exploiter le résultat -> on associe une méthode -> fetch()/ fetchAll() (classe PDOStatement) -> retourne tableau ARRAY
        Si plusieurs résultat --> boucle !!!
    */

        $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");

        echo '<pre>'; var_dump($result); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';

        $employe = $result->fetch(PDO::FETCH_ASSOC); // retour d'un tableau ARRAY indexé avec le nom des champs
        //$employe = $result->fetch(PDO::FETCH_NUM); retour d'un tableau ARRAY indexé numériquement
        //$employe = $result->fetch(PDO::FETCH_BOTH); retour d'un tableau ARRAY indexé à la fois numériquement et avec le nom des champs
        // il n'est pas possible d'associer 2 fois la même méthode sur le même résultat
        echo '<pre>'; print_r($employe); echo '</pre>';

        //EXO : afficher les informations à l'aide d'un affichage conventionnel en excluant l'id_employes
        echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';
            foreach($employe as $key => $value)
            {
                if($key != 'id_employes')
                {
                    echo "$key : $value <hr>";
                }
            }
        echo '</div>';
        /*
            QUERY est une méthode issue de la classe PDO qui permet de formuler et d'executer des requetes SQL. Elle est prévu pour des requetes retournant un jeu de résultat (SELECT)
            Lorsqu'on execute une requete de selection , on obtient toujours en retour un autre objet, issu d'une autre classe : PDOStatement. Cette classe possède ses propres proprietés et methodes.
            La methode fetch() permet de rendre le resultat exploitable sous forme de tableau de données ARRAY
        */


    echo'<h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE (plusieurs résultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        echo "<pre>"; var_dump($resultat); echo"</pre>";

        // En executant une reqete de selection, on obtient en retour un objet PDOStatement, cet objet est inexploitable en l'état, on lui asscocie donc la méthode FETCH qui retourne un tableau 
        // Pour récupérer l'ensemble des employés, dans ce cas précis, nous sommes obligé de boucler 
        // La boucle WHILE permet de dire : tant qu'il y a des employes, on boucle
        // $employes receptionne un tableau ARRAY d'un employé par tour de boucle

        // PDO::FETCH_ASSOC ---> le '::' permettent de faire appel à une constente de la classe PDO sans devoir l'instancier (créer un objet de la classe)
        while($employes = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            echo "<pre>"; print_r($employes); echo"</pre>";
             echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
             echo $employes['nom'] .'<hr>'; // Pour chaque tour de boucle, donc pour chasue tableau ARRAY, on va crocheter aux différents indices
             echo $employes['prenom'] .'<hr>';
             echo $employes['service'] .'<hr>';
             echo $employes['salaire'] .'<hr>';
            echo '</div>';
        }

        
    echo'<h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)</h2><hr>';

     $resultat = $pdo->query("SELECT * FROM employes");

     $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // fetchAll() retourne un tableau multidimensionnel avec chaque tableau (de chaque employé) indexé numériquement

     echo "<pre>"; print_r($donnees); echo"</pre>";

     // EXO afficher successivement les données de chaque employes à l'aide de boucle foreach (indice : boucle imbriquée)

     //$tab réceptionne un tableau ARRAY  d'un employé par tour de boucle
        foreach($donnees as $key => $tab)
        {
            echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-warning text-center">';
            // La boucle foreach permet de passer en revue chaque tableau de chaque employé
            foreach($tab as $key1 => $value)
            {
                echo"$key1 => $value <hr>";
            }
            echo '</div>';
        }   


    echo'<h2 class="display-4 text-center">06. PDO : QUERY + FETCH + BDD</h2><hr>';

    // EXO : afficher la liste des bases de données, puis les mettre dans une liste ul li 

    $dtb = $pdo->query('SHOW DATABASES');
    // echo "<pre>"; print_r($dtb->fetchAll()); echo"</pre>";

    echo '<ul class="list-group col-md-4 offset-md-4 mx-auto list-group text-center">';
    // $bdd receptionne un tableau  ARRAY par tour de boucle contenant les informations  d'une BDD
    while($bdd = $dtb->fetch(PDO::FETCH_ASSOC))
    {
        // echo "<pre>"; print_r($dtb); echo"</pre>";
        echo '<li class="list-group-item">' . $bdd['Database'] . '</li>'; // on va crocheter à l'indice [Database] pour le nom de la BDD 
    }
    echo '</ul>';

    echo'<h2 class="display-4 text-center">07. PDO : QUERY + TABLE</h2><hr>';

    $resultat = $pdo->query("SELECT * FROM employes");

    /* 
        columnCount() est une méthode issue de la classe PDOStatement qui retourne le nombre de colonne selectionnés via la requete de selection, dans notre cas retourne integer 7, donc la boucle for tourne 7 fois, autant de fois qu'il y a de colonnes 

        getColumnMeta() est une méthode issue de la classe PDOStatement qui permet de récolter les informations des champs/colonne  selectionnés 
    */

    echo '<table class="table table-bordered text-center"><tr>';
    for($i = 0; $i < $resultat->columnCount(); $i++)
    {
        $colonne = $resultat->getColumnMeta($i);
        // echo "<pre>"; print_r($colonne); echo"</pre>";
        echo "<th>$colonne[name]</th>"; // on va crocheter à l'indice 'name' pour afficher en entête le nom de la colonne par tour de boucle
    }

    echo '</tr>';
    // $employe receptionne un tableau ARRAY par employes par tour de boucle 
    while($employe = $resultat->fetch(PDO::FETCH_ASSOC))
    {
        // echo "<pre>"; print_r($employe); echo"</pre>";
        echo '<tr>';
        // la boucle foreach permet de parcourir chaque tableau ARRAY de chaque employe
        foreach($employe as $value)
        {
            echo "<td>$value</td>";
        }
        echo '</tr>';
    }
    echo '</table>';

    //EXO : faire la même chose en utilisant la méthode fetchAll

    $resultat = $pdo->query("SELECT * FROM employes");
    $employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="table table-bordered text-center"><tr>';
    
    // on va crocheter au premier indice du tableau multi pour récupérer les indices et les stckés dans les entêtes <th></th>
    foreach($employes[0] as $key => $value)
    {
        echo "<th>$key</th>";
    }
    echo '</tr>';
    //$tab contient un ARRAY  d'un employé par tour de boucle
    foreach($employes as $tab)
    {
        echo '<tr>'; //on crée une ligne par employé 
        // la boucle foreach permet de parcourrir chaque tableau ARRAY de chaque employés
        foreach($tab as $infos)
        {
            echo "<td>$infos</td>";
        }
        echo '</tr>';
    }
    echo '</table>';

    echo'<h2 class="display-4 text-center">08. PDO : PREPARE + BINDVALUE + EXECUTE</h2><hr>';
    // les requetes préparées permettent de formuler une seule fois la requete et de l'executée autant de fois que souhaité 
    // les requetes préparées permettent de parer aux injection SQL, cela permet de protéger les requetes SQL
    // 3cycles dans une requête : analyse / interprétation /execution

    $resultat = $pdo->prepare("SELECT  * FROM employes WHERE nom = :nom"); // ici on prépare la requête mais à aucun moment on execute
    // :nom --> marqueur nominatif (vide) que l'on peut comparer à une boite ou un tampon

    echo "<pre>"; print_r($resultat); echo"</pre>";
    $resultat->bindValue(':nom', 'Aribot', PDO::PARAM_STR); // bindValue () ---> méthode PDOStatement. elle permet d'associer une valeur au marqueur nominatif ':nom'
    // arguments bindValue(nom_du_marqueur, valeur, type)
    // A ce stade la requeten'a toujours pas été executée

    $resultat->execute(); // méthode PDOStatement /permet d'executer la requete préparée
    // echo "<pre>"; print_r($resultat); echo"</pre>";
    $employes = $resultat->fetch(PDO::FETCH_ASSOC);
    echo "<pre>"; print_r($employes); echo"</pre>";

    // EXO : afficher le résultat de la requete préparée à l'aide de methode et boucle

    echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
    foreach($employes as $key => $value)
    {
        echo "$key : $value <hr>";
    }
    echo '</di>';

    //-----------------------------------------------------------------------------------------

    $nom = 'Dubar'; // la valeur du marqueur peut être une variable 
    $resultat->bindValue(':nom', $nom, PDO::PARAM_STR); // on change la valeur  du marqueur sans avoir à reformuler la rrequete SQL
    $resultat->execute(); // on execute la requete
    $employes = $resultat->fetch(PDO::FETCH_ASSOC);
    echo "<pre>"; print_r($employes); echo "</pre>";
    ?>
</div>
    
</body>
</html>