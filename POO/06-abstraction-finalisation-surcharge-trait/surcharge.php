<?php
class A 
{
    public function calcul()
    {
        return 10;
    }
}
// --------------------------------------------------------------
class B extends A 
{
    public function calcul() // redéfinition
    {
        $nb = parent::calcul(); // parent fonctionne pour appeler une méthode d'une classe parente lors d'une surcharge (override) 
        // Une surcharge permet de prendre en compte le comportement de ma fonction d'origine et d'y ajouter un traitement complémentaire
        if($nb <= 100) return "$nb est inférieur ou égal à 100<hr>";
        else           return "$nb est supérieur à 100<hr>";
    }
}
// -----------------------------------------------------------------
// Pour la surcharge, si on faisait pas ça dans wordpress, on ne pourrait pas mettre à jour les CMS, on modifierais directement les fonctions du coeur.

// EXO : instencier la classe B et afficher le résultat de la condition

$b = new B;
echo $b->calcul();