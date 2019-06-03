<?php
class Autoload 
{                                 // Controller / Controller.php
    public static function className($className)
    {                                  
        require __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
        // str_replace() permet de remplacer les anti-slash '\', nous avons deux anti-slash sinon l'interpreteur considère que c'est un caractère d'échappement
        echo "require " . __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
    }
}

spl_autoload_register(array('Autoload', 'className')); // s'execute lorsque l'interpreteur voit le mot clé 'new' et la fonction 'className()' est executée dans le même temps 
// Controller\Controller : envoyé en argument de la méthode 'className'

// $a = new Controller\Controller; // au moment de l'instanciation, l'autload s'execute et va chercher dans le dossier 'Controller' le fichier 'controller.php', d'ou l'importance du nommage des dossiers et des fichiers 

// le namespace doit avoir le même nom que le dossier 

// EXO : faire le même affichage avec la ligne suivante : 
$b = new Model\EntityRepository;