<?php

namespace PortfolioBundle\Controller;
    
use App\Form\UtilisateurType;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \PDO;

class ValidationsController extends Controller
{
    public function indexAction()
    {
        $idUserValide = $_GET['idUser'];
        $idCompetenceValidee = $_GET['idComp'];


        return $this->render('PortfolioBundle:Validations:ajoutValidation.html.twig',
            array('idUserValide' => $idUserValide, 'idCompetenceValidee' => $idCompetenceValidee));
    }

    public function indexExperienceAction()
    {
        $idUserValide = $_GET['idUser'];
        $idExperienceValidee = $_GET['idExp'];


        return $this->render('PortfolioBundle:Validations:ajoutValidationExp.html.twig',
            array('idUserValide' => $idUserValide, 'idExperienceValidee' => $idExperienceValidee));
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function validerAction(Request $request)
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

        $comm = $_POST['commentaireCompetence'];
        $idUtilisateurValide = $_GET['idUser'];
        $idCompetenceValidee = $_GET['idComp'];
         $date = date("Y-m-d H:i:s");

         $session = $this->get('session');
        $sessionid = $session->get('userID');


        $requete = "INSERT INTO Validations(type_valid, date_validation, commentaire, idUtilisateurValide, idUtilisateurValidant, idCompetenceValidee) VALUES ('comp', '".$date. "', '$comm','$idUtilisateurValide', '$sessionid', '$idCompetenceValidee')";

        // Exécution de la requête.
        if ($bdd->query($requete))
        {
          echo 1;
        }
        else
        {
            echo $requete;
        }

                //Récupération des 5 derniers profils
        $requeteUtilisateur = 'SELECT id, nom_utilisateur, prenom_utilisateur, url_photo 
                            FROM utilisateurs
                            LIMIT 5';
        $utilisateurs = $bdd->query($requeteUtilisateur);
        
        return $this->render('PortfolioBundle:Default:index.html.twig', array('utilisateurs' => $utilisateurs));
    }


    public function validerExperienceAction(Request $request)
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

        $comm = $_POST['commentaireExperience'];
        $idUtilisateurValide = $_GET['idUser'];
        $idExperienceValidee = $_GET['idExp'];
         $date = date("Y-m-d H:i:s");

         $session = $this->get('session');
        $sessionid = $session->get('userID');


        $requete = "INSERT INTO Validations(type_valid, date_validation, commentaire, idUtilisateurValide, idUtilisateurValidant, idCompetenceValidee) VALUES ('exp', '".$date. "', '$comm','$idUtilisateurValide', '$sessionid', '$idExperienceValidee')";

        // Exécution de la requête.
        if ($bdd->query($requete))
        {
          echo 1;
        }
        else
        {
            echo $requete;
        }

                //Récupération des 5 derniers profils
        $requeteUtilisateur = 'SELECT id, nom_utilisateur, prenom_utilisateur, url_photo 
                            FROM utilisateurs
                            LIMIT 5';
        $utilisateurs = $bdd->query($requeteUtilisateur);
        
        return $this->render('PortfolioBundle:Default:index.html.twig', array('utilisateurs' => $utilisateurs));
    }
}
