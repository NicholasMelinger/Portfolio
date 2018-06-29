<?php
// fichier contenant les requetes suite au formulaire en ajax - permet d'inserer les données de ce formulaire où l'on veut en base

//cnx base
$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");


// récupération ID matrice selectionnée
$query = "SELECT id as matrice_id FROM matrice WHERE theme_matrice_id = ".$_POST["theme"]." AND s_theme_matrice_id = ".$_POST["s_theme"]." AND s_s_theme_matrice_id = ".$_POST["s_s_theme"]." LIMIT 1;";
$res1 = mysqli_query($link, $query);
$row1 = mysqli_fetch_assoc($res1);

//var_dump($row1);
//echo "</br>".$query;

$query2 = "SELECT COUNT(*) as count FROM Competences WHERE matrice_comp_id = ".$row1['matrice_id'] . " AND libelle_competence = '" . str_replace('\'','\'\'',$_POST["libelle"]) . "'";
$res2= mysqli_query($link, $query2);
$row2=mysqli_fetch_assoc($res2);

//var_dump($row2);
//echo "</br>".$query2;

if($row2['count'] == '0'){
	//ajout dans competences
	$query_new_competence = "INSERT INTO `competences`(`matrice_comp_id`, `libelle_competence`, `date_creation`, `date_maj`) VALUES (".$row1['matrice_id'].", '".str_replace('\'','\'\'',$_POST["libelle"])."', NOW(), NOW())";
	//echo "</br>". $query_new_competence;
	$res_new_competence= mysqli_query($link, $query_new_competence);

	//Select competence_id
	$query_get_competence_id ="SELECT id as competence_id FROM Competences WHERE matrice_comp_id = " . $row1['matrice_id'] . " AND libelle_competence = '" . str_replace('\'','\'\'',$_POST["libelle"]) . "' LIMIT 1";
	$res_get_competence_id = mysqli_query($link, $query_get_competence_id);

	//echo "</br>". $query_get_competence_id;

	$competence_id=mysqli_fetch_assoc($res_get_competence_id)['competence_id'];

	//Insert utilisateur_competence
	$query_insert_utilisateur_competence = "INSERT INTO `utilisateurs_competences`(`utilisateurs_id`, `competences_id`, `niveau_competence`, `detail_competence`) VALUES (".$_POST["id"].",".$competence_id.",".$_POST["niveau_comp"].", '" . str_replace('\'', '\'\'', $_POST["comment"]) . "')";

	//echo "</br>". $query_insert_utilisateur_competence;
	//echo "</br>".  $_POST["comment"];
	$res3 = mysqli_query($link, $query_insert_utilisateur_competence);
	//var_dump($_POST);
	if(isset($_POST["id"])){
		header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);
	}
	else{
		header('Location: http://localhost/portfolio/web/app_dev.php/index');
	}
}
else{
	header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);
}

?>