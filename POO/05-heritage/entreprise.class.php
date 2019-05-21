<?php
class Electricien 
{
    public function getSpecialiste()
    {
        return "pose de câbles, tableaux ou armoir électrique... <hr>";
    }
    public function getHorraires()
    {
        return "10 / 18h <hr>";
    }
}
// --------------------------------------------
class Plombier 
{
    public function getSpecialiste()
    {
        return "tuyaux, robinet, chauffe-eau, compteur... <hr>";
    }
    public function getHorraires()
    {
        return "8h / 19h <hr>";
    }
}
// -------------------------------------------
class Entreprise
{
    public $numero = 0;
    public function appeUnElmploye($employe)
    {
        $this->numero++;
        // this->monEmploye1 = new Plombier
        // this->monEmploye1 = new Electricien
        $this->{"monEmploye" . $this->numero} = new $employe; // A chaque fois que l'on exécute la méthode appeUnElmploye(), cela génère dans le même temps une propriété dans laquelle est stocké une instance d'une class 

        return $this->{"monEmploye" . $this->numero}; // on retrourne l'objet généré 
        // $entreprise->monEmploye1
        // $entreprise->monEmploye2
    }
}

$entreprise = new Entreprise;
$entreprise->appeUnElmploye('Plombier');
// Afficher les méthodes de la class  'Plombier' via l'objet issu de ma classe entreprise  '$entreprise'
echo '<pre>';print_r(get_class_methods($entreprise));'</pre>';
echo $entreprise->monEmploye1->getSpecialiste() . '<hr>';
echo $entreprise->monEmploye1->getHorraires() . '<hr>';

// ----------------------------------------------
$entreprise->appeUnElmploye('Electricien');
echo $entreprise->monEmploye2->getSpecialiste() . '<hr>';
echo $entreprise->monEmploye2->getHorraires() . '<hr>';
