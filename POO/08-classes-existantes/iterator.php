<?php
$perso = array('m' => 'Mario', 'l' => 'Luigi', 't' => 'Toad', 'b' => 'Bowser');

$it1 = new ArrayIterator($perso);
echo '<pre>';var_dump($it1); echo'</pre>';
echo '<pre>';print_r(get_class_methods($it1)); echo'</pre>';

$it1->rewind();
while($it1->valid())
{
    echo $it1->key() . ' - ' . $it1->current() .'<br>';
    $it1->next(); 
}

/* 
    rewind() : permet de se placer au début du fichier / array / dossier
    valid()  : permet de vérifier si il y a des information à parcourrir
    key()    : permet d'afficher l'indice
    current(): permet d'afficher la valeur 
    next()   : permet de passer à l'élément suivant (comparable à $i++, incrémentation)
*/

// --------------------------------------------------------------
$it2 = new SimpleXmlIterator('liste.xml', null, true);
echo '<pre>';var_dump($it2); echo'</pre>';
echo '<pre>';print_r(get_class_methods($it2)); echo'</pre>';

$it2->rewind();
while($it2->valid())
{
    echo $it2->key() . ' - ' . $it2->current() .'<br>';
    $it2->next(); 
}
// Itérator est ce qu'on appel un design patern, qui permet de définir une situation pratique à un problème fréquent.

// EXO : faire la même chose avec la classe DirectoryIterator()

$it3 = new DirectoryIterator('..');
echo '<pre>';var_dump($it3); echo'</pre>';
echo '<pre>';print_r(get_class_methods($it3)); echo'</pre>';

$it3->rewind();
while($it3->valid())
{
    echo $it3->key() . ' - ' . $it3->current() .'<br>';
    $it3->next(); 
}

// dans les 3 cas nous avons les données de type différent mais nous avons la même structure de code permettant de parcourrir les données, les même méthodes sont présente dans les 3 classes différentes
