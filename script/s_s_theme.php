<?php
	echo "<select name='s_s_theme'>";
	if(isset($_POST["id_s_theme"])){
		$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");
		$query = "SELECT libelle_sous_sous_theme, s_s_theme_matrice_id FROM sous_sous_themes, matrice WHERE sous_sous_themes.id = matrice.s_s_theme_matrice_id AND matrice.s_theme_matrice_id=".$_POST["id_s_theme"];
		$res = mysqli_query($link, $query);
		while($row = mysqli_fetch_assoc($res)){
			echo "<option value='".$row["s_s_theme_matrice_id"]."'>".$row["libelle_sous_sous_theme"]."</option>";
		}
	}
	echo "</select>";
?>