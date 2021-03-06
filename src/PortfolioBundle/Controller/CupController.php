<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Cursus_utilisateurs_competences;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Cup\CupType;
use PortfolioBundle\Form\Cursus_utilisateurs_competencesType;


class CupController extends Controller
{
    public function cup_defautAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cup = $em->getRepository('PortfolioBundle:Cursus_utilisateurs_competences')->findBy(array('utilisateurs' => $id));
        $cursus = $em->getRepository('PortfolioBundle:Cursus_utilisateurs_competences')->select_distinct($id);
        $user = $em->getRepository('PortfolioBundle:Utilisateurs')->find($id);
        return $this->render('PortfolioBundle:Cup:cup.html.twig', array('cup_lst' => $cup, 'user' => $user, 'cursus' => $cursus,));
    }

    public function cup_addAction(Request $request)
    {
        $cup = new Cursus_utilisateurs_competences;

        $form = $this->createForm(Cursus_utilisaters_competenceType::class, $cup);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cup);
            $em->flush();
            return $this->redirectToRoute('cup_defaut');
        }
        return $this->render('PortfolioBundle:Cup:cup_add.html.twig', array('form_cup' => $form->createView()));
    }
   
}