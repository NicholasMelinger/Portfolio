<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Sous_sous_themes;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Matrice\sous_sous_themesType;


class Sous_sous_themesController extends Controller
{
    public function sous_sous_themes_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sstheme = $em->getRepository('PortfolioBundle:Sous_sous_themes')->findAll();
        return $this->render('PortfolioBundle:Sous_sous_themes:sous_sous_themes.html.twig', array('sous_sous_themes' => $sstheme, ));
    }

    public function sous_sous_themes_addAction(Request $request)
    {
    	$sstheme = new sous_sous_themes;
    	$form = $this->createForm(sous_sous_themesType::class, $sstheme, array('action' => $this->generateUrl('sous_sous_themes_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($sstheme);
    		$em->flush();
    		return $this->redirectToRoute('sous_sous_themes_defaut');
    	}
        return $this->render('PortfolioBundle:Sous_sous_themes:sous_sous_themes_add.html.twig', array('form_sstheme' => $form->createView()));
    }

     public function sous_sous_themes_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sstheme = $em->getRepository('PortfolioBundle:Sous_sous_themes')->find($id);
        if (null === $sstheme) {
          throw new NotFoundHttpException("Le sous sous theme ".$id." n'existe pas.");
        }
        $form = $this->createForm(sous_sous_themesType::class, $sstheme, array('action' =>  $this->generateUrl('sous_sous_themes_modifier', array('id' => $stheme->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('sous_sous_themes_defaut');
        }
        return $this->render('PortfolioBundle:Sous_sous_themes:sous_sous_themes_add.html.twig', array('form_sstheme' => $form->createView(),));
    }

        public function sous_sous_themes_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sstheme = $em->getRepository('PortfolioBundle:Sous_sous_themes')->find($id);
        if (null === $sstheme) {
          throw new NotFoundHttpException("Le sous sous theme ".$id." n'existe pas.");
        }
        $em->remove($sstheme);
        $em->flush();
        return $this->redirectToRoute('sous_sous_themes_defaut');
    }
   
}