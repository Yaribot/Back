<?php
abstract class Joueur
{
    public function seConneter()
    {
        return $this->EtreMajeur();
    }
    abstract public function EtreMajeur();
    abstract public function Devise();
}
// ------------------------------------------------
// $test = new Joueur; //!\\ erreur !! Une class abstraitte n'est pas instanciable
class JoueurFr extends Joueur
{
    public function EtreMajeur()
    {
        return 18;
    }
    public function Devise()
    {
        return '€';
    }
}
class JoueurUs extends Joueur
{
    public function EtreMajeur()
    {
        return 21;
    }
    public function Devise()
    {
        return '$';
    }
}

// ------------------------------------------------------
// EXO : créer un objet joueurFr et afficher les méthodes contenu dans la classe
// EXO : créer un objet joueurUs et réaliser le traitement permettant d'afficher '21' pour la méthode 'EtreMajeur()' et afficher '$' pour la devise

$joueurfr = new JoueurFr;

echo "Il faut avoir <strong>" . $joueurfr->EtreMajeur() . "</strong> ans pour pouvoir jouer et il faut payer en <strong>" . $joueurfr->Devise() ."</strong><hr>";

$joueurus = new JoueurUs;

echo "Il faut avoir <strong>" . $joueurus->EtreMajeur() . "</strong> ans pour pouvoir jouer et il faut payer en <strong>" . $joueurus->Devise() ."</strong><hr>";

/*
    - Une class abstraite n'est pas instanciable
    - Les méthodes abstraites n'ont pas de contenu 
    - Lorsque l'on hérite des méthodes abstraites, nous sommes obligé de les redéfinir 
    - Pour définir des méthodes abstraites, il est nécéssaire que la classe qui les contiennent soit abstraite

    Le développement qui écrit la classe 'Joueur' est au coeur de l'application (noyau) et va obliger les autres développeurs à redéfinir les méthodes EtreMajeur et Devise().
    C'est une bonne méthodologie de travail. On impose de bonne contraintes
*/

