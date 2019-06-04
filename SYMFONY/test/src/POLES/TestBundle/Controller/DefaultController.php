<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
// Controller, Route, Response etc... ce trouve dans le dossier "vendor"

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        // return $this->render('POLESTestBundle:Default:index.html.twig'); erreur /!\ -> ancienne écriture
        return $this->render('@POLESTest/Default/index.html.twig');
    }

    /** 
     *  @Route("/bonjour/")
     * localhost:8000/bonjour
     * wwww.maboutique.com/bonjour
     */
    public function bonjourAction()
    {
        echo 'Bonjour';
    }
    // test : localhost:8000/bonjour


    /** 
     * @Route("/bonjour2/")
     */
    public function bonjour2Action()
    {
        return new Response('<h1>Bonjour</h1>');
    }
    // test : localhost:8000/bonjour2/

    /** 
     * @Route("/hello/{prenom}/")
     */
    public function helloAction($prenom)
    {
        return new Response('<h1><mark>Bonjour ' . $prenom . ' !</mark></h1>');
    }
    // test : localhost:8000/hello/Yannis/

    /** 
     * @Route("/hola/{prenom}/")
     */
    public function holaAction($prenom)
    {
        $params = array(
            'prenom'=>$prenom
        );
        return $this->render("@POLESTest/Default/hola.html.twig", $params);
                                                                // array('prenom'=>$prenom);
    }

    /** 
     * @Route("/ciao/{prenom}/{age}/")
     */
    public function ciaoAction($prenom, $age)
    {
        $params = array(
            'prenom'=>$prenom,
            'age'=>$age
        );
        return $this->render("@POLESTest/Default/ciao.html.twig", $params);
    }
    // A faire : Terminer la fonctionnalité "ciao" de sorte que la page loaclhost:8000/ciao/Yannis/27 affiche : "Vous vous appelez Yannis et vous avez 27 ans".

    /** 
     * @Route("/redirect/")
     * Redirection vers l'accueil
     */
    public function redirectAction()
    {
        $route = $this->get('router')->generate('accueil');
        return new RedirectResponse($route);
    }
    // test : localhost:8000/redirect/--->Accueil

    /** 
     * @Route("/redirect2/")
     */
    public function redirect2Action()
    {
        return $this-> redirectToRoute('accueil');
    }

    /** 
     * @Route("/message/")
     */
    public function messageAction(Request $request)
    {
        $session = $request->getSession();
        $session-> getFlashBag()->add('success', 'Félicitations vous êtes inscrit');
        $session-> getFlashBag()->add('error', 'Votre adresse email n\'est pas valide');

        return $this->redirectToRoute('accueil');
    }
    // test : localhost:8000/message/--->Accueil

}
