<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends Controller
{
    /** 
     * @Route("/membre/inscription/", name="inscription")
     */
    public function InscriptionAction()
    {
        $params = array();
        return $this->render('@App/Membre/form_inscription.html.twig');
    }

    /** 
     * @Route("/membre/connexion/", name="connexion")
     */
    public function ConnexionAction()
    {
        $params = array();
        return $this->render('@App/Membre/form_connexion.html.twig');
    }

    /** 
     * @Route("/membre/profil/", name="profil")
     */
    public function ProfilAction()
    {
        $params = array();
        return $this->render('@App/Membre/profil.html.twig');
    }

}