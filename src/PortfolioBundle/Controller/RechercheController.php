<?php

namespace PortfolioBundle\Controller;

use App\Form\UtilisateurType;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function rechercheAction(Request $request)
    {

 
        return $this->render('PortfolioBundle:Recherche:recherche.html.twig');//, array('form' => $form->createView()));
        // 1) build the form
        // $utilisateur = new Utilisateurs();
        // $form = $this->createForm(UtilisateurType::class, $utilisateur);

        // // 2) handle the submit (will only happen on POST)
        // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {

        //     // 3) Encode the password (you could also do this via Doctrine listener)
        //     $password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
        //     $utilisateur->setPassword($password);

        //     // 4) save the User!
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($utilisateur);
        //     $em->flush();

        //     // ... do any other work - like sending them an email, etc
        //     // maybe set a "flash" success message for the user

        //     return $this->render('PortfolioBundle:Default:css.html.twig');
        // }

        // return $this->render(
        //     'creation_profil/creationProfil.html.twig',
        //     array('form' => $form->createView())
        // );
    }
}
