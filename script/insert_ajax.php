<?php
// fichier contenant les requetes suite au formulaire en ajax - permet d'inserer les données de ce formulaire où l'on veut en base

//cnx base
$link = mysqli_connect("localhost","db_portfolio","db_portfolio", "db_portfolio");

// récupération ID matrice selectionnée
$query = "SELECT id FROM matrice WHERE theme_matrice_id = ".$_POST["theme"]." AND s_theme_matrice_id = ".$_POST["s_theme"]." AND s_s_theme_matrice_id = ".$_POST["s_s_theme"].";";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($res); 


//ajout dans competences
$query2 = "INSERT INTO competences VALUES (NULL, NULL, '".$_POST["libelle"]."', '".date("Y/m/d")."', NULL, NULL, '".$row["id"]."');";
$res2 = mysqli_query($link, $query2);

//ajout dans competences_utilisateur
$query_ter = "select id from competences order by id desc limit 1;";
$res3 = mysqli_query($link, $query_ter);
$row2 = mysqli_fetch_assoc($res3); 
$query3 = "INSERT INTO utilisateurs_competences VALUES (NULL,'".$_POST["id"]."', '".$row2["id"]."', NULL, 'A definir', 'A definir');";
$res4 = mysqli_query($link, $query3);
header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);
?>