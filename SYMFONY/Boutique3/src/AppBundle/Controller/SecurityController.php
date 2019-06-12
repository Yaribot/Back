<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

class SecurityController extends Controller
{
    /** 
     * @Route("/connexion/", name="connexion")
     */
    public function connexionAction(Request $request)
    {
        $auth = $this->get('security.authentication_utils');

        $lastUserName = $auth->getLastUserName();
        // Récupérer le pseudo tapé...

        $error = $auth-> getLastAuthenticationError();
        // Récupérer l'erreur si il y en a une

        if(!empty($error))
        {
            $request->getSession()->getFlashBag()->add('errors', 'Erreur d\'identifiant ! ');
        }

        $params = array(
            'lastUserName' => $lastUserName 
        );
        return $this-> render('@App/Membre/form_connexion.html.twig', $params);

    }

    /** 
     * @Route("/connexion_check/", name="connexion_check")
     */
    public function connexionCheckAction()
    {

    }

    /** 
     * @Route("/deconnexion/", name="deconnexion")
     */
    public function deconnexionAction()
    {

    }
}

