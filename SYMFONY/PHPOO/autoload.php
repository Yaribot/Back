<?php

class Autoload 
{
    public static function chargement ()
    {
        require('Controller/' . $class . '.php');
        // require('Controller/User.php');
    }





}
// ---------------------------------------
spl_autoload_register(array('Autoload', 'chargement'));
// s'execute à chaque fois que le mot 'new' apparait (donc à chaque fois qu'on instencie une classe)
// il va apporter en argument de notre fonction ce qui suit après le 'new'

// Autoload::chargement();