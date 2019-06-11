<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

class MembreController extends Controller
{
    /** 
     * @Route("/membre/inscription/", name="inscription")
     */
    public function InscriptionAction(Request $request)
    {
        $membre = new Membre;

        $form = $this->createForm(MembreType::class, $membre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($membre); // On enregistre dans le systeme l'objet
            $em->flush();

            $request->getsession()->getFlashBag()->add('success', 'Félicitation ' . $membre->getPrenom() . ', vous êtes bien enregisté !!');
            return $this->redirectToRoute('inscription');

        }


        $params = array(
            'membreForm' => $form->createView(),
            'title' => 'INSCRIPTION'
        );
        return $this->render('@App/Membre/form_inscription.html.twig', $params);
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