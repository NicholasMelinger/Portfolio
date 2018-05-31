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
        $requeteNomUser = 'SELECT id, nom_utilisateur, prenom_utilisateur, mail_utilisateur, ville, code_postal, TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) AS age
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

        
        $requeteExperience = 'SELECT * FROM `experiences` order by utilisateurs_id';
        $resultatExp = $bdd->query($requeteExperience);
        

        return $this->render('PortfolioBundle:Recherche:recherche.html.twig', 
            array('resultatExp' => $resultatExp, 'resultatRequete' => $reponse, 'userRecherche' => $nomRecherche, 'resultatCursus' => $resultatCursus->fetchAll(), 'resultatComp' => $resultatComp->fetchAll()));

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


        // Récupération des thèmes et compétences. 
        $requeteCompetencesThemes = 'SELECT Competences.id, libelle_competence, Themes.libelle_theme, Themes.id as idTheme
                        FROM Competences JOIN matrice ON matrice.id = Competences.matrice_comp_id JOIN Themes ON Themes.id = matrice.theme_matrice_id
                        ORDER BY matrice.theme_matrice_id';
        $resultatCompetencesThemes = $bdd->query($requeteCompetencesThemes);

        return $this->render('PortfolioBundle:Recherche:rechercheavancee.html.twig', 
            array('resultatCursus' => $resultatCursus->fetchAll(), 
                    'resultatCompetencesThemes' => $resultatCompetencesThemes->fetchAll()));

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

        //echo '<br><br><br><br>';    
        

        // Récupération des personnes correspondant aux critères de recherche.
        $requeteRecherche = 'SELECT *, TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) AS age
                            FROM Utilisateurs
                            WHERE 1=1';


        // Parcours du tableau contenant les cursus choisis et création de la liste de cursus à rechercher.
        if (isset($_POST['cursusRecherche']))
        {
            $listeCursus = '';

            foreach ($_POST['cursusRecherche'] as $cursus)
            {
              $listeCursus .= $cursus . ',';
            }

            $listeCursus = substr($listeCursus, 0, (strlen($listeCursus) -1));


            $requeteRecherche .= ' AND Utilisateurs.id IN (SELECT utilisateurs_id FROM cursus_utilisateurs_competences WHERE cursus_id IN (' . $listeCursus . '))';
        }



        // Parcours du tableau contenant les compétences choisis et création de la liste de compétences à rechercher.
        if (isset($_POST['competencesRecherche']))
        {
            $listeCompetences = ' (';
            foreach ($_POST['competencesRecherche'] as $competence)
            {
              $listeCompetences .= $competence . ',';
            }

            $listeCompetences = substr($listeCompetences, 0, (strlen($listeCompetences) -1));

            $requeteRecherche .= ' AND Utilisateurs.id IN (SELECT utilisateurs_id FROM utilisateurs_competences WHERE competences_id IN ' . $listeCompetences . '))';
        }


        // Nombre de mois d'expérience souhaitée.
        if ((isset($_POST['experienceRecherchee'])) AND ($_POST['experienceRecherchee'] <> ''))
        {
            $requeteRecherche .= ' AND Utilisateurs.id IN (SELECT utilisateurs_id FROM `experiences` group by utilisateurs_id having sum(dureeExperience) >= ' . $_POST['experienceRecherchee'] . ')';
        }


        //echo $requeteRecherche;

        $resultatRecherche = $bdd->query($requeteRecherche);



        // Récupération des cursus existant en BDD.
        $requeteCursus = 'SELECT distinct cursus_id, utilisateurs_id, Cursus.libelle_formation, annee 
                            FROM cursus_utilisateurs_competences JOIN Cursus ON Cursus.id = cursus_utilisateurs_competences.cursus_id order by annee';

        $resultatCursus = $bdd->query($requeteCursus);


        // Récupération des associations compétences/users.
        $requeteComp = 'SELECT utilisateurs_id, libelle_competence
                            FROM utilisateurs_competences JOIN Competences ON Competences.id = utilisateurs_competences.competences_id';
        $resultatComp = $bdd->query($requeteComp);


        // Récupération des associations experiences/users.
        $requeteExperience = 'SELECT utilisateurs_id, type_experience, description_experience, dureeExperience
                            FROM experiences';
        $resultatExp = $bdd->query($requeteExperience);


        if ($resultatRecherche == false)
            return $this->render('PortfolioBundle:Recherche:resultatrecherche.html.twig', array());
        else
            return $this->render('PortfolioBundle:Recherche:resultatrecherche.html.twig', 
                array('resultatRecherche' => $resultatRecherche->fetchAll(),
                    'resultatComp' => $resultatComp->fetchAll(),
                    'resultatExp' => $resultatExp->fetchAll(),
                    'resultatCursus' => $resultatCursus->fetchAll()));
        
        echo $requeteRecherche;
        
    }
}
