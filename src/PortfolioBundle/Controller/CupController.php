<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Cursus_utilisateurs_competences;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Cup\CupType;


class CupController extends Controller
{
    public function cup_defautAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cup = $em->getRepository('PortfolioBundle:Cursus_utilisateurs_competences')->findBy(array('utilisateurs' => $id));
        return $this->render('PortfolioBundle:Cup:cup.html.twig', array('cup_lst' => $cup,));
    }
}