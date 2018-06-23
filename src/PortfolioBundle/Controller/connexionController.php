<?php

namespace PortfolioBundle\Controller;
if(!isset($_SESSION)){
    session_start();
}

use App\Form\UtilisateurType;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \PDO;

class connexionController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioBundle:Default:index.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function connexionAction(Request $request)
    {
        return $this->render('PortfolioBundle:Default:connexion.html.twig');
    }

    public function deconnexionAction(Request $request)
    {
        session_destroy();

        header('Location: ' . $this->generateUrl('portfolio_homepage2'));

        exit;
    }

    public function connexionTraitementAction(Request $request)
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

        echo '<br><br><br>';    
        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare('SELECT id, password, username, type_utilisateur_id FROM utilisateurs WHERE username = :pseudo');
        $req->execute(array('pseudo' => $_POST['login']));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['password']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) 
            {
                //$_SESSION = array();
               
                //$_SESSION['id'] = $resultat['id'];
               // $_SESSION['login'] = $resultat["username"];
              // $_SESSION['connex'] = true;

               //$session = $this->get('session');
                //$session->set('filter', array('resultat' => 'id',));

           

                $session = $this->get('session');
                $session->set('userID', $resultat['id']);
                $session->set('userName', $resultat['username']);
                $session->set('userRole', $resultat['type_utilisateur_id']);
                sleep(3);

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

                //echo 'Connexion réussie. <a href="index">Retourner à l\'accueil.</a>';
            return $this->render('PortfolioBundle:Default:index.html.twig', array('utilisateurs' => $utilisateurs, 'resultatComp' => $resultatComp->fetchAll(), 'resultatCursus' => $resultatCursus->fetchAll()));
            }
                //

            else 
            {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
        

        return $this->render('PortfolioBundle:Default:connexion.html.twig');//, array('form' => $form->createView()));
    }
}
