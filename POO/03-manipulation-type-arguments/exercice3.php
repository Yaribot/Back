<?php
/*
    UML 

----------------------
| Vehicule           |    1. Création d'un véhicule 1
----------------------    2. Attribuer un nombre de litres d'essence au véhicule 1 : 5l
| $litresEssence     |    3. Afficher le nombre de litres d'essence du véhicule 1
----------------------    4. Création d'une pompe
| setLitresEssence() |    5. Attribuer un nombre de litres d'essence à la pome : 800
| getLitresEssence() |    6. Afficher le nombre de litres d'essence de la pompe
----------------------    7. la pompe donne de l'essence en faisant le plein (50L)
                             à la voiture 1
----------------------    8. Afficher le nombre de litres d'essence de la voiture aprés
| Pompe              |       ravitaillement
----------------------    9. Afficher le nombre de litres restant à la pompe
| $litresEssence     |      
----------------------    public function donnerEssence(Vehicule $v)   
| setLitresEssence() |
| getLitresEssence() |
| donnerEssence()    |
----------------------
*/


class Vehicule
{
    private $litresEssence ;
    public function setLitreEssence($litres)
    {
        $this->litresEssence =$litres;
    }
    public function getLitreEssence()
    {
        return $this->litresEssence;
    }

}



$vehicule1 = new Vehicule;
echo '<pre>';var_dump($vehicule1);echo'</pre>';

$vehicule1->setLitreEssence(5);
echo "le véhicule dispose de : <strong>" . $vehicule1->getLitreEssence() ."</strong> Litres d'essence<hr>";

class Pompe
{
    private $litresEssence ;
    public function setLitreEssence($litres)
    {
        $this->litresEssence =$litres;
    }
    public function getLitreEssence()
    {
        return $this->litresEssence;
    }
                                    //$vehicule1
    public function donnerEssence(Vehicule $v) // on exige un argument de type 'vehicule', c'est à dire un objet issu de la classe 'vehicule' 
    {
        echo'<pre>'; var_dump($v); echo'</pre>';

        // définir le nombre de ltres d'essence de la pompe : 
        $this->setLitreEssence($this->getLitreEssence() - (50 - $v->getLitreEssence()));
        //pmope1->setLitreEssence(pmope1->getLitreEssence( - (50-$v->getLitreEssence()) )
                                //800                       - 50 - 5

        // définir le nombre de ltres d'essence du véhicule 1 : 
        $v->setLitreEssence($v->getLitreEssence() + (50 - $v->getLitreEssence()));
                            //  5                 +  50 - 5
    }

}

$pompe1 = new Pompe;
echo '<pre>';var_dump($pompe1);echo'</pre>';

$pompe1->setLitreEssence('800');
echo "la pompe dispose de : <strong>" . $pompe1->getLitreEssence() ."</strong> Litres d'essence<hr>";

$pompe1->donnerEssence($vehicule1);

echo "Nombre de litres d'essence à la pompe : " . $pompe1->getLitreEssence() . '<hr>';
echo "Nombre de litres d'essence pour le véhicule1 : " . $vehicule1->getLitreEssence() . '<hr>';


