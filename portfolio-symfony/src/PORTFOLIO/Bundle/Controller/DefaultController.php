<?php

namespace PORTFOLIO\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Projects;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
     * @Route("/admin/", name="admin")
     */
    public function adminAction()
    {
        return $this->render('@PORTFOLIO/Admin/form-connexion.html.twig');
    }

    /**
     * @Route("/travaux/", name="travaux")
     */
    public function travauxAction()
    {
        return $this->render('@PORTFOLIO/Default/travaux.html.twig');
    }

    /**
     * @Route("/experience/", name="experience")
     */
    public function experienceAction()
    {
        return $this->render('@PORTFOLIO/Default/experiences.html.twig');
    }

    /**
     * @Route("/formation/", name="formation")
     */
    public function formationAction()
    {
        return $this->render('@PORTFOLIO/Default/formations.html.twig');
    }

    /**
     * @Route("/competence/", name="competence")
     */
    public function competenceAction()
    {
        return $this->render('@PORTFOLIO/Default/competences.html.twig');
    }

    /**
     * @Route("/contact/", name="contact")
     */
    public function contactAction()
    {
        return $this->render('@PORTFOLIO/Default/contact.html.twig');
    }

    /**
     * @Route("/hobby/", name="hobby")
     */
    public function hobbyAction()
    {
        return $this->render('@PORTFOLIO/Default/hobbies.html.twig');
    }
}
