<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"

<?php
// EXO : réaliser le traitement PHP pour se connection à la base de donné 'entreprise'

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

echo '<pre>';var_dump($pdo); echo'</pre>';
echo '<pre>';print_r(get_class_methods($pdo)); echo'</pre>';

echo "<h2 class='display-4 text-center'>exemple n° 1 SELECT + QUERY + FETCH</h2>";

$resultat = $pdo->query("azdaiudiadjoiajzd");

echo '<pre>'; print_r($pdo->errorInfo()); echo'</pre>'; // en cas d'erreur de requete SQL, errorInfo() contient le message d'erreur et les code erreurs


// EXO : afficher les données de l'employe id 417

$select = $pdo->query("SELECT * FROM employes WHERE id_employes = 417");

$employe = $select->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($employe); echo '</pre>';

echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';
    foreach($employe as $key => $value)
    {
        
        echo "$key : $value <hr>";
    
    }
echo '</div>';

echo "<h2 class='display-4 text-center'>exemple n° 2 SELECT + QUERY + FETCHALL</h2><hr><br>";

// afficher successivement les données de chaque employé en utilisant la méthodes FETCH ALL 

$select2 = $pdo->query("SELECT * FROM employes");
$allemploye = $select2->fetchAll(PDO::FETCH_ASSOC);
echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-success text-center">';

foreach($allemploye as $key => $tab)
    {
        
        foreach($tab as $key1 => $value)
        {
            echo "$key1 : $value <hr>";
        }
    
    }
echo '</div>';

echo "<h2 class='display-4 text-center'>exemple n° 3 SELECT + QUERY</h2><hr><br>";

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
// Je n'ai plus besoin de la méthode fetch() pour réaliser cette boucle foreach(), nous avons associé la méthode directement avec la requête SQL, on travail avec l'objet '$resultat'

echo '<pre>';var_dump($resultat); echo'</pre>';

// EXO : afficher l'ensemble des employes sous form d'un tableau HTML via l'objet '$resultat'


echo '<table class="table table-dark text-center"><tr>';
    for($i = 0; $i < $resultat->columnCount(); $i++)
        {
            $colonne = $resultat->getColumnMeta($i);
            echo "<th>$colonne[name]</th>"; 
        }
    echo '</tr>';
    foreach($resultat as $key => $tab)
    {
        echo '<tr>';
        foreach($tab as $key1 => $value)
        {
            echo "<td>$value </td>";
        }
        echo '</tr>';
    }

echo '</table>';

echo "<h2 class='display-4 text-center'>exemple n° 4 INSERT + UPDATE + DELETE</h2><hr><br>";

// EXO : insérez vous dans la BDD à l'aide d'une requete PDO
if(isset($true))
{
    $insert = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Yannis', 'Aribot', 'm', 'informatique', '2019-04-09', 10000)");
    echo "Nombre d'enregistrement affecté(s) par l'INSERT : $insert<br>";
    echo "Dernier ID généré : " . $pdo->lastInsertId() . '<hr>';
}


echo "<h2 class='display-4 text-center'>exemple n° 5 PREPARE + '?'</h2><hr><br>";

$result = $pdo->prepare("SELECT * FROM employes WHERE nom = ?"); // On va dans un premier temps "preparer" la requete sans la partie variable, que l'on représentera avec le marqueur sous forme de point d'interrogation

$result->execute(array("Dissat")); // Gallet va remplacer le point d'interrogation juste au dessus 

$donnees = $result->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - '); // implode() permet d'extraire les valeurs d'un tableau en chaine de caratère avec un séparateur

echo "<h2 class='display-4 text-center'>exemple n° 6 PREPARE + ':' + FETCH</h2><hr><br>";

$result1 = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$result1->execute(array("nom" => "Jaquemin")); // Il est possible d'envoyer directement à l'execution la valeur des marqueurs nominatif

$donnees1 = $result1->fetch(PDO::FETCH_ASSOC);
echo implode($donnees1, ' - '); 


echo "<h2 class='display-4 text-center'>exemple n° 7 PREPARE + ':' + FETCH_OBJ</h2><hr><br>";

// EXO : selectionner à l'aide d'une requete préparée les informations de l'employé 'Thoyer' et afficher ses données à l'aide de la méthode FETCH_OBJ

$result2 = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$result2->execute(array("nom" => "Thoyer"));

$donnees2 = $result2->fetch(PDO::FETCH_OBJ); // Retourne un objet issu de la classe $tdClass avec chaque indice comme proprieté public
echo $donnees2->field;
echo '<pre>';print_r($donnees2); echo'</pre>';
echo "prenom : " . $donnees2->prenom . '<hr>';

// La boucle foreach permet de passer en revu l'objet 'employe'

foreach($donnees2 as $key => $value)
{
    echo "$key - $value<hr>";
}
echo '<hr>';

echo "<h2 class='display-4 text-center'>exemple n° 8 TRANSACTION + REQUETE ET ANNULATION DE CELLE CI</h2><hr><br>";

$pdo->beginTransaction();

$result = $pdo->exec("UPDATE employes SET salaire = 1000");
echo "Nombre d'enregistrement affecté par l'UPDATE : $result";


$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>Avec le changement</span>";

echo '<table class="table table-dark text-center"><tr>';
    for($i = 0; $i < $resultat->columnCount(); $i++)
        {
            $colonne = $resultat->getColumnMeta($i);
            echo "<th>$colonne[name]</th>"; 
        }
    echo '</tr>';
    foreach($resultat as $key => $tab)
    {
        echo '<tr>';
        foreach($tab as $key1 => $value)
        {
            echo "<td>$value </td>";
        }
        echo '</tr>';
    }

echo '</table>';
echo '<br><hr><br>';

//  Si on avait voulu valider la transaction, nous aurions du pointer sur la méthode 'comit' --> $pdo->comit();

$pdo->rollBack(); // permet d'annuler la transaction et de revenir à l'état initial
// EXO : refaire un affichage de la table (requete + affichage)

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo '<table class="table table-dark text-center"><tr>';
    for($i = 0; $i < $resultat->columnCount(); $i++)
        {
            $colonne = $resultat->getColumnMeta($i);
            echo "<th>$colonne[name]</th>"; 
        }
    echo '</tr>';
    foreach($resultat as $key => $tab)
    {
        echo '<tr>';
        foreach($tab as $key1 => $value)
        {
            echo "<td>$value </td>";
        }
        echo '</tr>';
    }

echo '</table>';


echo "<h2 class='display-4 text-center'>exemple n° 9 FETCH_CLASS</h2><hr><br>";

Class employes
{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sex;
    public $service;
    public $date_embauche;
    public $salaire;
}

$result = $pdo->query("SELECT * FROM employes");
$objet = $result->fetchAll(PDO::FETCH_CLASS, "Employes"); // permet de prendre les résultats de la requete et d'affecter les propriétés de l'objet. Chaque valeur va être re-associé aux différentes propriétés de la class (il faut pour cela que l'orthographe des noms des colonnes/champs SQL correspondent aux propriétés de l'objetS) 
echo '<pre>';print_r($objet); echo'</pre>';

foreach($objet as $key => $value)
{
    echo $value->prenom . '<hr>';
}

