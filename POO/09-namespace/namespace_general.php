<?php
namespace General;

require_once('namespacce_commerce.php');

USE commerce1, Commerce2, Commerce3; // permet de préciser quel namespace je souhaite importer du fichier namespace_commerce.php

echo __NAMESPACE__ . '<hr>'; // constante magique qui permet d'afficher dans quel namespace on se trouve

$std = new \stdClass(); // sans le anti-slash --< erreur !! l'interpreteur  va chercher si la méthode StdClass() est déclaré dans le namespace 'General',donc por revenir dans l'espace global de php le temps de ligne, nous devons mettre un anti-slash '\'devant la classe

var_dump($std);

$commande  = new Commerce1\Commande;
// $commande  = new nom_dunamespace\nom_de_la_classe

echo "Nombre de commande :  " . $commande->nbCommande . '<hr>';
var_dump($commande);

// EXO : créer un objet de chaque classes déclarées et faire les affichages des propriétés

$produit= new Commerce2\Produit;
echo "Nombre de produit :  " . $produit->nbProduit . '<hr>';
var_dump($produit);

$produit= new Commerce3\Panier;
echo "Nombre de produit :  " . $produit->nbProduit . '<hr>';
var_dump($produit);

$produit= new Commerce3\Produit;
echo "Nombre de produit :  " . $produit->nbProduit . '<hr>';
var_dump($produit);