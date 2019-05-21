<?php
final class Application 
{
    public function lancementApplication()
    {
        return "L'appli se lance comme cela !!<hr>";
    }
}
// --------------------------------------------------
// Final permet de verrouiller une classe ou une méthode, c'est une méthodologie de travail
$app = new Application; // une class final est bien instenciable
echo '<pre>';var_dump($app);'</pre>';
echo $app->lancementApplication();

// class Test extends Application () --> //!\\ erreur !! Il n'est pas possible d'hériter d'une class finale

class Application2
{
    final public function lancementApplication()
    {
        return "L'appli se lance comme cela !!<hr>";
    }
}
// ------------------------------------------------------
class Extension extends Application2 
{
    // final public function lancementApplication()
    // {
        // //!\\ erreur !! en cas d'héritage, il n'est pas possible de redéclarer une méthode 'final', elle est vérouillé, on ne peu plus la surcharger / améliorer 
    // }
}
// -------------------------------------------------------
$ext = new Extension;
echo $ext->lancementApplication();

// --------------------------------------------------------
//  L'intéret de mettre le mot clé 'final' sur une méthode est de vérouiller afin d'empecher tout sous-class de la redéfinir (quand nous voulons que le comprtement d'une méthode soit préservé durant l'héritage) 
