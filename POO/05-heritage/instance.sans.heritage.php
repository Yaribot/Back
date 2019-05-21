<?php
class A 
{
    public function direBonjour()
    {
        return "Bonjour";
    }
}
// --------------------------------------
class B // sans héritage de la classe A
{
    public $objetA;
    // __construct() s'execute automatiquement lorsque nous instancions B 
    public function __construct()
    {
        $this->objetA = new A; // je crée un objet issu de la classe A que je stock dans la propriété nommé $objetA
        echo"S'execute automatiquement et détail :";
        echo '<pre>'; var_dump($this->objetA); echo '</pre>';
    }
    public function uneMethode()
    {
        return $this->objetA->direBonjour(); // dans mon objet B '$b' ($this), je peux appeler des méthodes sur un objet A '$objetA'
        // habituellement nous mettons qu'une seule flèche, mais la $objetA contient un objet, une autre flèche est donc possible
    }
}
// -------------------------------------------
$b = new B;
echo $b->uneMethode() . '<hr>';
echo $b->objetA->direBonjour() . '<hr>';