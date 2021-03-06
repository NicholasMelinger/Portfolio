<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Cursus;
use PortfolioBundle\Entity\Cursus_utilisateurs_competences;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Cursus\CursusType;
use PortfolioBundle\Form\Cursus\Cup\CupType;
use PortfolioBundle\Form\Cursus_utilisateurs_competences\Cursus_utilisateurs_competencesType;


class CursusController extends Controller
{
    public function cursus_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $crs = $em->getRepository('PortfolioBundle:Cursus')->findAll();
        return $this->render('PortfolioBundle:Cursus:cursus.html.twig', array('cursus' => $crs, ));
    }

    public function cursus_addAction(Request $request)
    {
    	$crs = new Cursus;
    	$form = $this->createForm(CursusType::class, $crs, array('action' => $this->generateUrl('cursus_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($crs);
    		$em->flush();
    		return $this->redirectToRoute('cursus_defaut');
    	}
        return $this->render('PortfolioBundle:Cursus:cursus_add.html.twig', array('form_crs' => $form->createView()));
    }

     public function cursus_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $crs = $em->getRepository('PortfolioBundle:Cursus')->find($id);
        if (null === $crs) {
          throw new NotFoundHttpException("Le cursus ".$id." n'existe pas.");
        }
        $form = $this->createForm(cursusType::class, $crs, array('action' =>  $this->generateUrl('cursus_modifier', array('id' => $crs->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('cursus_defaut');
        }
        return $this->render('PortfolioBundle:cursus:cursus_add.html.twig', array('form_crs' => $form->createView(),));
    }

        public function cursus_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $crs = $em->getRepository('PortfolioBundle:Cursus')->find($id);
        if (null === $crs) {
          throw new NotFoundHttpException("Le cursus ".$id." n'existe pas.");
        }
        $em->remove($crs);
        $em->flush();
        return $this->redirectToRoute('cursus_defaut');
    }

    public function cuc_addAction(Request $request)
    {
        $session = $this->get('session');
        $user_id = $session->get('userID');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PortfolioBundle:Utilisateurs')->findById($user_id);

        $cuc = new Cursus_utilisateurs_competences;

        $form = $this->createForm(Cursus_utilisateurs_competencesType::class, $cuc);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $cuc->setUtilisateurs($user[0]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cuc);
            $em->flush();
            return $this->redirectToRoute('modification_profil', array('id' => $user_id));
        }
        return $this->render('PortfolioBundle:Cursus_utilisateurs_competences:cuc_add.html.twig', array('form_cuc' => $form->createView()));
    }
    
}