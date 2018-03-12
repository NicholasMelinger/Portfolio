<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\Utilisateurs\UtilisateursType;
use PortfolioBundle\Form\Utilisateurs\EditUtilisateursType;
use PortfolioBundle\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \PDO;

class ProfilController extends Controller
{
    public function profilIndexAction()
    {
        return $this->render('PortfolioBundle:Profil:test.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function creationProfilAction(Request $request)
    {
        //, UserPasswordEncoderInterface $passwordEncoder
        // 1) build the form
        $utilisateur = new Utilisateurs();
        $form = $this->createForm(UtilisateursType::class, $utilisateur);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $passwordEncoder = $this->get('security.password_encoder');
            //$password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
            //$password = $passwordEncoder->encodePassword($utilisateur, $utilisateur->getPlainPassword());
            $password = password_hash($utilisateur->getPlainPassword(), PASSWORD_DEFAULT);
            $utilisateur->setPassword($password);
            $utilisateur->setDateInscription(new \DateTime(date("d-m-y")));    

            $utilisateur->setUrlPhoto('img/default.jpg');

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->render('PortfolioBundle:Default:connexion.html.twig');
        }

        return $this->render('PortfolioBundle:Profil:creationProfil.html.twig', array(
          'form' => $form->createView(),
        ));

        //return $this->render('PortfolioBundle:Default:index.html.twig');
    }


    public function modificationProfilAction($id, Request $request)
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



        $em = $this->getDoctrine()->getManager();
        $exp = $em->getRepository('PortfolioBundle:Utilisateurs')->find($id);


        $requeteCompetence = 'SELECT utilisateurs.id AS id_utilisateur, competences.id AS id_competence, competences.libelle_competence, utilisateurs_competences.niveau_competence, utilisateurs_competences.detail_competence, themes.libelle_theme, sous_themes.libelle_sous_theme, sous_sous_themes.libelle_sous_sous_theme, cursus.libelle_formation 
            FROM utilisateurs 
            LEFT JOIN utilisateurs_competences ON utilisateurs_competences.utilisateurs_id = utilisateurs.id 
            LEFT JOIN competences ON competences.id = utilisateurs_competences.competences_id 
            LEFT JOIN cursus_utilisateurs_competences ON cursus_utilisateurs_competences.competences_id = competences.id 
            LEFT JOIN cursus ON cursus.id = cursus_utilisateurs_competences.cursus_id
            LEFT JOIN matrice ON matrice.id = competences.matrice_comp_id
            LEFT JOIN themes ON themes.id = matrice.theme_matrice_id
            LEFT JOIN sous_themes ON sous_themes.id = matrice.s_theme_matrice_id
            LEFT JOIN sous_sous_themes ON sous_sous_themes.id = matrice.s_s_theme_matrice_id
            WHERE utilisateurs.id = '. $id;


        $competences = $bdd->query($requeteCompetence);



        //Récupérer ses cursus
        $requeteCursus = 'SELECT cursus.libelle_formation, cursus.description_formation, 
                            CASE cursus_utilisateurs_competences.diplome WHEN 0 THEN \'Non\' ELSE \'Oui\' END AS diplome,
                            cursus_utilisateurs_competences.annee
                            FROM cursus, cursus_utilisateurs_competences 
                            WHERE cursus_utilisateurs_competences.cursus_id = cursus.id
                            AND utilisateurs_id = ' . $id;
        $cursus = $bdd->query($requeteCursus);


        //Récupérer ses experiences 
        $requeteExperience = 'SELECT experiences.type_experience, experiences.description_experience, experiences.dureeExperience, 
                                CASE cursus.libelle_formation WHEN NULL THEN \'\' ELSE CONCAT( \'Expérience effectués au cours du cursus \' ,cursus.libelle_formation )  END AS cursus_libelle
                                FROM experiences, utilisateurs, cursus
                                WHERE experiences.utilisateurs_id = utilisateurs.id
                                AND cursus.id = experiences.cursus_id
                                AND utilisateurs.id = ' . $id;
        $experiences = $bdd->query($requeteExperience);



        if (null === $exp) {
          throw new NotFoundHttpException("L'utilisateur ".$id." n'existe pas.");
        }
        $form = $this->createForm(EditUtilisateursType::class, $exp, array('action' =>  $this->generateUrl('modification_profil', array('id' => $exp->getId()))));
        $form->handleRequest($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->flush();
          return $this->redirectToRoute('portfolio_homepage');
        }

        

        return $this->render('PortfolioBundle:Profil:modificationProfil.html.twig', array('edit_form' => $form->createView(),'utilisateur' => $exp, 'competences' => $competences, 'cursus' => $cursus, 'experiences' => $experiences));
    }

    public function profilAction($id)
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


        //Récupérer l'utilisateur
        $repository = $this
              ->getDoctrine()
              ->getManager()
              ->getRepository('PortfolioBundle:Utilisateurs')
            ;

        $utilisateur = $repository->find($id);


        //Récupérer ses compétences
        //$competences = $utilisateur->getUserCompetences();

        $requeteCompetence = 'SELECT utilisateurs.id AS id_utilisateur, competences.id AS id_competence, competences.libelle_competence, utilisateurs_competences.niveau_competence, utilisateurs_competences.detail_competence, themes.libelle_theme, sous_themes.libelle_sous_theme, sous_sous_themes.libelle_sous_sous_theme, cursus.libelle_formation 
            FROM utilisateurs 
            LEFT JOIN utilisateurs_competences ON utilisateurs_competences.utilisateurs_id = utilisateurs.id 
            LEFT JOIN competences ON competences.id = utilisateurs_competences.competences_id 
            LEFT JOIN cursus_utilisateurs_competences ON cursus_utilisateurs_competences.competences_id = competences.id 
            LEFT JOIN cursus ON cursus.id = cursus_utilisateurs_competences.cursus_id
            LEFT JOIN matrice ON matrice.id = competences.matrice_comp_id
            LEFT JOIN themes ON themes.id = matrice.theme_matrice_id
            LEFT JOIN sous_themes ON sous_themes.id = matrice.s_theme_matrice_id
            LEFT JOIN sous_sous_themes ON sous_sous_themes.id = matrice.s_s_theme_matrice_id
            WHERE utilisateurs.id = '. $id;
            echo $requeteCompetence;

        $competences = $bdd->query($requeteCompetence);



        //Récupérer ses cursus
        $requeteCursus = 'SELECT cursus.libelle_formation, cursus.description_formation, 
                            CASE cursus_utilisateurs_competences.diplome WHEN 0 THEN \'Non\' ELSE \'Oui\' END AS diplome,
                            cursus_utilisateurs_competences.annee
                            FROM cursus, cursus_utilisateurs_competences 
                            WHERE cursus_utilisateurs_competences.cursus_id = cursus.id
                            AND utilisateurs_id = ' . $id;
        $cursus = $bdd->query($requeteCursus);


        //Récupérer ses experiences 
        $requeteExperience = 'SELECT experiences.type_experience, experiences.description_experience, experiences.dureeExperience, 
                                CASE cursus.libelle_formation WHEN NULL THEN \'\' ELSE CONCAT( \'Expérience effectués au cours du cursus \' ,cursus.libelle_formation )  END AS cursus_libelle
                                FROM experiences, utilisateurs, cursus
                                WHERE experiences.utilisateurs_id = utilisateurs.id
                                AND cursus.id = experiences.cursus_id
                                AND utilisateurs.id = ' . $id;
        $experiences = $bdd->query($requeteExperience);



        return $this->render('PortfolioBundle:Profil:profil.html.twig', array('utilisateur' => $utilisateur, 'competences' => $competences, 'cursus' => $cursus , 'experiences' => $experiences));
    }

}
