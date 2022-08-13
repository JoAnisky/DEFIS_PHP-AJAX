<?php

$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["userFile"]["name"]);
$uploadOk = 1;
$messageStatus = "";

if(isset($_POST["submit"])) {
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

if ($uploadOk == 0) {
    $messageStatus = "Désolé votre fichier n'a pas été téléchargé";
    header('errorMsg:'.$messageStatus);

}else{
    if (move_uploaded_file($_FILES["userFile"]["tmp_name"], $target_file)) {
        $messageStatus = "Le fichier ". htmlspecialchars( basename( $_FILES["userFile"]["name"])). " a bien été déplacé.";

        header('errorMsg:'.$messageStatus);
    }else{
        $messageStatus = "Désolé, il y a eu une erreur lors de l'upload  sur le serveur";

        header('errorMsg:'.$messageStatus);    
    }
}