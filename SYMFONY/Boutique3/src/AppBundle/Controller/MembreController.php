<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

class MembreController extends Controller
{
    /** 
     * @Route("/membre/inscription/", name="inscription")
     */
    public function InscriptionAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $membre = new Membre;

        $form = $this->createForm(MembreType::class, $membre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager(); // On récup le manager 
            $em->persist($membre); // On enregistre dans le systeme l'objet

            $password = $membre->getPassword();
            // password saisie dans le formulaire

            $password_crypte = $encoder->encodePassword($membre, $password);
            // j'encode le password

            $membre->setPassword($password_crypte);

            $membre->setSalt(NULL);
            $membre->setRoles(['ROLE_USER']);
            // On définit un role par défaut

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
     * @Route("/membre/profil/", name="profil")
     */
    public function ProfilAction()
    {
        $params = array();
        return $this->render('@App/Membre/profil.html.twig');
    }

}