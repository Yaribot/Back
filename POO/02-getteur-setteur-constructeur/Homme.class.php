<?php
class Homme
{
    private $error;
    private $prenom; 
    private $nom;   
                             //Yannis
    public function setPrenom($prenom)
    {                //Yannis
        if(is_string($prenom))
        {
            $this->prenom =$prenom;
            // $homme->prenom = 'Yannis';
        }
        else
        {
            $this->error = "Ce n'est pas un string !!";
            return $this->error;
        }
    }

    //----------------------------------------------

    public function getPrenom()
    {
        return $this->prenom;
        //return $homme->prenom;
    }

    public function setNom($nom)
    {
        if(iconv_strlen($nom) > 2 && iconv_strlen($nom) < 20 )
        {
            $this->nom =$nom;
        }
        else
        {
            $this->error = "Vous n'avez pas le bon nombre de caractère";
            return $this->error;
        }
    }
    //---------------------------------------------------
    public function getNom() // un getteur ne reçois jamais d'argument
    {
        return $this->nom;
    }
    // par convention, on place toujours 'set' et'get' devant le nom des méthodes
}

$homme = new Homme;
echo '<pre>';var_dump($homme);echo'</pre>';

// $homme->prenom ='Yannis'; //!\\ erreur !! Il n'est pas possible d'accéder et d'affecter une valeur à une propriété 'private', cela permet de ne pas entrer n'importe quoi dans les propriétés 

$homme->setPrenom('Yannis');
// $homme->setPrenom($_POST['prenom']);
echo "Mon prénom est : " . $homme->getPrenom() . '<hr>';

echo $homme->setNom('ARIBOT'); // on set une donnée pour la contrôler, on l'envoie dans la méthode 'setNom'
echo "Mon nom est : " . $homme->getNom() . '<hr>'; // le getteur permet d'afficher la donnée finale contrôlée 

echo $homme->setNom('A'); // affiche un message d'erreur


// echo $homme->setPrenom(28); //  un mesage d'erreur s'affiche : "Ce n'est pas un string !!" nous tombons dans le cas else du 'setteur'


//un setteur permet de contrôler les données, par exemple les données saisie d'un formulaire
// getteur permet de voir les données finales, c'est à dire les données qui ont été contrôlées, par exemple, on peut se servir des méthodes getteurs pour enregister des données dans une BDD    

// EXO : réaliser le setteur et le getteur pour la propriété '$nom' en contrôlant dans le setteur que que le nom soit compris entre 2 et 20 caractères 
