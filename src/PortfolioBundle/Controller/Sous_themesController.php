<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Sous_themes;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Matrice\sous_themesType;


class Sous_themesController extends Controller
{
    public function sous_themes_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $stheme = $em->getRepository('PortfolioBundle:Sous_themes')->findAll();
        return $this->render('PortfolioBundle:Sous_themes:sous_themes.html.twig', array('sous_themes' => $stheme, ));
    }

    public function sous_themes_addAction(Request $request)
    {
    	$stheme = new sous_themes;
    	$form = $this->createForm(sous_themesType::class, $stheme, array('action' => $this->generateUrl('sous_themes_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($stheme);
    		$em->flush();
    		return $this->redirectToRoute('sous_themes_defaut');
    	}
        return $this->render('PortfolioBundle:Sous_themes:sous_themes_add.html.twig', array('form_stheme' => $form->createView()));
    }

     public function sous_themes_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $stheme = $em->getRepository('PortfolioBundle:Sous_themes')->find($id);
        if (null === $stheme) {
          throw new NotFoundHttpException("Le sous theme ".$id." n'existe pas.");
        }
        $form = $this->createForm(sous_themesType::class, $stheme, array('action' =>  $this->generateUrl('sous_themes_modifier', array('id' => $stheme->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('sous_themes_defaut');
        }
        return $this->render('PortfolioBundle:Sous_themes:sous_themes_add.html.twig', array('form_stheme' => $form->createView(),));
    }

        public function sous_themes_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $stheme = $em->getRepository('PortfolioBundle:Sous_themes')->find($id);
        if (null === $stheme) {
          throw new NotFoundHttpException("Le sous theme ".$id." n'existe pas.");
        }
        $em->remove($stheme);
        $em->flush();
        return $this->redirectToRoute('sous_themes_defaut');
    }
   
}