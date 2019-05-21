<?php
// réponse 1
abstract class Vehicule
{
    final public function demarrer()
    {
        return "Je démarre<hr>";
    }
    // réponse 2
    abstract public function carburant();
    
    public function nombreDeTestObligatoire()
    {
        return 100;
    }
}
// ---------------------------------------------------------
class Peugot extends Vehicule
{
    public function carburant()
    {
        return 'Essence';
    }
    // réponse 4
    public function nombreDeTestObligatoire()
    {
        $nb = parent::nombreDeTestObligatoire();
            return $nb + 70;
        
    }
}
// ---------------------------------------------------------
class Reunault extends Vehicule
{
    public function carburant()
    {
        return 'Diesel';
    }
    public function nombreDeTestObligatoire()
    {
        $nb = parent::nombreDeTestObligatoire();
            return $nb + 30;
    }
}
// ---------------------------------------------------------
/*
    1. Faire en sorte de ne pas avoir, d'objet Vehicule
    2. Obligation pour la Reunault et la Peugot de posséder la même méthode démarrer()
    3. Obligation pour la Reunault de déclarer un carburant 'Diesel' et pour la peugot un carburant 'Essence'
    4. La Reunault doit faire  30 tests de plus qu'un vehicule de base 
    5. La Reunault doit faire  70 tests de plus qu'un vehicule de base 
    6. Effectuer les affichages nécessaires
*/

$peugot = new Peugot;
echo '<pre>'; print_r(get_class_methods($peugot)); echo '</pre>';
echo $peugot->demarrer();
// echo $peugot->carburant('Essencce');
echo "La peugot fonctionne à l' <strong>" . $peugot->carburant() . "</strong><hr>";
echo "la peugot doit effectuer <strong>" . $peugot->nombreDeTestObligatoire() . "</strong> tests obligatoires <hr>";

$renault = new Reunault;
echo '<pre>'; print_r(get_class_methods($renault)); echo '</pre>';
echo $renault->demarrer();
// echo $renault->carburant('Diesel');
echo "La Reunaulr fonctionne au <strong>" . $renault->carburant() . "</strong><hr>";
echo "la renault doit effectuer <strong>" . $renault->nombreDeTestObligatoire() . "</strong> tests obligatoires <hr>";
