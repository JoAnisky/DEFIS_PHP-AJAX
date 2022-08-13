<?php

$DB_HOST= "localhost";
$DB_USER= "test_admin";
$DB_PASS= "1234!letsgo";
$DB_NAME= "CHAUSSURES";

try{
    // Initialise l'objet PDO avec les infos de connexion à la BDD
    $dbh = new PDO('mysql:dbname='.$DB_NAME.';host='.$DB_HOST, $DB_USER, $DB_PASS);
}catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
function verifyField($field){
    if(isset($field) && !empty($field)){
        return htmlspecialchars($field);
    }
}

// Récupération de tous les champs
$color = verifyField($_POST['color']);
$size = verifyField($_POST['size']);
$name = verifyField($_POST['nameShoes']);
$category= verifyField($_POST['category']);

// Requête insérer couleur
$requestColor = "INSERT INTO COULEUR (NOM) VALUES (:colorname)";

// Requête insérer categorie
$requestCategory = "INSERT INTO CATEGORIE (NOM) VALUES (:categoryname)";

// Requête insérer taille
$requestSize = "INSERT INTO TAILLE (TAILLE) VALUES (:sizename)";

// Requête insérer Produit
$requestProduct = "INSERT INTO CHAUSSURE (NOM, ID_CATEGORIE, ID_COULEUR, ID_TAILLE ) VALUES (:nameShoes, :id_category,:id_color,:id_size)";

// Last index
$requestId = "SELECT LAST_INSERT_ID()";

// Insérer couleur
$resColor = $dbh->prepare($requestColor);
$resColor->bindParam('colorname',$color, PDO::PARAM_STR);
$resColor->execute();

// Récupérer le dernier ID Couleur inséré
$resIdColor = $dbh->prepare($requestId);
$resIdColor->execute();
$idColor = $resIdColor->fetch();

// Insérer taille
$resSize = $dbh->prepare($requestSize);
$resSize->bindParam('sizename',$size, PDO::PARAM_INT);
$resSize->execute();
// Récupérer le dernier ID TAILLE inséré
$resIdSize = $dbh->prepare($requestId);
$resIdSize->execute();
$idSize = $resIdSize->fetch();

// Insérer catégorie
$resCategory = $dbh->prepare($requestCategory);
$resCategory->bindParam('categoryname',$category, PDO::PARAM_STR);
$resCategory->execute();
// Récupérer le dernier ID Catégorie inséré
$resIdCategory = $dbh->prepare($requestId);
$resIdCategory->execute();
$idCategory = $resIdCategory->fetch();

// Insérer produit
$resProduct = $dbh->prepare($requestProduct);
$resProduct->bindParam('nameShoes',$name, PDO::PARAM_STR);
$resProduct->bindParam('id_color',$idColor[0], PDO::PARAM_INT);
$resProduct->bindParam('id_size',$idSize[0], PDO::PARAM_INT);
$resProduct->bindParam('id_category',$idCategory[0], PDO::PARAM_INT);
$resProduct->execute();
$resProduct->debugDumpParams();