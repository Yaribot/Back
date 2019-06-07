<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Membre;
use AppBundle\Entity\Commande;
use AppBundle\Entity\DetailsCommande;

class AdminController extends Controller
{

    // ------------ CRUD PRODUIT ----------------------


    /**
     * @Route("/admin/produit/", name="admin_produit")
     * www.maboutique.com/admin/
     */
    public function adminProduitAction()
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();


        $params = array(
            'produits' => $produits
        );
       return $this->render('@App/Admin/list_produit.html.twig', $params);
    }

    /**
     * @Route("/admin/produit/add/", name="admin_add_produit")
     */
    public function adminProduitAddAction()
    {
       
        $produit = new Produit;
        // On créer un objet produit de l'entit" produit (vide)
        $produit-> setReference('XXX');
        $produit-> setCategorie('pull');
        $produit-> setPublic('m');
        $produit-> setPrix('25.99');
        $produit-> setStock('150');
        $produit-> setTitre('pull marinière');
        $produit-> setPhoto('marinière.jpg');
        $produit-> setDescription('Super pull façon bretonne');
        $produit-> setTaille('L');
        $produit-> setCouleur('blanc et bleu');

        $em = $this->getDoctrine()->getManager(); // On récup le manager 
        $em->persist($produit); // On enregistre dans le systeme l'objet
        $em->flush();

        $params = array();
       return $this->render('@App/Admin/form_produit.html.twig', $params);
    }
    //localhost:8000/admin/produit/add


    /** 
     * @Route("/admin/produit/update/{id}/", name="admin_produit_update")
     */
    public function adminProduitUpdateAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        // Je récupère le produit à modifier : 
        $produit = $em->find(Produit::class,$id);

        // je le modifie : 
        $produit->setPrix('1000');

        // Je l'enregistre : 
        $em->persist($produit);
        $em->flush();    

        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_produit.html.twig', $params);
    }
    // localhost:8000/admin/produit/update/id


    /** 
     * @Route("/admin/produit/delete/{id}/", name="admin_produit_delete")
     */
    public function adminProduitDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

         // Je récupère le produit à supprimer : 
        $produit = $em->find(Produit::class,$id);

        // Je supprime le produit : 
        $em->remove($produit);
        $em->flush();
        
        
        $request->getSession()->getFlashBag()->add('success', 'Le produit N°' . $id . ' a bien été supprimé');

        return $this->redirectToRoute('admin_produit');
    }
    // test : localhost/admin/produit/delete/id


    // ------------ CRUD MEMBRE ----------------------


    /** 
     * @Route("/admin/membre/", name="admin_membre")
     */
    public function adminMembreAction()
    {
        $params = array();
        return $this->render('@App/Admin/list_membre.html.twig');
    }

    /** 
     * @Route("/admin/membre/add/", name="admin_add_membre")
     */
    public function adminAddMembreAction()
    {
        $params = array();
        return $this->render('@App/Admin/form_produit.html.twig', $params);
    }

    /** 
     * @Route("/admin/membre/update/", name="admin_update_membre")
     */
    public function adminUpdateMembreAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_membre.html.twig', $params);
    }

    /** 
     * @Route("/admin/membre/delete/", name="admin_delete_membre")
     */
    public function adminMembreDeleteAction($id, Request $request)
    {
        $params = array();

        $request->getSession()->getFlashBag()->add('success', 'Le membre N°' . $id . ' a bien été supprimé');

        return $this->redirectToRoute('admin_produit');
    }


    // ------------ CRUD COMMANDE ----------------------

    
    /** 
     * @Route("/admin/commande/", name="admin_commande")
     */
    public function adminCommandeAction()
    {
        $params = array();
        return $this->render('@App/Admin/list_commande.html.twig', $params);
    }

    /** 
     * @Route("/admin/commande/add/", name="admin_add_commande")
     */
    public function adminAddCommandeAction()
    {
        $params = array();
        return $this->render('@App/Admin/form_commande.html.twig', $params);
    }

    /** 
     * @Route("/admin/commande/update/{id}/", name="admin_commande_update")
     */
    public function adminUpdateCommandeAction($id)
    {
        $params = array(
            'id' => $id
        );
        return $this->render('@App/Admin/form_commande.html.twig', $params);
    }

    /** 
     * @Route("/admin/commande/delete/", name="admin_delete_commande")
     */
    public function adminCommandeDeleteAction($id, Request $request)
    {
        $params = array();
    
        $request->getSession()->getFlashBag()->add('success', 'La commande N°' . $id . ' a bien été supprimé');
    
        return $this->redirectToRoute('admin_commande');
    }
}