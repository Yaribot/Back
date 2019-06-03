<?php

// MVC/produitsModel.php

class produitsModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,));
    }
    // ----------------------------------------
    // La mission de ce fichier produitsModel est d'interagir avec la table produit dans la BDD (REQUETE SQL
    
    // récupérer tout les produits
    public function findAll()
    {
        $resultat = $this->pdo->query('SELECT * FROM produit');
        $produits = $resultat->fetchAll();
        return $produits;
    }
    // récupérer toutes les catégories
    public function findCat()
    {
        $resultat = $this->pdo->query('SELECT DISTINCT (categorie) FROM produit');
        $categories = $resultat->fetchAll();
        return $categories;
    }

    // récupérer un produit par l'id
     public function find($id){

        $resultat = $this -> pdo -> query("SELECT * FROM produit WHERE id_produit = :id");
        $resultat = bindValue('id', $id, PDO::PARAM_INT);
        $resultat -> execute();
        $produit = $resultat -> fetch();
        return $produit;
    }

    // recupérer tout les produits par la catégorie

    // Insert
    // update
    // Delete
}