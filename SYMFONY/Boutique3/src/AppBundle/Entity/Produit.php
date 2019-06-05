<?php 

namespace AppBundle\Entity; 

use Doctrine\ORM\Mapping as ORM;


/** 
 * Produit
 * @ORM\Table(name="produit")
 * Correspond à la table Produit dans la BDD
 * 
 * @ORM\Entity()
 * Cette classe est une Entity
 */


class Produit
{
    /** 
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /** 
     * @ORM\column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;
    
    /** 
     * @ORM\column(name="categorie", type="string", length=20, nullable=false)
     */
    private $categorie;
    
    /** 
     * @ORM\column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;
    
    /** 
     * @ORM\column(name="description", type="text", nullable=false)
     */
    private $description;
    
    /** 
     * @ORM\column(name="couleur", type="string", length=50, nullable=false)
     */
    private $couleur;
    
    /** 
     * @ORM\column(name="taille", type="string", length=5, nullable=false)
     */
    private $taille; 
    
    /** 
     * @ORM\column(name="public", type="string", length=20, nullable=false)
     */
    private $public;
    
    /** 
     * @ORM\column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;
    
    /** 
     * @ORM\column(name="prix", type="float", nullable=false)
     */
    private $prix;
    
    /** 
     * @ORM\column(name="stock", type="integer", length=4, nullable=false)
     */
	private $stock; 
	
	

    public function getId()
    {
        return $this->id;
    }


    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
 
    public function getReference()
    {
        return $this->reference;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
   
    public function getDescription()
    {
        return $this->description;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
	}
	
    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    public function getPublic()
    {
        if($public == 'm' || $public == 'f' || $public == 'mixte')
        {
            $this->public;
        }
        return $this->public;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }
}
