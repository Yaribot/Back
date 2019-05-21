<?php
class Maison 
{
    private static $nbPiece = 7;
    public static $espaceTerrain = '500m';
    public $couleur = 'blanc';
    const HAUTEUR = '10m';
    private $nbPorte = 10;
    //méthode appartenant à la classe : static
    public static function getNbPiece()
    {
        return self::$nbPiece; // self permet de faire appel à une propriété static déclarée à l'intérieur de la classe 
    }
    //méthode appartenant à l'objet
    public function getNbPorte()
    {
        return $this->nbPorte;
    }
    public static function getEspaceTerr()
    {
        return self::$espaceTerrain;
    }
    function hauteur()
    {
        return self::HAUTEUR; 
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
}
$maison = new Maison;


// 1 - afficher le nombre de pièce de la maison 

echo "Nombre de pièce de la maison : <strong>" . Maison::getNbPiece() . "</strong><hr><br>";
echo "Leterrain de la maison fait : <strong>" . Maison::$espaceTerrain . "</strong><hr><br>";
echo "la hauteur de la maison est de : <strong>" . Maison::HAUTEUR . "</strong><hr><br>";
echo "la couleur de la maison est  : <strong>" . $maison->couleur . "</strong><hr><br>";
echo "la couleur de la maison est  : <strong>" . $maison->getNbPorte() . "</strong><hr><br>";

echo $maison::$espaceTerrain . '<hr>'; //!\\ devrait donner une erreur, on ne doit pas appeler une propriété static, donc qui appartient à la classe, via l'objet

//  Lorsqu'une méthode est 'static', cela veut dire qu'elle appartient à la classe et non à l'objet, donc on l'appel via la classe 

//  2 - afficher l'espace terrain de la maison 

//  2 - afficher la hauteur de la maison 

//  2 - afficher la couleur la maison 

//  2 - afficher le nombre de porte de la maison 


// echo $maison->espaceTerrain . '<hr>'; //!\\ erreur !! il n'est pas possible d'accéder à une propriété static via l'objet !


// echo $maison->getNbPiece() . '<hr>';  //!\\ fonctionne mais ce n'est pas logique !!! 
// bonne écriture : Maison::getNbPiece()


// echo Maison:: $couleur; //!\\ erreur !! il n'est pas possible d'accéder à une propriété public par la class !