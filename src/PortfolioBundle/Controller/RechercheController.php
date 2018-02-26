<?php

namespace PortfolioBundle\Controller;

use App\Form\UtilisateurType;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \PDO;

class RechercheController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function rechercheAction(Request $request)
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

        // Exécution de la requête.
        $reponse = $bdd->query('SELECT * FROM Themes');
        

        return $this->render('PortfolioBundle:Recherche:recherche.html.twig');//, array('form' => $form->createView()));
    }


    public function rechercheNomAction(Request $request)
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

        // Exécution de la requête.
        $nomRecherche = $_POST['nomRecherche'];
        $requeteNomUser = 'SELECT * FROM Utilisateurs 
        WHERE (nom_utilisateur LIKE "%'.$nomRecherche.'%") 
        OR (prenom_utilisateur LIKE "%'.$nomRecherche.'%") 
        OR (CONCAT(nom_utilisateur, " ", prenom_utilisateur) LIKE "%'.$nomRecherche.'%")
        OR (CONCAT(prenom_utilisateur, " ", nom_utilisateur) LIKE "%'.$nomRecherche.'%")';



        $reponse = $bdd->query($requeteNomUser);
        //$reponse = $bdd->query('SELECT * FROM Themes');

        return $this->render('PortfolioBundle:Recherche:recherche.html.twig', array('resultatRequete' => $reponse, 'userRecherche' => $nomRecherche));//, array('form' => $form->createView()));
    }
}
