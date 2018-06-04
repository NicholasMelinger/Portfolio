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
                            ORDER BY id DESC LIMIT 5';
        $utilisateurs = $bdd->query($requeteUtilisateur);

        $requeteCursus = 'SELECT utilisateurs_id, libelle_formation, annee 
                            FROM cursus_utilisateurs_competences JOIN Cursus ON Cursus.id = cursus_utilisateurs_competences.cursus_id
                            LIMIT 10';
        $resultatCursus = $bdd->query($requeteCursus);

        // Récupération des associations compétences/users.
        $requeteComp = 'SELECT utilisateurs_id, libelle_competence
                            FROM utilisateurs_competences JOIN Competences ON Competences.id = utilisateurs_competences.competences_id
                            LIMIT 20';
        $resultatComp = $bdd->query($requeteComp);


        return $this->render('PortfolioBundle:Default:index.html.twig', array('utilisateurs' => $utilisateurs, 'resultatComp' => $resultatComp->fetchAll(), 'resultatCursus' => $resultatCursus->fetchAll()));
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