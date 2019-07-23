<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Membre;
use AppBundle\Entity\Commande;
use AppBundle\Entity\DetailsCommande;

use AppBundle\Form\MembreType;
use AppBundle\Form\ProduitType;

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
    public function adminProduitAddAction(Request $request)
    {
       
        $produit = new Produit;
        // On créer un objet produit de l'entité produit (vide)
        //---------------- PLACEHOLDER
        // $produit-> setReference('XXX');
        // $produit-> setCategorie('pull');
        // $produit-> setPublic('m');
        // $produit-> setPrix('25.99');
        // $produit-> setStock('150');
        // $produit-> setTitre('pull marinière');
        // $produit-> setPhoto('marinière.jpg');
        // $produit-> setDescription('Super pull façon bretonne');
        // $produit-> setTaille('L');
        // $produit-> setCouleur('blanc et bleu');
        // ---------------------------------------

        $form = $this->createForm(ProduitType::class, $produit);
        // On créer un formulaire du type produit, et on le lie à notre objet $produit. On dit que le formulaire va hydrater l'objet (les infos du formulaire vont remplir l'objet)

        $form->handleRequest($request);
        // Lier définitivement l'objet $produit au formulaire... Elle permet de traiter les informations en POST

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($produit); // On enregistre dans le systeme l'objet

            $produit->uploadPhoto();

            $em->flush();

            $request->getsession()->getFlashBag()->add('success', 'le produit ' . $produit->getId() . ' a bien été ajouté !');
            return $this->redirectToRoute('admin_produit');

        }


        $params = array(
            'produitForm' => $form->createView(),
            'title' => 'AJOUTER UN PRODUIT'
        );
        // createView() permet de générer la partie visuel (HTML) du formulaire.

       return $this->render('@App/Admin/form_produit.html.twig', $params);
    }
    //localhost:8000/admin/produit/add


    /** 
     * @Route("/admin/produit/update/{id}/", name="admin_produit_update")
     */
    public function adminProduitUpdateAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        // Je récupère le produit à modifier : 
        $produit = $em->find(Produit::class,$id);

        // je le modifie : 
        $form = $this->createForm(ProduitType::class, $produit);
        // En créant le formulaire on le lie à notre objet produit qui va être modifié. On dit qu'on hydrate le formulaire.

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            // Je l'enregistre : 
            $em->persist($produit);

            $produit->uploadPhoto();

            $em->flush();
            
            $request->getSession()->getFlashBag()->add('success', 'Le produit ' . $produit->getTitre() . ' a bien été modifié !');
            return $this->redirectToRoute('admin_produit');
        }
        

        $params = array(
            'id' => $id,
            'produitForm' => $form->createView(),
            'title' => 'MODIFIER LE PRODUIT ' . $produit->getTitre(),
            'photo' => $produit->getPhoto()
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

        // Je supprime le produit 
        $produit->removePhoto(); 
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
        $membre = new Membre;
        $repo = $this->getDoctrine()->getRepository(Membre::class);
        $membre = $repo->findAll();


        $params = array(
            'membre' => $membre
        );
        return $this->render('@App/Admin/list_membre.html.twig', $params);
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
     * @Route("/admin/membre/update/{id}/", name="admin_update_membre")
     */
    public function adminUpdateMembreAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $membre = $em->find(Membre::class, $id);

        $form = $this->createForm(MembreType::class, $membre, ['statut' => 'admin']);
        $password = $membre->getPassword();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($membre);
            $membre->setPassword($password);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le profil du membre ' . $membre->getPrenom() . ' a bien été mis à jour');
            return $this->redirectToRoute('admin_membre');
        }

        $params = array(
            'id' => $id,
            'membreForm' => $form->createView()
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

        $repo = $this->getDoctrine()->getRepository(Commande::class);
        $commandes = $repo->findAll();

        $params = array(
            'commandes' => $commandes
        );
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