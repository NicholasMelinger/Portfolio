<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Matrice;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Matrice\MatriceType;


class MatriceController extends Controller
{
    public function matrice_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mat = $em->getRepository('PortfolioBundle:Matrice')->findAll();
        return $this->render('PortfolioBundle:Matrice:matrice.html.twig', array('matrice' => $mat, ));
    }
    
    public function matrice_addAction(Request $request)
    {
    	$mat = new Matrice;
    	$form = $this->createForm(MatriceType::class, $mat, array('action' => $this->generateUrl('matrice_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($mat);
    		$em->flush();
    		return $this->redirectToRoute('matrice_defaut');
    	}
        return $this->render('PortfolioBundle:Matrice:matrice_add.html.twig', array('form_mat' => $form->createView()));
    }
    public function matrice_modifierAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $mat = $em->getRepository('PortfolioBundle:Matrice')->find($id);
        if (null === $mat) {
          throw new NotFoundHttpException("La matrice".$id." n'existe pas.");
        }
        $form = $this->createForm(MatriceType::class, $mat, array('action' =>  $this->generateUrl('matrice_modifier', array('id' => $mat->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('matrice_defaut');
        }
        return $this->render('PortfolioBundle:Matrice:matrice_add.html.twig', array('form_mat' => $form->createView(),));
    }

        public function matrice_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $mat = $em->getRepository('PortfolioBundle:Matrice')->find($id);
        if (null === $mat) {
          throw new NotFoundHttpException("La matrice".$id." n'existe pas.");
        }
        $em->remove($mat);
        $em->flush();
        return $this->redirectToRoute('matrice_defaut');
    }

}