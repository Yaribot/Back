<?php

// Interface.php

// l'interface impose un contrat (une méthode à suivre) pour les autres développeur par exemple ici ils doivent utiliser les méthodes déclarée dans l'interface

interface Mouvement 
{
    public function start();
    public function turnRight();
    public function turnLeft();
}

// Aurelia 
class Avion extends Vehicule implements Mouvement
{
    public function start()
    {
        
    }
    public function turnRight()
    {

    }
    public function turnLeft()
    {

    }
}

// Iuliia
class Bateau extends Vehicule implements Mouvement
{
    public function start()
    {
        
    }
    public function turnRight()
    {

    }
    public function turnLeft()
    {

    }
}