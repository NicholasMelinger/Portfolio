<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExperiencesController extends Controller
{
    public function experiences_defautAction()
    {
        return $this->render('PortfolioBundle:Default:experiences.html.twig');
    }
    public function experiences_addAction()
    {
        return $this->render('PortfolioBundle:Default:experiences.html.twig');
    }

}