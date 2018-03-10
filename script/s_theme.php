<?php
	echo "<select name='s_theme'>";
	if(isset($_POST["idTheme"])){
		$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");
		$query = "SELECT libelle_sous_theme, s_theme_matrice_id FROM sous_themes, matrice WHERE sous_themes.id = matrice.s_theme_matrice_id AND matrice.theme_matrice_id=".$_POST["idTheme"]." GROUP BY s_theme_matrice_id";
		$res = mysqli_query($link, $query);
		while($row = mysqli_fetch_assoc($res)){
			echo "<option value='".$row["s_theme_matrice_id"]."'>".$row["libelle_sous_theme"]."</option>";
		}
	}
	echo "</select>";
?>