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
            $utilisateur->setDateInscription(new \DateTime(date("Y-m-d")));    

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


        $requeteCompetence = "SELECT utilisateurs.id AS id_utilisateur, competences.id AS id_competence, competences.libelle_competence,
            CASE 
                WHEN utilisateurs_competences.niveau_competence <=3 THEN CONCAT('Junior (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')  
                WHEN utilisateurs_competences.niveau_competence >= 3 AND niveau_competence <6 THEN CONCAT('Expérimenté (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')
                ELSE CONCAT('Expérimenté (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')        
            END AS niveau_competence,
            utilisateurs_competences.detail_competence, themes.libelle_theme, sous_themes.libelle_sous_theme, sous_sous_themes.libelle_sous_sous_theme, cursus.libelle_formation 
            FROM utilisateurs 
            LEFT JOIN utilisateurs_competences ON utilisateurs_competences.utilisateurs_id = utilisateurs.id 
            LEFT JOIN competences ON competences.id = utilisateurs_competences.competences_id 
            LEFT JOIN cursus_utilisateurs_competences ON cursus_utilisateurs_competences.competences_id = competences.id 
            LEFT JOIN cursus ON cursus.id = cursus_utilisateurs_competences.cursus_id
            LEFT JOIN matrice ON matrice.id = competences.matrice_comp_id
            LEFT JOIN themes ON themes.id = matrice.theme_matrice_id
            LEFT JOIN sous_themes ON sous_themes.id = matrice.s_theme_matrice_id
            LEFT JOIN sous_sous_themes ON sous_sous_themes.id = matrice.s_s_theme_matrice_id
            WHERE utilisateurs.id = ". $id
            . " AND utilisateurs_competences.utilisateurs_id = " . $id;


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
                                CASE cursus.libelle_formation WHEN NULL THEN \'\' ELSE CONCAT( \'Expérience effectuée au cours du cursus \' ,cursus.libelle_formation, \'.\')  END AS cursus_libelle
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
          return $this->render('PortfolioBundle:Profil:modificationProfil.html.twig', array('edit_form' => $form->createView(),'utilisateur' => $exp, 'competences' => $competences, 'cursus' => $cursus, 'experiences' => $experiences));
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

        $requeteCompetence = "SELECT utilisateurs.id AS id_utilisateur, competences.id AS id_competence, competences.libelle_competence, 

            utilisateurs_competences.detail_competence, themes.libelle_theme, sous_themes.libelle_sous_theme, 
            sous_sous_themes.libelle_sous_sous_theme, cursus.libelle_formation ,
            CASE 
                WHEN niveau_competence <= 3 THEN CONCAT('Junior (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')  
                WHEN niveau_competence >= 3 AND niveau_competence <6 THEN CONCAT('Expérimenté (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')
                ELSE CONCAT('Expérimenté (', utilisateurs_competences.niveau_competence, ' année(s) d''expérience)')        
            END AS niveau_competence
            FROM utilisateurs 
            LEFT JOIN utilisateurs_competences ON utilisateurs_competences.utilisateurs_id = utilisateurs.id 
            LEFT JOIN competences ON competences.id = utilisateurs_competences.competences_id 
            LEFT JOIN cursus_utilisateurs_competences ON cursus_utilisateurs_competences.competences_id = competences.id 
            LEFT JOIN cursus ON cursus.id = cursus_utilisateurs_competences.cursus_id
            LEFT JOIN matrice ON matrice.id = competences.matrice_comp_id
            LEFT JOIN themes ON themes.id = matrice.theme_matrice_id
            LEFT JOIN sous_themes ON sous_themes.id = matrice.s_theme_matrice_id
            LEFT JOIN sous_sous_themes ON sous_sous_themes.id = matrice.s_s_theme_matrice_id
            WHERE utilisateurs.id = ". $id
            . " AND cursus_utilisateurs_competences.utilisateurs_id = " . $id;

        $competences = $bdd->query($requeteCompetence);



        //Récupérer ses cursus
        $requeteCursus = 'SELECT distinct cursus.libelle_formation, cursus.description_formation, 
                            CASE cursus_utilisateurs_competences.diplome WHEN 0 THEN \'Non\' ELSE \'Oui\' END AS diplome,
                            cursus_utilisateurs_competences.annee
                            FROM cursus, cursus_utilisateurs_competences 
                            WHERE cursus_utilisateurs_competences.cursus_id = cursus.id
                            AND utilisateurs_id = ' . $id;
        $cursus = $bdd->query($requeteCursus);


        //Récupérer ses experiences 
        $requeteExperience = 'SELECT experiences.id, experiences.type_experience, experiences.description_experience, experiences.dureeExperience, 
                                CASE cursus.libelle_formation 
                                    WHEN NULL THEN \'\' 
                                    ELSE CONCAT( \'Expérience effectuée au cours du cursus \' ,cursus.libelle_formation, \'.\') 
                                END AS cursus_libelle
                                FROM experiences, utilisateurs, cursus
                                WHERE experiences.utilisateurs_id = utilisateurs.id
                                AND cursus.id = experiences.cursus_id
                                AND utilisateurs.id = ' . $id;
        $experiences = $bdd->query($requeteExperience);



        //Récupérer ses validations 
        $requeteValidations = "SELECT *,
                                    CASE WHEN types_utilisateur.libelle = 'ROLE_PROF' THEN 'Enseignant à l''UPJV'
                                        WHEN types_utilisateur.libelle =  'ROLE_RECRUTEUR' THEN 'Professionnel'
                                        WHEN types_utilisateur.libelle = 'ROLE_ELEVE' THEN 'Étudiant'
                                        ELSE 'Administrateur'
                                    END AS libelle_validant
                                    FROM validations 
                                    JOIN utilisateurs on idUtilisateurValidant = utilisateurs.id 
                                    JOIN types_utilisateur on types_utilisateur.id = utilisateurs.type_utilisateur_id
                                    where idUtilisateurValide = " . $id . "
                                    ORDER BY date_validation DESC";

        $validations = $bdd->query($requeteValidations);


        //Profils similaire

        //1. Similarité calculées en fonction des compétences
        $requete_similaire = "SELECT DISTINCT * FROM (  
                        
                                    SELECT  utilisateurs.id, 
                                            CONCAT(utilisateurs.prenom_utilisateur, ' ' , utilisateurs.nom_utilisateur) AS utilisateur,
                                            'Compétences en communs' AS similarite,
                                            utilisateurs.url_photo as photo
                                     FROM Utilisateurs
                                     WHERE id IN (
                                        SELECT utilisateurs_competences.utilisateurs_id FROM utilisateurs_competences WHERE utilisateurs_competences.competences_id IN
                                        (SELECT utilisateurs_competences.competences_id FROM utilisateurs_competences WHERE utilisateurs_competences.utilisateurs_id = " . $id . " ORDER BY utilisateurs_competences.niveau_competence DESC)
                                     )
                                     
                                    UNION
                                    
                                    SELECT  utilisateurs.id, 
                                            CONCAT(utilisateurs.prenom_utilisateur, ' ' , utilisateurs.nom_utilisateur) AS utilisateur,
                                            'Cursus en communs' AS similarite,
                                            utilisateurs.url_photo as photo
                                     FROM Utilisateurs
                                     WHERE id IN (
                                        SELECT cursus_utilisateurs_competences.utilisateurs_id FROM cursus_utilisateurs_competences WHERE cursus_utilisateurs_competences.cursus_id IN
                                        (SELECT cursus_utilisateurs_competences.cursus_id FROM cursus_utilisateurs_competences WHERE cursus_utilisateurs_competences.utilisateurs_id = " . $id . ")
                                        AND cursus_utilisateurs_competences.utilisateurs_id NOT IN (
                                            SELECT utilisateurs.id
                                            FROM Utilisateurs
                                            WHERE id IN (
                                                SELECT utilisateurs_competences.utilisateurs_id FROM utilisateurs_competences WHERE utilisateurs_competences.competences_id IN
                                                (SELECT utilisateurs_competences.competences_id FROM utilisateurs_competences WHERE utilisateurs_competences.utilisateurs_id = " . $id . " ORDER                                      BY utilisateurs_competences.niveau_competence DESC)
                                            )
                                         )
                                     )
                                     
                                    UNION
                                    
                                    SELECT  utilisateurs.id, 
                                            CONCAT(utilisateurs.prenom_utilisateur, ' ' , utilisateurs.nom_utilisateur) AS utilisateur,
                                            'Profil récent' AS similarite,
                                            utilisateurs.url_photo as photo
                                    FROM Utilisateurs
                                    WHERE id NOT IN (
                                        SELECT utilisateurs_competences.utilisateurs_id FROM utilisateurs_competences WHERE utilisateurs_competences.competences_id IN
                                        (SELECT utilisateurs_competences.competences_id FROM utilisateurs_competences WHERE utilisateurs_competences.utilisateurs_id = " . $id . " ORDER BY utilisateurs_competences.niveau_competence DESC)
                                            UNION
                                        SELECT cursus_utilisateurs_competences.utilisateurs_id FROM cursus_utilisateurs_competences WHERE cursus_utilisateurs_competences.cursus_id IN
                                        (SELECT cursus_utilisateurs_competences.cursus_id FROM cursus_utilisateurs_competences WHERE cursus_utilisateurs_competences.utilisateurs_id = " . $id . ")
                                    )
                                    
                                ) AS profil_similaire
                                WHERE id != " . $id . " ORDER BY profil_similaire.similarite ASC
                                LIMIT 6";

        $profils_similaires = $bdd->query($requete_similaire);

        if($profils_similaires->rowCount() == 0){
            //2. Similarité calculées en fonction des cursus

            //3. Aucune similarité, proposition de profils random
        }

        

        /////////////////////////////////////////////////////


        return $this->render('PortfolioBundle:Profil:profil.html.twig', array('validations' => $validations->fetchAll(), 'utilisateur' => $utilisateur, 'competences' => $competences, 'cursus' => $cursus , 'experiences' => $experiences, 'profils_similaires' => $profils_similaires));
    }


    public function competence_utilisateur_addAction()
    {
        $em = $this->getDoctrine()->getManager();
        $matrice = $em->getRepository('PortfolioBundle:Matrice')->select_distinct();
        return $this->render('PortfolioBundle:Profil:competence_utilisateur_add.html.twig', array('matrice' => $matrice));
    }



}
