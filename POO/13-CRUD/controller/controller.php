<?php
// controller va controler les applications (actions de l'internaute)
// le fichier controller.php contient toute les actions et méthodes a executé. Par exemple si je souhaite afficher des informations 10 par 10, c'est dans ce fichier que l'on fera ce traitement
namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \Model\EntityRepository; // permet de récupérer une connexion à la BDD qui se trouve dans le fichier EntityRepository.php
    }
    public function handlerRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si 'op' est définit dans l'URL, on le stock dans une variable sinon on stock 'NULL'

        try
        {
            if($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employe, on appel la methode save()
            elseif($op == 'select') $this->salect(); // si on selectionne l'employé, on fait appel à la méthode select()
            elseif($op == 'delete') $this->delet(); //si on supprime un employé, on fait appel à la méthode delete()
            else $this->selectAll(); // permet d'afficher l'ensemble des employés
        }
        catch(Exception $e)
        {
            die("Problème dans l'action de l'internaute !!");
        }
    }

    public function selectAll()
    {
        echo 'Méthode selectAll !!';
        $r = $this->db->selectAll();
        // db --> représente un objet issu de la classe EntityRepository
        // db->selectAll() : on pointe sur la méthode selectAll() ddéclarée dans la classe EntityRepository
        echo '<pre>'; print_r($r); echo '</pre>';
    }
}