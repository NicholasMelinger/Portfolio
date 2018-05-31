<?php
	echo "<select name='s_theme'>";
	if(isset($_POST["idTheme"]) && $_POST["idTheme"] != -1){
		$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");
		$query = "SELECT libelle_sous_theme, s_theme_matrice_id FROM sous_themes, matrice WHERE sous_themes.id = matrice.s_theme_matrice_id AND matrice.theme_matrice_id=".$_POST["idTheme"]." GROUP BY s_theme_matrice_id";
		$res = mysqli_query($link, $query);
		echo "<option value='-1'>-- Choisir un sous thème --</option>";
		while($row = mysqli_fetch_assoc($res)){
			echo "<option value='".$row["s_theme_matrice_id"]."'>".$row["libelle_sous_theme"]."</option>";
		}
	}
	else{
		echo "<option value='-1'>-- Choisir un sous thème --</option>";
	}
	echo "</select>";
?>