<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Experiences;
use PortfolioBundle\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Experiences\ExperienceType;

class AlertesController extends Controller
{
    public function alertes_defautAction()
    {
        $em = $this->getDoctrine()->getManager();
        $exp = $em->getRepository('PortfolioBundle:Experiences')->findAll();
        return $this->render('PortfolioBundle:Experiences:experiences.html.twig', array('experiences' => $exp, ));
    }
}