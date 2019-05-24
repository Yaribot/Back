<?php
class Etudiant
{
    private $prenom = 'Yannis';
    private $nom = 'Aribot';
    private $email = 'yannis.aribot@lepoles.com';
    private $telephone = 498568;
    private $error = "";
    public $tab = array();

    public function setPrenom($prenom)
    {
        if(is_string($prenom) && iconv_strlen($prenom) > 5 && iconv_strlen($prenom) < 30 )
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le prenom doit contenir entre 5 et 30 caractère !! </div>';
            return $this->error;
            
        }
    }
    public function setNom($nom)
    {

        if(is_string($nom) && iconv_strlen($nom) > 5 && iconv_strlen($nom) < 30 )
        {
            $this->nom = $nom;
        }
        else
        {
            $this->error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le nom doit contenir entre 5 et 30 caractère !! </div>';
            return $this->error;
        }
    }
    public function setEmail()
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
        }
        else
        {
            $this->error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Adresse non valide !! </div>';
        }
    }
    public function setTel()
    {
        if(iconv_strlen($telephone) == 6 && is_numeric($telephone)) 
        {
            $this->telephone = $telephone;
        }
        else
        {
            $this->error .= '<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le code postal est non valide !! </div>';
            return $this->error;
        }
    }
    // -----------------------------------------------------
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTel()
    {
        return $this->telephone;
    }
    // -----------------------------------------------------
    
    // public function getInfo($tab)
    // {
    //     $coord = "$this->nom $this->prenom $this->adresse";
    //             return $coord;
    // }

}

$etudiant = new Etudiant;
echo'<pre>';var_dump($etudiant);'</pre>';






