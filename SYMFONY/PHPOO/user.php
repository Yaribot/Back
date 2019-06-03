<?php

// user.php

class User
{
    private $pseudo;
    private $prenom;
    private $email;
    protected $password;
    private $date_de_naissance;
    // ...

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if(!empty ($_POST['prenom']))
        {
            if(strlen ($_POST['prenom']) >= 3 && strlen ($_POST['prenom']) <= 20)
            {

                $user->prenom = $_POST['prenom'];
            }
        }
    }
       
}
class Admin extends User 
{
    public function setPassword ($password) // pour utiliser cette fonction il faut que la variable $password de la classe  User  soit déclarée en tant que Protected et non private 
    {
        $this->password = $password;
    }
}

$user = new User;

// enregistrement du prenom
// vérification des données



echo 'Prenom : ' . $user->prenom;