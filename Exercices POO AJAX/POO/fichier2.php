<?php
require_once('fichier1.php');

class Etudiant2 extends Etudiant
{
    private $prenom = 'Hélène';
    private $nom = 'Jacquemin';
    private $email = 'helene.jacquemin@lepoles.com';
    private $telephone = 684646;
    private $error = "";
    public $tab = array();
}

$etudiant2 = new Etudiant2;
echo'<pre>';var_dump($etudiant2);'</pre>';

class Etudiant3 extends Etudiant
{
    private $prenom = 'Thomas';
    private $nom = 'Spect';
    private $email = 'thomas.spect@lepoles.com';
    private $telephone = 165485;
    private $error = "";
    public $tab = array();
}

$etudiant3 = new Etudiant3;
echo'<pre>';var_dump($etudiant3);'</pre>';