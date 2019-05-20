<?php
class Etudiant
{
    private $prenom;
    public function __construct($arg)
    {                                                               //Yannis
        echo "Instruction, nous avons reçu l'information suivante : $arg<br>";
                               // Yannis
        return $this->setPrenom($arg);
    }
    //EXO : réaliser le getteur et le setteur pour la propriéété $prenom
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error = "Veillez remplir le champs prénom !!";
            return $this->error;
        }
    }

    // ----------------------------------------------------
    public function getPrenom()
    {
        return $this->prenom;
    }
}
//-------------------------------------------------------------------
$etudiant = new Etudiant('Yannis');
// $bdd = new PDO('coordonées BDD')

/*
    __construct() est une méthode magique lorsque on instancie la class. Elle sera équivalente du Init.php avec session_start(), connexion BDD,
    autoload etc... 

    - new Etudiant('Yannis'); -> à l'instanciation de la class, 'Yannis' va automatiquement se stocker en argument de la méthode magique __construct()
*/

$etudiant->setPrenom('Yannis');
// echo'<pre>';var_dump($etudiant);'</pre>';
echo "Mon prénom est : " . $etudiant->getPrenom() . '<hr>';

echo $etudiant->setPrenom(28) . '<br>';

$etudiant->__construct('Yannis'); // le constructeur peut tout de même être appelé comme une méthode classique

// setteur : permet de contrôler les données
// getteur : permet de voir / exploiter les données finales 
// private $prenom : la propriété est privé afin que l'on ne puisse pas la remplir de l'extérieur de la classe sans avoir fait des contrôles au préalable, c'est à dire sans être passé par les getteur / stteur 

// Si nous avons un formulaire avec 18 champs --> nous aurons 18 setteurs et 18 getteurs