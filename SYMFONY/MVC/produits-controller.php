<?php

require('produits-model.php');
class produitsController
{
    private $model; // contient l'obj produitsModel;
    public function __construct()
    {
        $this->model = new produitsModel;
    }

    // afficher tout les produits
    public function boutique()
    {
    //    mission de la fonction : Afficher tout les produits
    // 1 : Récupérer tout les produits
    $produits =$this->model->findAll();
    $categories = $this->model->findCat();
    // SELECT DISTINCT (categories) FROM produit -----------> les requetes SQL doivent être faites sur le model
    // echo '<pre>';
    // print_r($produits);
    // echo '<pre>';
    // 2 : Afficher les produits
    require('produits.php');
    }
     // afficher afficher un seul produit 
    public function affichage($id)
    {

    }
    // afficher tout les produits d'une seul catégorie
    public function categorie ($categorie)
    {

    }
    // ajouter un produit
    public function ajouterProduit()
    {
    
    }
    // modifier un produit
    public function modifierProduit($id,$data)
    {

    }
    // supprimer un produit
    public function supprimerProduit($id)
    {

    }
}