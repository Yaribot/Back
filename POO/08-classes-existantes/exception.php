<?php
function rechercher($tab, $elem)
{
    if(!is_array($tab))
    throw new Exception("Vous devez envoyer un ARRAY !!");

    if(sizeof($tab) <= 0)
    throw new Exception("Vouse devez envoyer un ARRAY avec du contenu");

    $position = array_search($elem, $tab);
    return $position;
}
// -------------------------------------------------------------------------
$liste1 = array();
$liste2 = array('Mario', 'Yoshi', 'Toad', 'Bowser');
// -------------------------------------------------------------------------
try // bloc d'essai, on va essayer d'executer les instructions suivantes dans le try 
{
    echo "Position de <strong>'Mario'</strong> dans le tableau ARRAY : <strong>" . rechercher($liste2, 'Mario') . "</strong><hr>";

    echo "Position de <strong>'Toad'</strong> dans le tableau ARRAY : <strong>" . rechercher($liste2, 'Toad') . "</strong><hr>";

    echo "Position de <strong>'Bowser'</strong> dans le tableau ARRAY : <strong>" . rechercher($liste1, 'Bowser') . "</strong><hr>";

    echo 'traitements...'; // il ne s'affiche pas, il n'y a pas de raison de continer des traitements si l'un 'entre eux dysfonctionne, car les prochains traitements peuvent être dépendant de celui qui dysfonctionne 

}
catch(Exception $e) // Bloc de capture, on tombe dans le bloc 'catch' si un traitement a dysfonctionné dans le bloc 'try'. Cela permet d'attraper les exceptions et de personnaliser le message d'erreur 
{
    // $e est un objet issu de la class 'Exception', il contient ses propres méthodes tel que getMessage() qui permet d'afficher le message d'erreur mais aussi getFile() qui permet d'afficher le fichier dans lequel à été comis l'erreur
    echo '<pre>';var_dump($e); echo'</pre>';
    echo '<pre>';print_r(get_class_methods($e)); echo'</pre>';
    // EXO : afficher une phrase comprtant le message d'erreur, le fichier dans lequel est l'erreur et la ligne de l'erreur
    echo "le message d'erreur est <strong>" . $e->getMessage() . "</strong><br> dans le fichier <strong>" . $e->getFile() . "</strong><br> à la ligne <strong>" . $e->getLine(). "</strong><br>";
}
// il est possible de mettre plusieurs blocs try/catch à la suite. try / catch fonctionnent ensemble

echo '<hr></hr>';
// ---------- Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test2', 'root','');
}
catch(Exception $e)
{
    // EXO : personnaliser le message d'erreur en cas de maucvaise connexion à la BDD
    echo '<pre>';var_dump($e); echo'</pre>';
    echo '<pre>';print_r(get_class_methods($e)); echo'</pre>';
    // Lorsque le traitement dysfonctionne dans le 'try' , on tombe dans le 'catch' et la classe PDOException est instancié / $e receptionne un objet issu de la classe PDOException, cet objet contient des méthodes avec le détail de l'erreur (message, ligne, fichier, code_erreur etc...)
    echo "le message d'erreur est <strong>" . $e->getMessage() . "</strong><br> dans le fichier <strong>" . $e->getFile() . "</strong><br> à la ligne <strong>" . $e->getLine(). "</strong><br>"; // on personnalise le message d'erreur 
}
