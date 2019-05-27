<?php
class Etudiant 
{
    private $prenom;
    private $nom;
    private $email;
    private $telephone;
    private $error = '';

    public function setPrenom($prenom)
    {
        if(iconv_strlen($prenom) < 5 || iconv_strlen($prenom) > 30 )
        {
            $this->error= '<p>le prenom doit contenir entre 5 et 30 caraéctères max !</p>';
            return $this->error;
        }else
        {
            $this->prenom= $prenom;
            return $this;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function setNom($nom)
    { 
        if(iconv_strlen($nom) < 5 || iconv_strlen($nom) > 30 )
        {
            $this->error= '<p>le nom doit contenir entre 5 et 30 caraéctères max !</p>';
            return $this->error;
        }else
        {
            $this->nom= $nom;
            return $this;
        }
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setEmail($email)
    {

        if(!filter_var($email))
        {
            $this->rerror= "<p>l'\email n'\est pas valide !!</p>";
            return $this->error;
        }else
        {
            $this->email= $email;
            return $this;
        }
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setTelephone($telephone)
    {
        if(is_numeric($telephone))
        {
            $this->error= "<p>le numéro de téléphone n'\est pas valide !!</p>";
            return $this->error;
        }else
        {
            $this->telephone= $telephone;
            return $this;
        }
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    
    // GET INFO --------------------------------

    public function getInfos()
    {
        $info ['prenom'] = $this->getPrenom();
        $info ['nom'] = $this->getNom();
        $info ['email'] = $this->getEmail();
        $info ['telephone'] = $this->getTelephone();

        return $info;
    }
}