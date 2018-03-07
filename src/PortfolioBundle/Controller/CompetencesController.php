<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Competences;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Competences\CompetencesType;


class CompetencesController extends Controller
{
    public function competences_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $comp = $em->getRepository('PortfolioBundle:Competences')->findAll();
        return $this->render('PortfolioBundle:Competences:competences.html.twig', array('competences' => $comp, ));
    }

    public function competences_addAction(Request $request)
    {
    	$comp = new Competences;
        $comp->setdateCreation (new \DateTime());
        $comp->setdateMaj (new \DateTime());
    	$form = $this->createForm(CompetencesType::class, $comp, array('action' => $this->generateUrl('competences_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($comp);
    		$em->flush();
    		return $this->redirectToRoute('competences_defaut');
    	}
        return $this->render('PortfolioBundle:Competences:competences_add.html.twig', array('form_comp' => $form->createView()));
    }

     public function competences_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comp = $em->getRepository('PortfolioBundle:Competences')->find($id);
        $comp->setdateMaj (new \DateTime());
        if (null === $comp) {
          throw new NotFoundHttpException("La competence ".$id." n'existe pas.");
        }
        $form = $this->createForm(competencesType::class, $comp, array('action' =>  $this->generateUrl('competences_modifier', array('id' => $comp->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('competences_defaut');
        }
        return $this->render('PortfolioBundle:Competences:competences_add.html.twig', array('form_comp' => $form->createView(),));
    }

        public function competences_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comp = $em->getRepository('PortfolioBundle:Competences')->find($id);
        if (null === $comp) {
          throw new NotFoundHttpException("La competence ".$id." n'existe pas.");
        }
        $em->remove($comp);
        $em->flush();
        return $this->redirectToRoute('competences_defaut');
    }
   
}