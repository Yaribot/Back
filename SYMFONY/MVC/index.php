<?php
// en MVC (Model View Controller)

// www.maboutique.php/index.php?controller=produits&action=boutique
// $a = new produitsController;
// $a->boutique();
// www.maboutique.php/index.php?controller=produits&action=affichage&id=165
// $a = new produitsController;
// $a->afiichage(165);
// www.maboutique.php/index.php?controller=user&action=inscription
// $a = new userController;
// $a->inscription();
// www.maboutique.php/produits/affichage/165
// $a = new produitsController;
// $a->afiichage(165);
// www.maboutique.php/product/show/165
// $a = new produitsController;
// $a->afiichage(165);


require('produits-controller.php');
// localhost/Symfony/PHPOO/MVC/index.php

$a = new produitsController;
$a->boutique();