<?php
class Vehicule
{
    private static $marque = 'BMW';
    private $couleur = 'noir';
    public static function setMarque($marque)
    {
        self::$marque = $marque;
    }
    public static function getMarque()
    {
        return self::$marque;
    }
    // -------------------------------
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
}

// EXO : créer un objet issu de la classe Véhicule et faite une phrase en affectant la couleur et la marque du véhicule

$vehicule = new Vehicule;

echo "Ma <strong>" . Vehicule::getMarque() . "</strong> est de couleur <strong>" . $vehicule->getCouleur() ."</strong><hr><br>";

// EXO : créer un autre véhicule et changer la couleur par violet

$vehicule2 = new Vehicule;

$vehicule2->setCouleur('violet');

echo "mon nouveau vehicule est de couleur <strong>" . $vehicule2->getCouleur() ."</strong><hr><br>";

// EXO : créer un vehicule 3 et faites une phrase en affichant la couleur et la marque du vehicule


$vehicule3 = new Vehicule;

echo "Ma 3eme <strong>" . Vehicule::getMarque() . "</strong> est de couleur <strong>" . $vehicule3->getCouleur() ."</strong><hr><br>";

// EXO : modifier la marque par 'Mercedes', puis créer un véhicule 4 et faite une phrase en affichant la couleur et la marque du véhicule 

Vehicule::setMarque('Mercedes');
$vehicule4 = new Vehicule;

echo "Ma <strong>" . Vehicule::getMarque() . "</strong> est de couleur <strong>" . $vehicule4->getCouleur() ."</strong><hr><br>";

$vehicule5 = new Vehicule;

echo "Ma 2eme <strong>" . Vehicule::getMarque() . "</strong> est de couleur <strong>" . $vehicule4->getCouleur() ."</strong><hr><br>";


/*
    Un élément déclaré comme 'static' appartient à la classe et non à l'objet. Sije modifie un élément 'static', je modifie la classe elle même $objet-> élément d'un objet à l'extérieur de la classe 
    $this-> élément d'un objet à l'intérieur de la classe 
    class:: élément de la classe à l'extérieur de la classe 
    self:: élément de la classe à l'intérieur de la classe   
*/
