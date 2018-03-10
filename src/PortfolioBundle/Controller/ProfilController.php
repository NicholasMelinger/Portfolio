<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\Utilisateurs\UtilisateursType;
use PortfolioBundle\Form\Utilisateurs\EditUtilisateursType;
use PortfolioBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfilController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function creationProfilAction(Request $request)
    {
        //, UserPasswordEncoderInterface $passwordEncoder
        // 1) build the form
        $utilisateur = new Utilisateurs();
        $form = $this->createForm(UtilisateursType::class, $utilisateur);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $passwordEncoder = $this->get('security.password_encoder');
            $password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
            $utilisateur->setPassword($password);
            $utilisateur->setDateInscription(new \DateTime(date("d-m-y")));    

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->render('PortfolioBundle:Default:index.html.twig');
        }

        return $this->render('PortfolioBundle:Profil:creationProfil.html.twig', array(
          'form' => $form->createView(),
        ));

        //return $this->render('PortfolioBundle:Default:index.html.twig');
    }


    public function modificationProfilAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $exp = $em->getRepository('PortfolioBundle:Utilisateurs')->find($id);
        if (null === $exp) {
          throw new NotFoundHttpException("L'utilisateur ".$id." n'existe pas.");
        }
        $form = $this->createForm(EditUtilisateursType::class, $exp, array('action' =>  $this->generateUrl('modification_profil', array('id' => $exp->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('portfolio_homepage');
        }
        return $this->render('PortfolioBundle:Profil:modificationProfil.html.twig', array('edit_form' => $form->createView(),));
    }

    public function profilAction($id)
    {
        return $this->render('PortfolioBundle:Profil:profil.html.twig');
    }
}
