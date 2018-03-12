<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \PDO;


class DefaultController extends Controller
{
    public function indexAction()
    {
        // Connexion à la BDD.
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout.
            die('Erreur : '.$e->getMessage());
        }

        //Récupération des 5 derniers profils
        $requeteUtilisateur = 'SELECT id, nom_utilisateur, prenom_utilisateur, url_photo 
                            FROM utilisateurs
                            LIMIT 5';
        $utilisateurs = $bdd->query($requeteUtilisateur);


        return $this->render('PortfolioBundle:Default:index.html.twig', array('utilisateurs' => $utilisateurs));
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
