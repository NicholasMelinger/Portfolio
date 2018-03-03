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
        $requeteNomUser = 'SELECT id, nom_utilisateur, prenom_utilisateur, TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) AS age
                            FROM Utilisateurs 
                            WHERE (nom_utilisateur LIKE "%'.$nomRecherche.'%") 
                            OR (prenom_utilisateur LIKE "%'.$nomRecherche.'%") 
                            OR (CONCAT(nom_utilisateur, " ", prenom_utilisateur) LIKE "%'.$nomRecherche.'%")
                            OR (CONCAT(prenom_utilisateur, " ", nom_utilisateur) LIKE "%'.$nomRecherche.'%")';
        $reponse = $bdd->query($requeteNomUser);

        // Récupération des associations cursus/users.
        $requeteCursus = 'SELECT utilisateurs_id, libelle_formation, annee 
                            FROM cursus_utilisateurs_competences JOIN Cursus ON Cursus.id = cursus_utilisateurs_competences.cursus_id';
        $resultatCursus = $bdd->query($requeteCursus);


        // Récupération des associations compétences/users.
        $requeteComp = 'SELECT utilisateurs_id, libelle_competence
                            FROM utilisateurs_competences JOIN Competences ON Competences.id = utilisateurs_competences.competences_id';
        $resultatComp = $bdd->query($requeteComp);

        
        

        return $this->render('PortfolioBundle:Recherche:recherche.html.twig', 
            array('resultatRequete' => $reponse, 'userRecherche' => $nomRecherche, 'resultatCursus' => $resultatCursus->fetchAll(), 'resultatComp' => $resultatComp->fetchAll()));

    }

    public function rechercheAvanceeAction(Request $request)
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

        // Récupération des cursus existant en BDD.
        $requeteCursus = 'SELECT id, libelle_formation FROM Cursus ORDER BY libelle_formation';
        $resultatCursus = $bdd->query($requeteCursus);



        // Exécution de la requête.
        // $nomRecherche = $_POST['nomRecherche'];
        // $requeteNomUser = 'SELECT id, nom_utilisateur, prenom_utilisateur, TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) AS age
        //                     FROM Utilisateurs 
        //                     WHERE (nom_utilisateur LIKE "%'.$nomRecherche.'%") 
        //                     OR (prenom_utilisateur LIKE "%'.$nomRecherche.'%") 
        //                     OR (CONCAT(nom_utilisateur, " ", prenom_utilisateur) LIKE "%'.$nomRecherche.'%")
        //                     OR (CONCAT(prenom_utilisateur, " ", nom_utilisateur) LIKE "%'.$nomRecherche.'%")';
        // $reponse = $bdd->query($requeteNomUser);

        // // Récupération des associations cursus/users.
        // $requeteCursus = 'SELECT utilisateurs_id, libelle_formation, annee 
        //                     FROM cursus_utilisateurs_competences JOIN Cursus ON Cursus.id = cursus_utilisateurs_competences.cursus_id';
        // $resultatCursus = $bdd->query($requeteCursus);


        // // Récupération des associations compétences/users.
        // $requeteComp = 'SELECT utilisateurs_id, libelle_competence
        //                     FROM utilisateurs_competences JOIN Competences ON Competences.id = utilisateurs_competences.competences_id';
        // $resultatComp = $bdd->query($requeteComp);

        
        

        return $this->render('PortfolioBundle:Recherche:rechercheavancee.html.twig', array('resultatCursus' => $resultatCursus->fetchAll()));

    }

    public function resultatRechercheAction(Request $request)
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

        // Récupération des cursus existant en BDD.
        $requeteCursus = 'SELECT id, libelle_formation FROM Cursus ORDER BY libelle_formation';
        $resultatCursus = $bdd->query($requeteCursus);

        return $this->render('PortfolioBundle:Recherche:resultatrecherche.html.twig', array('resultatCursus' => $resultatCursus->fetchAll()));
    }
}
