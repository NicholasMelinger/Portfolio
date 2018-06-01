<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

echo "</br>".$target_file;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "</br>"."File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "</br>"."File is not an image.";
        $uploadOk = 0;
    }
}
echo "</br>" . $uploadOk;
//header('Location: http://localhost/portfolio/web/app_dev.php/modification_profil/'.$_POST["id"]);

?>