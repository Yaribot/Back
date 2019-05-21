<?php
class Animal
{
    protected function deplacement()
    {
        return "je me déplace";
    }
    public function manger()
    {
        return "je mange chaque jour";
    }
}
// --------------------------------------------------
class Elephant extends Animal 
{
    public function quiSuisJe()
    {
        return "Je suis un éléphant et <strong>" .$this->deplacement() . '</strong><hr>';
    }
}
// --------------------------------------------------
class Chat extends Animal 
{
    public function quiSuisJe()
    {
        return "Je suis un chat";
    }
    public function manger()
    {
        return "je mange comme un gros chat !!";
    }
}
// --------------------------------------------------

$elephant = new Elephant; 
echo '<pre>';print_r(get_class_methods($elephant));'</pre>';
echo $elephant->quiSuisJe() . '<br><hr>';
echo $elephant->manger() . '<br><hr>';

//   créer un objet issu de la class 'Chat' et afficher le résultat des 2 méthodes

$chat = new Chat;
echo $chat->quiSuisJe() . '<br><hr>';
echo $chat->manger() . '<br><hr>'; // ça affiche "je mange comme un gros chat !!" et non pas je mange chaque jour" car la méthode à été redéfinit dans la class 'Chat' et seulement si la méthode n'avait pas été trouvé, il aurait cherché dans la classe dont j'hérite

// il n'est pas possible d'hériter de plusieurs class en même temps --> class Chat extends Animal, Elephant !!