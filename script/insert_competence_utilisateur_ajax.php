<?php
//var_dump($_POST);
//echo "</br>";
// fichier contenant les requetes suite au formulaire en ajax - permet d'inserer les données de ce formulaire où l'on veut en base
if(isset($_POST["competence_id"]) && $_POST["competence_id"] != -1){
	//cnx base
	$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");
	$query = "SELECT COUNT(*) as count FROM utilisateurs_competences WHERE utilisateurs_id = ".$_POST["id"]." AND competences_id = ".$_POST["competence_id"];
	//echo $query;
	$res= mysqli_query($link, $query);
	if(mysqli_fetch_assoc($res)['count'] == '0'){
		$query = "INSERT INTO `utilisateurs_competences`(`utilisateurs_id`, `competences_id`, `niveau_competence`, `detail_competence`) VALUES (".$_POST["id"].",".$_POST["competence_id"].",".$_POST["niveau_comp"].",'".str_replace('\'','\'\'',$_POST["comment"])."')";
		$res2 = mysqli_query($link, $query);
		//echo $query;
		if(isset($_POST["id"])){
			header('Location: http://localhost/portfolio/web/app_dev.php/send_alerte/'.$_POST["competence_id"]);
			//header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);
		}
		else{
			header('Location: http://localhost/portfolio/web/app_dev.php/index');
		}
	}
	else{
		header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);
	}
	
}
else{
	echo "";
}

?>