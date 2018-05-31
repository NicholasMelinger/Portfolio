<?php
// fichier contenant les requetes suite au formulaire en ajax - permet d'inserer les données de ce formulaire où l'on veut en base
if(isset($_POST["competence_id"]) && $_POST["competence_id"] != -1){
	//cnx base
	$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");

	//ajout dans alerte
	$query_insert_alerte = "INSERT INTO Alertes (commentaire, competence_id, date_creation_alerte, utilisateur_id, flag_actif) VALUES ('".$_POST["comment"]."', ".$_POST["competence_id"].", NOW(), ".$_POST["id"].", 1 );";

	$res2 = mysqli_query($link, $query_insert_alerte);
	//echo $query_insert_alerte;
	if(isset($_POST["id"])){
		header('Location: http://localhost/portfolio/web/app_dev.php/alertes/'.$_POST["id"]);
	}
	else{
		header('Location: http://localhost/portfolio/web/app_dev.php/index');
	}
}
else{
	echo "";
}

?>