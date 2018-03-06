<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Themes;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Matrice\ThemesType;


class ThemesController extends Controller
{
    public function themes_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $theme = $em->getRepository('PortfolioBundle:Themes')->findAll();
        return $this->render('PortfolioBundle:Themes:themes.html.twig', array('themes' => $theme, ));
    }

    public function themes_addAction(Request $request)
    {
    	$theme = new Themes;
    	$form = $this->createForm(ThemesType::class, $theme, array('action' => $this->generateUrl('themes_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($theme);
    		$em->flush();
    		return $this->redirectToRoute('themes_defaut');
    	}
        return $this->render('PortfolioBundle:Themes:themes_add.html.twig', array('form_theme' => $form->createView()));
    }

     public function themes_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $theme = $em->getRepository('PortfolioBundle:Themes')->find($id);
        if (null === $theme) {
          throw new NotFoundHttpException("Le theme ".$id." n'existe pas.");
        }
        $form = $this->createForm(themesType::class, $comp, array('action' =>  $this->generateUrl('themes_modifier', array('id' => $comp->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('themes_defaut');
        }
        return $this->render('PortfolioBundle:Themes:themes_add.html.twig', array('form_theme' => $form->createView(),));
    }

        public function themes_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $theme = $em->getRepository('PortfolioBundle:Themes')->find($id);
        if (null === $theme) {
          throw new NotFoundHttpException("Le theme ".$id." n'existe pas.");
        }
        $em->remove($theme);
        $em->flush();
        return $this->redirectToRoute('themes_defaut');
    }
   
}