<?php 

class A 
{
    public function test1()
    {
        return "test1<hr>";
    }
}
// -----------------------------------
class B extends A
{
    public function test2()
    {
        return "test2<hr>";
    }
}
// -------------------------------------
class C extends B 
{
    public function test3()
    {
        return "test3<hr>";
    }
}
// -----------------------------------------

// EXO : créer un objet de la classe C et afficher les méthodes issues de celle-ci et faire les affichages des méthodes 

$c = new C;
echo '<pre>';print_r(get_class_methods($c));'</pre>';
echo $c->test3() . '<hr>';
echo $c->test2() . '<hr>';
echo $c->test1() . '<hr>';
// si la B hérite de A et que C hérite de B alors la classe C hérite de A 