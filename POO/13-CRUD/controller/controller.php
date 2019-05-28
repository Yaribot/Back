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
    public function handlerRequest() // méthode qui permet de définir les actions de l'internaute, par exemple si l'utilisateur veut ajouter une valeur, on appel la méthode save()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si 'op' est définit dans l'URL, on le stock dans une variable sinon on stock 'NULL'

        try
        {
            if($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employe, on appel la methode save()
            elseif($op == 'select') $this->select(); // si on selectionne l'employé, on fait appel à la méthode select()
            elseif($op == 'delete') $this->delete(); //si on supprime un employé, on fait appel à la méthode delete()
            else $this->selectAll(); // permet d'afficher l'ensemble des valeurs dans la table
        }
        catch(Exception $e)
        {
            die("Problème dans l'action de l'internaute !!");
        }
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL; // contrôle qu'un id a bien été passé dans l'URL et on le stock
        $r = $this->db->delete($id); // on fait appel à la méthode delete() du fichier EntityRepository
         $this->redirect('index.php'); // après la suppression, on redirige vers la page index.php
    }

    public function select()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        $this->render('layout.php', 'details.php', array('title' => "Détail de l'employe ID : $id" , 'donnees' => $this->db->select($id))); // on appel ma méthode select() du fichier EntityRepository.php
    }

    public function selectAll()
    {
        // echo 'Méthode selectAll !!';
        // $r = $this->db->selectAll();
        // echo '<pre>'; print_r($r); echo '</pre>';
        // db --> représente un objet issu de la classe EntityRepository
        // db->selectAll() : on pointe sur la méthode selectAll() ddéclarée dans la classe EntityRepository
        $this->render('layout.php', 'donnees.php', array('title' => 'Toute les données', 'donnees' => $this->db->selectAll(), 'fields' => $this->db->getFields(), 'id' => 'id' . ucfirst($this->db->table))); // on pointe sur la methode déclaré dans EntityRepository
        // $this->db->table : affiche idEmploye, cela servira à pointé sur l'indice idEmploye du tableau de données envoyer dans le layout pour les liens voir/modifier/supprimer
        
    }

    public function save($op)
    {
        $title =$op; // permet de récupérer la donnée  envoyé dans l'URL et de la stocker dans le $title

        $id = isset($_GET['id']) ? $_GET['id'] : NULL; // permet de contrôler si il y a l'id dans l'URL, dans ce cas on le stock dans la variable $id

        $values = ($op == 'update') ? $this->db->select($id) : ''; // si on a envoyé unb id dans l'URL, on l'envoi en argument de la méthode select() de EntityRepository.php cela permettra de sélectionner toutes les données de l'employé pour la modification
        
        if($_POST)
        {
            $r = $this->db->save(); // Lorsque l'on valide le formulaire d'ajout, on execute la méthode save() du fichier EntityRepository.php
            $this->redirect('index.php'); // une fois l'insertion ou la modification executé, on redirige vers la page index.php
        }
        $this->render('layout.php', 'donnees-form.php', array('title' => "Donnee : $title", "op" => $op, 'fields' => $this->db->getFields(), "values" => $values)); // values permet de récupérer toutes les données de l'employeé en cas de modification
    }

    public function render($layout, $template, $parameters = array())
    {
        extract($parameters); // permet d'avoir les indices du tableau comme variable 
        ob_start(); // commence la temporisation

        require "view/$template";
        //$content = require "view/$template";

        $content = ob_get_clean(); // tout ce qui se trouve dans le template sera stocké dans $content grace à la fonction ob_get_clean()

        ob_start(); // temporise la sortie de l'affichage
        require "view/$layout";

        return ob_end_flush(); // permet de libérer l'affichage et fait tout apparaitre sur la page
    }

    public function redirect($url) // méthode permettant d'effectuer une redirection après modification ou ajout
    {
        header("Location:" . $url);
    }
}