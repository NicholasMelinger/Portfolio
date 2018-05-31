<?php

require('fpdf.php');
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout.
        die('Erreur : '.$e->getMessage());
}


$idUser = 3;
$pdf = new FPDF();


$pdf->AddPage();

$requeteUtilisateur = "SELECT * FROM utilisateurs WHERE id = " . $idUser . "";
$utilisateurs = $bdd->query($requeteUtilisateur)->fetchAll();



foreach ($utilisateurs as &$user) 
{
	$pdf->Cell(35);
	$pdf->SetFont('Arial','B',20);

	$pdf->Cell(120,10,"" . $user['prenom_utilisateur'] . " " . $user['nom_utilisateur'],1,0,'C');
	$pdf->Image($user['url_photo'],10,10,30,30);
	$pdf->Ln(12);
	$pdf->SetFont('Arial','',12);

$pdf->Cell(40);
	$pdf->Cell(110,8,$user['mail_utilisateur'] . " - " . $user['numero_mobile'],1,1,'C');
	$pdf->Cell(40);
$pdf->Cell(110,8,$user['adresse_postale'] . " - " . $user['ville'] . " (" . $user['code_postal'] . ")",1,1,'C');


	$pdf->Ln(15);
	$pdf->SetFont('Arial','',15);
    // Background color
    $pdf->SetFillColor(200,220,255);
    // Title
    $libelleFormations = 
    $pdf->Cell(170,8,"Cursus",1,1,'B',true);
    

    $requeteFormationUser = "SELECT * FROM cursus_utilisateurs_competences JOIN cursus on cursus.id = cursus_utilisateurs_competences.cursus_id WHERE utilisateurs_id = " .$idUser. " order by annee desc";
    $formations = $bdd->query($requeteFormationUser)->fetchAll();
	//echo $requeteFormationUser;
    $pdf->SetFont('Arial','',12);

    foreach ($formations as &$forma)
    {
		$pdf->Cell(0,10, utf8_decode($forma['libelle_formation']) . ' (' . $forma['annee']. ')',0,1);
    }

    $pdf->SetFont('Arial','',15);
    // Background color
    $pdf->SetFillColor(200,220,255);


    $pdf->Ln(15);
    $pdf->Cell(170,8,utf8_decode("Compétences"),1,1,'L',true);

    $requeteCompetences = "SELECT * FROM utilisateurs_competences JOIN competences on competences.id = utilisateurs_competences.competences_id WHERE utilisateurs_competences.utilisateurs_id = " . $idUser . "";
	//echo $requeteCompetences;
	$competences = $bdd->query($requeteCompetences)->fetchAll();

	$pdf->SetFont('Arial','',12);

    foreach ($competences as &$comp)
    {
		$pdf->Cell(0,10, utf8_decode("- " . $comp['libelle_competence']),0,1);

		// recherche des validations sur la competence
		$validationsCompetence = "SELECT * FROM validations join utilisateurs on utilisateurs.id = validations.idUtilisateurValidant join types_utilisateur on types_utilisateur.id = utilisateurs.type_utilisateur_id WHERE idCompetenceValidee = " . $comp['id'] . " AND idUtilisateurValide = " . $idUser . " AND type_valid ='comp'";
    	//echo $validationsCompetence;
    	$validCompetences = $bdd->query($validationsCompetence)->fetchAll();

    	foreach ($validCompetences as &$validComp)
    	{
    		$pdf->Cell(10);
    		$pdf->MultiCell(0,5, utf8_decode("Validé par " . $validComp['nom_utilisateur'] . " " . $validComp['prenom_utilisateur'] . " (" . $validComp['libelle'] . ") le " . $validComp['date_validation'] . " : " . $validComp['commentaire']),0,1);
    	}

    	$pdf->Ln(8);
    }
}

	$pdf->Output();

?>