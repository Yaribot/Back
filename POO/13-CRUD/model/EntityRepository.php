<?php
// c'est ici qu'il y aura toute les requêtes SQL
namespace Model;

class EntityRepository
{
   private $db;
   public $table;
   public function getDB() // methode permettant d'instancier la class PDO et de créer un objet PDO
   {
        if(!$this->db) // seulement si $this db n'est pas rempli, si il n'y a pas de connexion BDD, alors on la construit
        {
            try
            {
                $xml = simplexml_load_file('app/config.xml');
                // echo '<pre>';print_r($xml); echo'</pre>';
                $this->table = $xml->table; // on associe la table du fichier XML à la propriété '$table' de la class, cette propriété nous servira pour toute nos requete SQL (INSERT INTO $this->table)

                try
                {
                    $this->db = new \PDO("mysql:dbname=" . $xml->db .";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION)); // connexion à la BDD, si jamais on change de BDD, nous n'aurons pas besoin de modifier ce code, c'est un code généric, c'est le fichier config.xmlque l'on modifiera
                    // echo '<pre>';print_r($this->db); echo'</pre>';
                }
                catch(\PDOException $e) // on entre dans le 'catch' en cas de mauvaise connexion
                {
                    die("Problème de connexion BDD !!");
                }
            }
            catch(\PDOException $e)
            {
                die("Problème de fichier XML maquant !!");
            }
        }
        return $this->db; // On retourne la connexion
   }
   public function selectAll()
   { //$q = $bdd->query("SELECT * FROM employe"
       $q = $this->getDb()->query("SELECT * FROM " . $this->table); 
       // $this->getDb() : représente un objet PDO dans une connexion à la BDD
       // $this->table : représente dans notre cas la table 'employe', c'est ce que l'on a récupéré du fichier config.xml

       $r = $q->fetchAll(\PDO::FETCH_ASSOC);
       return $r;
      
   }

   public function getFields() // methode permettant de récupérer le nom des champs / colonne des la table 'employes'
   {
       $q = $this->getDb()->query("DESC " . $this->table); // DESC : description de la table 
       $r= $q->fetchAll(\PDO::FETCH_ASSOC);
        return array_splice($r, 1); // permet de retirer le premier champs idEmploye dans le formulaire 
   }

   public function select($id)
   {
       // $q = $this->getDb()->querry("SELECT * FROM employe WHERE idEmploye = 7256");
       $q = $this->getDb()->query("SELECT * FROM " . $this->table . ' WHERE id' . ucfirst($this->table) . "=" . (int) $id);
       // $this->table : employe
       // id . ucfirst($this->table) : idEmploye
       $r = $q->fetch(\PDO::FETCH_ASSOC);
       return $r;
   }

   public function save()
   {
       $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';

       $q = $this->getDB()->query('REPLACE INTO ' . $this->table . '(id' . ucfirst($this->table) . ',' . implode(',', array_keys($_POST)) . ') VALUES (' . $id . ',' . "'" . implode("','", $_POST) . "'" . ')');
    // $this->table : retourne la table 'employe'
    // id . ucfirst($this->table) : idEmploye
    // ',', array_keys($_POST)) : permet d'extraire chaque indice formulaire afin de les accoler vomme nom de champs 
   }

   public function delete($id)
   {   //$q = $this->db->getDb()->query("DELETE FROM employe WHERE  idEmploye = 7256");
       $q = $this->getDb()->query("DELETE FROM " . $this->table . " WHERE id" . ucfirst($this->table) . '=' . (int) $id);
   }
}

$e = new EntityRepository;
$e->getDB();
