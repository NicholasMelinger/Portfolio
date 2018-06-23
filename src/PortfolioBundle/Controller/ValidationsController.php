<?php

namespace PortfolioBundle\Controller;
    
use App\Form\UtilisateurType;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \PDO;
use \fpdf;

class ValidationsController extends Controller
{
    public function indexAction()
    {
        $idUserValide = $_GET['idUser'];
        $idCompetenceValidee = $_GET['idComp'];


        return $this->render('PortfolioBundle:Validations:ajoutValidation.html.twig',
            array('idUserValide' => $idUserValide, 'idCompetenceValidee' => $idCompetenceValidee));
    }

public function exportCVAction()
{
    require('fpdf/fpdf.php');
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout.
            die('Erreur : '.$e->getMessage());
    }



    $pdf = new FPDF();
    $idUser = 2;//$_GET['id'];

    $pdf->AddPage();

    $requeteUtilisateur = "SELECT * FROM utilisateurs WHERE id = " . $idUser . "";
    $utilisateurs = $bdd->query($requeteUtilisateur)->fetchAll();



foreach ($utilisateurs as &$user) 
{
    $pdf->Cell(35);
    $pdf->SetFont('Arial','B',20);
    $pdf->SetFillColor(20,37,89);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(120,10,"" . $user['prenom_utilisateur'] . " " . $user['nom_utilisateur'],1,1,'C', true);

    if ($user['url_photo'] <> NULL)
       $pdf->Image($user['url_photo'],10,10,30,30);

    $pdf->Ln(4);
    $pdf->SetFont('Arial','',11);
    $pdf->SetTextColor(50,50,50);
    $pdf->Cell(40);


    if ($user['date_naissance'] <> NULL)
    {
        $arr1 = explode('-', $user['date_naissance']);
        $arr2 = explode('-', date('Y-m-d'));
            
        if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
        {
            $age = $arr2[0] - $arr1[0];
        }
        else
        {
            $age = $arr2[0] - $arr1[0] - 1;
        }

        $pdf->Cell(110,8,$user['adresse_postale'] . " - " . $user['ville'] . " (" . $user['code_postal'] . ") - " . $age . " ans",0,1,'C');
    }
    else
        $pdf->Cell(110,8,$user['adresse_postale'] . " - " . $user['ville'] . " (" . $user['code_postal'] . ")",0,1,'C');


    $pdf->Cell(40);
    $pdf->Cell(110,8,$user['mail_utilisateur'] . " - " . $user['numero_mobile'],0,1,'C');
    $pdf->Cell(40);

    $pdf->Ln(15);
    $pdf->SetFont('Arial','B',14);
    // Background color
    $pdf->SetFillColor(20,37,89);
    // Title
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(187,8,"Cursus",1,1,'C',true);
    

    $requeteFormationUser = "SELECT distinct libelle_formation, annee FROM 
    cursus_utilisateurs_competences JOIN cursus on cursus.id = cursus_utilisateurs_competences.cursus_id 
    WHERE utilisateurs_id = " .$idUser. " order by annee desc";


    $formations = $bdd->query($requeteFormationUser)->fetchAll();
    //echo $requeteFormationUser;
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(50,50,50);
    foreach ($formations as &$forma)
    {
        $pdf->Cell(0,10, utf8_decode('- ' . $forma['libelle_formation']) . ' (' . $forma['annee']. ')',0,1);
    }

    $pdf->SetFont('Arial','B',14);
    // Background color
    $pdf->SetFillColor(20,37,89);


    $pdf->Ln(10);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(187,8,utf8_decode("Compétences"),1,1,'C',true);
    $pdf->SetTextColor(50,50,50);

    $requeteCompetences = "SELECT * FROM utilisateurs_competences JOIN competences on competences.id = utilisateurs_competences.competences_id WHERE utilisateurs_competences.utilisateurs_id = " . $idUser . "";
    //echo $requeteCompetences;
    $competences = $bdd->query($requeteCompetences)->fetchAll();

    

    foreach ($competences as &$comp)
    {
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,10, utf8_decode("- " . $comp['libelle_competence']),0,1);

        // recherche des validations sur la competence
        $validationsCompetence = "SELECT * FROM validations join utilisateurs on utilisateurs.id = validations.idUtilisateurValidant join types_utilisateur on types_utilisateur.id = utilisateurs.type_utilisateur_id WHERE idCompetenceValidee = " . $comp['id'] . " AND idUtilisateurValide = " . $idUser . " AND type_valid ='comp'";
        //echo $validationsCompetence;
        $validCompetences = $bdd->query($validationsCompetence)->fetchAll();

        
        foreach ($validCompetences as &$validComp)
        {
            $pdf->Cell(10);
            $pdf->SetFont('Arial','BI',10);
            $date = strtotime($validComp['date_validation']);
            $date = date('d/m/Y', $date);
            $pdf->MultiCell(0,5, utf8_decode("Commenté par " . $validComp['nom_utilisateur'] . " " . $validComp['prenom_utilisateur'] . " (" . $validComp['libelle'] . ") le " . $date . " :"),0,1);
            
            $pdf->SetFont('Arial','I',10);
            $pdf->Cell(10);
            $pdf->MultiCell(0,5, utf8_decode($validComp['commentaire']),0,1);

            $pdf->Ln(6);
        }


    }

    $pdf->Ln(2);
    $pdf->SetFont('Arial','B',14);
    $pdf->SetFillColor(20,37,89);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(187,8,utf8_decode("Expériences"),1,1,'C',true);
    $pdf->SetTextColor(50,50,50);
    $pdf->SetFont('Arial','',12);
    $requeteCompetences = "SELECT experiences.id as idExp, libelle_formation, cursus_id, type_experience, description_experience, dureeExperience FROM experiences left join cursus on cursus.id = experiences.cursus_id WHERE utilisateurs_id = " . $idUser . "";
    //echo $requeteCompetences;
    $experiences = $bdd->query($requeteCompetences)->fetchAll();

    foreach ($experiences as &$exp)
    {
        $pdf->SetFont('Arial','B',12);

        if ($exp['cursus_id'] <> NULL)
        {
            $libelleExperience = utf8_decode('- ' . $exp['type_experience'] . ' (' . $exp['dureeExperience'] . ' mois - expérience réalisée dans le cadre du cursus ' . $exp['libelle_formation'] . ').');
        }
        else
        {
            $libelleExperience = utf8_decode('- ' . $exp['type_experience'] . ' (' . $exp['dureeExperience'] . ' mois).');
        }

        $pdf->Cell(170,8, $libelleExperience);
        $pdf->Ln(8);

        $pdf->SetFont('Arial','',12);
        $pdf->multiCell(170, 8, utf8_decode($exp['description_experience']));
        



        $pdf->Ln(6);

        $validationsExperience = "SELECT * FROM validations join utilisateurs on utilisateurs.id = validations.idUtilisateurValidant join types_utilisateur on types_utilisateur.id = utilisateurs.type_utilisateur_id WHERE idCompetenceValidee = " . $exp['idExp'] . " AND idUtilisateurValide = " . $idUser . " AND type_valid ='exp'";
        $validExperiences = $bdd->query($validationsExperience)->fetchAll();

        foreach ($validExperiences as &$validExp)
        {
            $pdf->Cell(10);
            $pdf->SetFont('Arial','BI',10);
            $date = strtotime($validExp['date_validation']);
            $date = date('d/m/Y', $date);
            $pdf->MultiCell(0,5, utf8_decode("Commenté par " . $validExp['nom_utilisateur'] . " " . $validExp['prenom_utilisateur'] . " (" . $validExp['libelle'] . ") le " . $date . " : "),0,1);
            
            $pdf->SetFont('Arial','I',10);
            $pdf->Cell(10);
            $pdf->MultiCell(0,5, utf8_decode($validExp['commentaire']),0,1);

            $pdf->Ln(6);
        }

    }

}

    $pdf->Output();

    exit;
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
