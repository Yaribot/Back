<?php
// Par convention la première lettre de la class doit être en majuscule
class Panier
{
    public $nbProduits;
    public function ajouterArticle()
    {
        return "L'article a été ajouté !!";
    }
    protected function retirerArticle()
    {
        return "L'article a été retiré !!";
    }
    private function affichageArticle()
    {
        return "Voici les articles !!";
    }
}

$panier1 = new Panier;
echo'<pre>'; var_dump($panier1); echo'</pre>';  // on observe un objet issu de la classe 'panier' à l'identifiant '#1' (référence de l'objet), il peut y avoir plusieurs objets conservé en RAM, ils auront tous un identifiant différents


echo'<pre>'; var_dump(get_class_methods($panier1)); echo'</pre>';  // permet d'observer uniquement les méthodes (fonctions) publiquent issu de la class


// EXO : affecter la valeur de '5' à la propriété public '$nbProduits'

$panier1->nbProduits=5;  // on affecte la valeur de 5 à la propriété (variable) $nbProduits, jamais le signe '$' lorsqu'on appel une propriété public de l'objet
echo'<pre>'; print_r($panier1); echo'</pre>';

echo "nombre de produit dans le panier : ".$panier1->nbProduits. "<hr>";
echo "Panier 1 > " . $panier1->ajouterArticle() . "<hr>";  // on pioche une méthode de la class à travers l'objet, toujours des parenthèses car on fait appel à une méthode (fonction) / méthode public OK

// echo "Panier 1 > " . $panier1->retirerArticle() . "<hr>"; //!\\ erreur !! méthode protected !! l'élément est accessible uniquement dans la classe ou cela à été déclaré (class mère) ainsi que dans les classes héritières

// echo "Panier 1 > " . $panier1->affichageArticle() . "<hr>";   //!\\ erreur !! méthode private !! l'élément est accessible uniquement dans la classe ou cela à été déclaré (class mère)

// Les niveaux de visiblité permettent de protéger des données, par example les données saisie d'un formulaire ne pourront pas être attribués à n'importe quelle propriété déclarées, elles passeront par des méthodes qui permettront de contrôler ces données

$panier2 = new panier; // on créer un nouvel exemplaire / objet issu de la class 'panier' 
echo'<pre>'; var_dump($panier2); echo'</pre>'; // on peut observer un objet issu de la classe 'panier' à l'identifiant '#2'

//  EXO : affecter 3 produit à la propriété nbProduits et affecter le nombre de produit dans le panier

$panier2->nbProduits= 3; // affectation de 3 à la propriété $nbProduits
echo "nombre de produit dans le panier : ".$panier2->nbProduits. "<hr>"; // affichage


/*
    Niveau de visibilité 
        - public : accesibile de partout 
        - protected : accessible dans la class Mère et héritage
        - private : accessible uniquement dans la class Mère

    'new' est un mot clé permettant d'effectuer une incrémentation (créer un objet)
    une classe peut produire plusieurs objets 
    $panier1 représente l'objet issu de la class 'panier'
    La classe est le plan de construction /$panier1 représente un exemplaire de la classe 
*/


