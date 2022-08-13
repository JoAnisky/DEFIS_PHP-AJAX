<?php
    if(isset($_POST["taille"]) && isset($_POST["poids"])){
        $msgError = [
            "allEmpty" => "Merci de saisir votre taille et poids",
            "weightEmpty" => "Merci de saisir votre poids",
            "heightEmpty" => "Merci de saisir votre taille",
            "weightOrHeightNotANumber" => "Merci de saisir un nombre"
        ];
        $error = [
            "allEmpty" => 0,
            "heightEmpty" => 0,
            "heightNotNumeric" => 0,
            "weightEmpty" => 0,
            "weightNotNumeric" => 0
        ];
        $messageIMC = [
            "insuffisance pondérale",
            "poids normal",
            "surpoids",
            "obésité"
        ];
        $taille = $_POST["taille"];
        $poids = $_POST["poids"];
        if(empty($taille) && empty($poids)){
            $error["allEmpty"] = 1;
        }
        if(empty($taille) || empty($poids) || !is_numeric($taille) || !is_numeric($poids)){
            if(empty($taille)){
                $error["heightEmpty"] = 1;
            }else{
                if(!is_numeric($taille)){
                    $error["heightNotNumeric"] = 1;
                }}
            
            if(empty($poids)){
                $error["weightEmpty"] = 1;
            }else{
                if(!is_numeric($poids)){
                    $error["weightNotNumeric"] = 1;
                }
            }
            
        }else{
            $imc = round($poids / ($taille/100) ** 2, 2);
            if($imc < 18.5){
                $messageResultIMC = $messageIMC[0];
            }elseif($imc < 25){
                $messageResultIMC = $messageIMC[1];
            }elseif($imc < 30){
                $messageResultIMC = $messageIMC[2];
            }else{
                $messageResultIMC = $messageIMC[3];
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Consigne
                </div>
                <div class="card-body">
                    <h5 class="card-title">Script PHP</h5>
                    <p class="card-text"><img src="consigne..png" class="img-fluid" alt="Consigne"></p>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                Votre résultat s'affichera dans la zone ci-dessous
            </div>
            <?php
            if(isset($imc)){
            ?>
            <p id="imc">Votre imc est de :<span><?=$imc ?></span></p>
            <p id="message_imc"><?=$messageResultIMC ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
        <form class="row col-12" method="post" enctype="multipart/form-data" action="">
            <?php
             if(isset($error)){
                if($error["allEmpty"] === 1){
                    echo '<p class="alert alert-danger">'.$msgError["allEmpty"].'</p>';
                }
             }
            ?>
                <div class="col-12 m-2">
                    <?php
                        if(isset($error)){
                            if($error["heightEmpty"] === 1){
                                echo '<p class="text-danger">'.$msgError["heightEmpty"].'</p>';
                            }
                            if($error["heightNotNumeric"] === 1){
                                echo '<p class="text-danger">'.$msgError["weightOrHeightNotANumber"].'</p>';
                            }
                            if($error["weightEmpty"] === 1){
                                echo '<p class="text-danger">'.$msgError["weightEmpty"].'</p>';
                            }
                            if($error["weightNotNumeric"] === 1){
                                echo '<p class="text-danger">'.$msgError["weightOrHeightNotANumber"].'</p>';
                            }
                        }
                    ?>
                    <label for="poids" class="form-label">Votre poids</label>
                    <input type="text" class="form-control" id="poids" name="poids" placeholder="72 en kg" value="<?php
                    if(isset($poids) && $error["weightEmpty"]===0 && $error["weightNotNumeric"]===0){
                        echo $poids;
                    }
                    ?>">
                </div>
                <div class="col-12 m-2">
                    <label for="taille" class="form-label">Votre taille</label>
                    <input type="text" class="form-control" id="taille"  name="taille" placeholder="172 en cm" value="<?php
                    if(isset($taille) && $error["heightEmpty"]===0 && $error["heightNotNumeric"]===0){
                        echo $taille;
                    }
                    ?>">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary">Calculer</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
