<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/list-promotion.css">
    <link rel="stylesheet" href="css/list-presence.css">
    <link rel="stylesheet" href="css/list-apprenant.css">
    <link rel="stylesheet" href="css/popup-nouvel-apprenant.css">
    <link rel="stylesheet" href="css/list-referentiel.css">
    <script src="https://kit.fontawesome.com/f7ac8a8e2c.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php

        include '../config/bootstrap.php';
        include "../models/promotion.model.php";
        $promotions = getPromotion();
        session_start();
        $_SESSION["activeSession"] = isset($_SESSION['activeSession']) ? $_SESSION['activeSession'] : null;
        if($_SESSION["activeSession"] == null){
            foreach($promotions as $p){
                if($p["state"] == true){
                    $_SESSION["activeSession"] = $p["id"];
                    break;
                }
            }
        }
        $activeNumberPromo = $_SESSION["activeSession"];

        $libEmptyOrNull = false;
        $descEmptyOrNull = false;
        $refAlreadyExists = false;
        $emptyEmail = false;
        $emptyPassword = false;
        $goodCredentials = true;
        $emailIsValide = true;

        if(!isset($_POST["layout"])){
            include "../templates/login.html.php";  
        }else if($_POST["layout"] == 'list-presence'){
            include("../models/presence.model.php");
            $_SESSION["status"] = isset($_SESSION['status']) ? $_SESSION['status'] :  'status';
            $_SESSION["ref"] = isset($_SESSION['ref']) ? $_SESSION['ref'] : 'referentiel';
            $_SESSION["date"] = isset($_SESSION['date']) ? $_SESSION['date'] : 'date';
            if(isset($_POST["status"])){
                $_SESSION["status"] = $_POST['status'];
            } 
            if(isset($_POST["status"])){
                $_SESSION["ref"] = $_POST['referentiel'];
            }
            if(isset($_POST["date"])){
                $_SESSION["date"] = $_POST['date'];
            }
            $presences = filterPresence($_SESSION["status"], $_SESSION["ref"], $_SESSION["date"]);
            include("../templates/partial/layout.html.php");
        }else if($_POST["layout"] == 'list-apprenant'){
            include("../models/apprenant.model.php");
            if(isset($_POST["global_search"])){   
                $apprenants = getApprenant();
                $value = $_POST["global_search"];
                $apprenants = globalSearchHeader($value, $apprenants);
                include("../templates/partial/layout.html.php");
            }else{
                $apprenants = getApprenant();
                include("../templates/partial/layout.html.php");
            }
        }else if($_POST["layout"] == 'list-referentiel'){
            include("../models/referentiel.model.php");
            $referentiels = getReferentiel();
            if(isset($_POST["global_search"])){ 
                $value = $_POST["global_search"];
                $referentiels = globalSearchHeader($value, $referentiels);
                include("../templates/partial/layout.html.php");
            }else if(isset($_POST["new-referentiel"])){
                $state_ref = $_POST["status_hidden"];
                $libelle = trim($_POST["libelle"]);
                $description = trim($_POST["description"]);
                $selectedImage = "";
                // Vérification si un fichier image a été téléchargé
                if(!empty($_FILES["image"]["name"])) {
                    $selectedImage = $_FILES["image"]["name"];
                }
                if(empty($libelle) && empty($description)){
                    $libEmptyOrNull = true;
                    $descEmptyOrNull = true;
                }else{
                    if(!empty($libelle) && empty($description)){
                        $libEmptyOrNull = false;
                        $descEmptyOrNull = true;
                    }
                    
                    if(empty($libelle) && !empty($description)){
                        $libEmptyOrNull = true;
                        $descEmptyOrNull = false;
                    }
                }
                foreach($referentiels as $ref){
                    if(strtolower($ref["libelle"]) == strtolower($libelle) && (int)$state_ref==1){
                        $refAlreadyExists = true;
                        break;
                    }
                }
                if(!$refAlreadyExists && !empty($libelle) && !empty($description)){
                    if((int)$state_ref == 0){
                        saveReferentiel($state_ref, $libelle, $description, $selectedImage, 0);
                    }else{
                        saveReferentiel($state_ref, $libelle, $description, $selectedImage, $activeNumberPromo);
                    }
                    $_POST["libelle"] = "";
                    $_POST["description"] = "";
                    $referentiels = getReferentiel();
                }
                include("../templates/partial/layout.html.php");
            }else{
                include("../templates/partial/layout.html.php");
            }
        }else if($_POST["layout"] == "list-promotion"){
            if(isset($_POST["send-check"])){
                $id = $_POST["send-check"];
                $_SESSION["activeSession"] = $id;
                $promotions = enablePromotion($id);
                include("../templates/partial/layout.html.php");
            }else{
                include("../templates/partial/layout.html.php");
            }
        }        
        else{
            if(isset($_POST["connexion"])){
                require_once "../validator/data-validator.php";
                $email = $_POST["email"];
                $password = $_POST["password"];
                if(empty($email) && empty($password)){
                    $emptyEmail = true;
                    $emptyPassword = true;
                }else{
                    if(!empty($email) && empty($password)){
                        $emptyEmail = false;
                        $emptyPassword = true;
                    }
                    if(!empty($password) && empty($email)){
                        $emptyEmail = true;
                        $emptyPassword = false;
                        include("../templates/login.html.php");
                    }
                }

                if(!empty($email) && !empty($password)){
                    if(emailValidator($email)){
                        include("../models/apprenant.model.php");
                        $goodCredentials = checkCredentials($email, $password);
                    }else{
                        $emailIsValide = false;
                    }
                }

                if(!empty($email) && !empty($password) && $goodCredentials != false && $emailIsValide == true){
                    $_SESSION["email"] = $userInfo["email"];
                    $_SESSION["nom"] = $userInfo["nom"];
                    $_SESSION["prenom"] = $userInfo["prenom"];
                    $_SESSION["role"] = $userInfo["role"];
                    include("../templates/partial/layout.html.php");
                }else{
                    include("../templates/login.html.php");
                }
            }else{
                include("../templates/login.html.php"); 
            }
             
        }
    ?>
</body>
</html>

