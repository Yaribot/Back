<?php

namespace PORTFOLIO\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('@PORTFOLIO/Default/index.html.twig');
    }

    /**
     * @Route("/bonjour/", name="bonjour")
     */
    public function bonjourAction()
    {
        return new Response('<h1>Bonjour !!</h1>');
    }
}
