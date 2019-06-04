<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin/, name="list_produit")
     */
    public function listProduitAction()
    {
        $params = array();
       return $this->render('@App/Admin/list_produit.html.twig', $params);
    }

    /**
     * @Route("/admin/, name="form_produit")
     */
    public function formProduitAction()
    {
        $params = array();
       return $this->render('@App/Admin/form_produit.html.twig', $params);
    }
}