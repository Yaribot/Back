<?php
trait TPanier 
{
    public $nbProduit = 1;
    public function affichageProduit()
    {
        return "Affichage des produits !!<hr>";
    }
}
// ------------------------------------------------------
trait TMembre
{
    public function affichageMembre()
    {
        return "Affichage des membres !!<hr>";
    }
}
// -------------------------------------------------------
class Site 
{
    USE TPanier, TMembre;
}
// --------------------------------------------------------

// EXO : Créer un objet issu de la class 'Site' et afficher les méthodes issu de cette class
// Et faire les différents affichages méthodes déclarées

$site = new Site;
echo '<pre>';print_r(get_class_methods($site));'</pre>';
echo $site->affichageProduit() . "<hr>";
echo $site->affichageMembre() . "<hr>";
echo "Nombre de produit dans le panier : " . $site->nbProduit;

/*
    Les traits ont été inventé pour repousser les limites de l'héritage. Il est possible pour une classe d'hériter de plusieurs trait en même temps 
    Un trait est un regroupement de méthodes et propriétés pouvent être importé dans une class
*/

   
