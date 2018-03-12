<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\UtilisateursType;
use PortfolioBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

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
            //$password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
            //$password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
            $password = password_hash($utilisateur->getPlainPassword(), PASSWORD_DEFAULT);
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


    public function modificationProfilAction(Request $request, $id_utilisateur)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $utilisateur = $em->getRepository('PortfolioBundle:Utilisateurs')->find($id_utilisateur);

        $editForm = $this->createForm('PortfolioBundle\Form\UtilisateursType', $utilisateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();


            return $this->render('PortfolioBundle:Default:index.html.twig');
            //return $this>redirectToRoute('rayon_edit', array('id' => $rayon->getId()));-
        }

        /*return $this->render('rayon/edit.html.twig', array(
            'rayon' => $rayon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));*/

        return $this->render('PortfolioBundle:Profil:modificationProfil.html.twig',array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView()));
    }
}
