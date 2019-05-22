<?php
class Societe 
{
    public $adresse;
    public $ville;
    public $cp;
                    // villes,  Paris 
    public function __set($nom, $valeur)
    {
        echo "La propriété <strong>$nom</strong> n'a pas été déclaré, la valeur <strong>$valeur</strong> n'a donc pas été affecté !!<hr>";
    }
    //__set est une méthode magique qui se déclanche uniquement en cas de tentative d'affectation sur une propriete qui n'existe pas

    public function __get($nom)
    {
        echo "La propriété <strong>$nom</strong> n'a pas été déclaré, on ne peut donc pas l'afficher !!<hr>";
    }
    // __get est une méthode magique qui se déclanche dans le cas ou l'on tente d'afficher une propriete qui n'a pas été déclarée
    
    public function __call($nom, $argument)
    {
        // $argument : tableau ARRAY qui récepationne les arguments de la methode executée
        // echo '<pre>';print_r($argument); echo'</pre>';
        echo "La méthode <strong>$nom</strong> n'a pas été déclaré, les arguments étaient <strong>" . implode("-", $argument) . "</strong> !!<hr>";
    }
    // __call est est une methode magique qui s'éxécute automatiquement en cas de tentative d'execution d'une méthode qui n'a pas été déclarée
}

$societe = new Societe;

$societe->villes = "Paris"; // tentative d'affectation d'une propriete qui n'a pas été déclarée

echo '<pre>';print_r($societe); echo'</pre>';

echo $societe->titre; // tentative affichage d'une propriete qui n'a pas été déclarée

echo $societe->sefzefze(1,'test', true); // tentative d'execution d'une méthode qui n'existe pas

/*
    Il y a trop d'eereur "sale" en PHP, les méthodes magiques permettent d'afficher des erreurs 'propres' en français
*/