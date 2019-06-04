<?php
class Personnage
{
    private $_force;
    private $_localisation;
    private $_expérience;
    public $_degats = 50;
}
$personnage = new Personnage;
echo $personnage ->_degats;