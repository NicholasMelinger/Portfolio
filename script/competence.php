<?php
	echo "<select name='competence_id'>";
	if(isset($_POST["id_theme"],$_POST["id_s_theme"]) && $_POST["id_s_theme"] != -1){
		$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");

		$query_get_competence_id = "SELECT libelle_competence, id FROM Competences WHERE matrice_comp_id = (SELECT id FROM matrice WHERE theme_matrice_id = ".$_POST["id_theme"]." AND s_theme_matrice_id = ".$_POST["id_s_theme"]." AND s_s_theme_matrice_id = ".$_POST["id_s_s_theme"].");";

		$res = mysqli_query($link, $query_get_competence_id);
		echo "<option value='-1'>-- Choisir une compétence --</option>";
		while($row = mysqli_fetch_assoc($res)){
			echo "<option value='".$row["id"]."'>".$row["libelle_competence"]."</option>";
		}
	}
	else{
		echo "<option value='-1'>-- Choisir une compétence --</option>";
	}
	echo "</select>";

	echo "</br></br>" . $query_get_competence_id;
?>