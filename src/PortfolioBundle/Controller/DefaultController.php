<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioBundle:Default:index.html.twig');
    }
    public function cssAction()
    {
        return $this->render('PortfolioBundle:Default:css.html.twig');
    }
    public function adminAction()
    {
        return $this->render('PortfolioBundle:Default:admin.html.twig');
    }
    public function contactAction()
    {
        return $this->render('PortfolioBundle:Default:contact.html.twig');
    }
}
