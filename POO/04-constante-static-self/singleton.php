<?php
class Singleton
{
    public $numero = 20;
    private static $instance = null;
    private function __construct(){} // la class n'est pas instanciable car ke constructeur est privé
    private function __clone(){} // l'objet ne sera pas clonnable
    public function getInstance()
    {
        if(is_null(self::$instance)) // si $instance est null, la 1ere fois c'est null, toute les autres fois je ne rentre pas ici car  il y a un objet dans $instance
        {
            self::$instance = new Singleton; // on stockl'objet de la class Singleton
        }
        return self::$instance; // dans tout les cas je retourne un objet $instancce
    }
}
// Un patern Singleton perment de trouver une solution simple à un problème récurent 
// $s = new Singleton; //!\\ erreur !! Il n'est pas possible d'instancier la class puisque le constructeur est en privé

$objet1 = Singleton::getInstance();
echo '<pre>';var_dump($objet1);'</pre>'; // objet1 est à la référence #1

$objet2 = Singleton::getInstance();
echo '<pre>';var_dump($objet2);'</pre>'; // objet2 est à la référence #1, il s'agit bien du même objet

echo $objet1->numero . '<hr>';
echo $objet2->numero . '<hr>';

$objet2->numero = 22; // lorsque l'on change la valeur de la propriété 'numéro' cela impact sur les 2  variables $objet1 et $objet2, c'est normal puisque c'est le même objet 

echo $objet1->numero . '<hr>';
echo $objet2->numero . '<hr>';
