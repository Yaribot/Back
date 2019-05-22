<?php
function rechercher($tab, $elem)
{               //$liste
    if(!is_array($tab))
    {
        die('Vous devez envoyer un ARRAY'); // die() s'execute, tout les traitements suivant ne sortent pas
        // die() permet de gérer les erreurs et d'afficher des erreurs 'propres' en français
    }                      // 'Mario', liste
    $position = array_search($elem, $tab); // array_search est une fonction prédéfinie qui permet de trouver la position d'un élément dans un tableau ARRAY,la fonction retourne l'indice auquel se trouve l'élément 
    return $position;
}
// -------------------------------------------------------------------------------
$liste = array('Mario', 'Yoshi', 'Toad', 'Bowser');
echo "Position de <strong>'Mario'</strong> dans le tableau ARRAY : <strong>" . rechercher($liste, 'Mario') . "</strong><hr>";

echo "Position de <strong>'Toad'</strong> dans le tableau ARRAY : <strong>" . rechercher($liste, 'Toad') . "</strong><hr>";

echo "Position de <strong>'Bowser'</strong> dans le tableau ARRAY : <strong>" . rechercher('uiqzduzeduydh', 'Toad') . "</strong><hr>"; // à ce moment la, die()s'execute, le script s'arrête et tout les traitements suivant ne sont pas executée

echo 'traitements...'; // ne s'affiche pas puisque die() executé ci-dessus, une erreur peut en engendrer une autre
