<?php

// Sylvain : Inscription
namespace Membre // toujours à la première ligne de notre code (ouvrir le tirroire)
{
    class verified_user
    {
    
    }
}



// Aziz : Commentaire
namespace Commentaire;
// ou use PDO;
use Commentaire;
class User 
{
    private $pdo;

    public function setPdo() 
    {
        $pdo = new \PDO();
    }
}



$user = new Membre\User;
$user = new Commentaire\User;