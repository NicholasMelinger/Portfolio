<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Experiences;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Experiences\ExperienceType;


class ExperiencesController extends Controller
{
    public function experiences_defautAction()
    {
        return $this->render('PortfolioBundle:Experiences:experiences.html.twig');
    }
    
    public function experiences_addAction(Request $request)
    {
    	$exp = new Experiences;
    	$form = $this->createForm(ExperienceType::class, $exp, array('action' => $this->generateUrl('experience_ajout')));
    	$form->handleRequest($request);
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($exp);
    		$em->flush();
    		return $this->redirectToRoute('experience_defaut');
    	}
        return $this->render('PortfolioBundle:Experiences:experiences_add.html.twig', array('form_exp' => $form->createView()));
    }

}