<?php

namespace PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PortfolioBundle\Entity\Alertes;
use PortfolioBundle\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use PortfolioBundle\Form\Alertes\AlertesType;
use \PDO;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlertesController extends Controller
{
    public function alertes_defautAction($id)
    {
    	// Connexion à la BDD.
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', 'root', '');
            $em = $this->getDoctrine()->getManager();
        	$user = $em->getRepository('PortfolioBundle:Utilisateurs')->find($id);


            if (null === $user) {
          		throw new NotFoundHttpException("L'utilisateur ".$id." n'existe pas.");
        	}

            $requeteAlertes = 	"SELECT alertes.id, competences.libelle_competence,themes.libelle_theme, sous_themes.libelle_sous_theme, 
            					sous_sous_themes.libelle_sous_sous_theme, alertes.commentaire, DATE_FORMAT(alertes.date_creation_alerte, '%d/%m/%y') AS date_creation_alerte, 
            					CASE Alertes.flag_actif WHEN 1 THEN 'Oui' ELSE 'Non' END AS actif
								FROM alertes
								LEFT JOIN competences ON competences.id = alertes.competence_id
								LEFT JOIN matrice ON matrice.id = competences.matrice_comp_id
								LEFT JOIN themes ON themes.id = matrice.theme_matrice_id
								LEFT JOIN sous_themes ON sous_themes.id = matrice.s_theme_matrice_id
								LEFT JOIN sous_sous_themes ON sous_sous_themes.id = matrice.s_s_theme_matrice_id
								WHERE alertes.utilisateur_id = " . $id;

			$alertes = $bdd->query($requeteAlertes);

			return $this->render('PortfolioBundle:Alertes:alertes.html.twig', array('alertes' => $alertes));
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout.
            die('Erreur : '.$e->getMessage());
        }
    }


    public function alerte_addAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$matrice = $em->getRepository('PortfolioBundle:Matrice')->select_distinct();
        return $this->render('PortfolioBundle:Alertes:alertes_add.html.twig', array('matrice' => $matrice));
    }
    
    public function alerte_supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $alerte = $em->getRepository('PortfolioBundle:Alertes')->find($id);
        if (null === $alerte) {
          throw new NotFoundHttpException("L'alerte ".$id." n'existe pas.");
        }
        $em->remove($alerte);
        $em->flush();

        $user_id = $this->get('session')->get('userID');

        return $this->redirectToRoute('alertes_defaut', array('id' => $user_id));
    }

    
    public function acti_desac_alerteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $alerte = $em->getRepository('PortfolioBundle:Alertes')->find($id);
        if (null === $alerte) {
          throw new NotFoundHttpException("L'alerte ".$id." n'existe pas.");
        }
        
        $flag_actif = $alerte->getFlagActif();
        if($flag_actif == 1){
        	$alerte->setFlagActif(0);
        }
        else{
        	$alerte->setFlagActif(1);
        }
        
        $em->persist($alerte);
        $em->flush();

        $user_id = $this->get('session')->get('userID');

        return $this->redirectToRoute('alertes_defaut', array('id' => $user_id));
    }

    public function send_alerteAction($competence_id)
    {
    	// Connexion à la BDD.
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', 'root', '');

            $em = $this->getDoctrine()->getManager();

            $profil_user_id = $this->get('session')->get('userID');
        	$profil_user = $em->getRepository('PortfolioBundle:Utilisateurs')->find($profil_user_id);


            if (null === $profil_user) {
          		throw new NotFoundHttpException("L'utilisateur ".$profil_user_id." n'existe pas.");
        	}

            $query = 	"SELECT utilisateurs.mail_utilisateur, competences.libelle_competence, alertes.commentaire
						FROM alertes, utilisateurs, competences
						WHERE alertes.utilisateur_id = utilisateurs.id
						AND alertes.competence_id = competences.id
						AND flag_actif = 1
						AND competence_id =" . $competence_id;

			$res = $bdd->query($query);

			//Parcours des alertes à envoyer
			foreach($res as $row){
				//Initialisation du body
				$body = "hello";

		 		$message = \Swift_Message::newInstance()
		        ->setSubject('[Alerte Portfolio UPJV] Ce profil est susceptible de vous intéresser')
		        ->setFrom('send@example.com')
		        ->setTo($row['mail_utilisateur'])
		        ->setBody($this->renderView(
	                'PortfolioBundle:Alertes:mail_alerte.html.twig',
	                array('libelle_competence' => $row['libelle_competence'], 'user_id' => $profil_user_id, 'commentaire' => $row['commentaire'])
	            )
		        ,'text/html');
		    
		    	$this->get('mailer')->send($message);
			}

			return $this->redirectToRoute('portfolio_homepage2');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout.
            die('Erreur : '.$e->getMessage());
        }




    	
    }
}