<?php
    include "../data/file.csv.php";
    function getApprenant(){
        $apprenants = [];
        $data =  readCSVFile("apprenant.csv");
        $activePromo = $_SESSION["activeSession"];
        
        foreach($data as $entry){
            $apprenant = [
                "nom" => $entry[0],
                "prenom" => $entry[1],
                "email" => $entry[2],
                "password" => $entry[3],
                "genre" => $entry[4],
                "telephone" => $entry[5],
                "promotion" => $entry[6],
                "role" => $entry[7],
                "referentiel" => $entry[8]
            ];
            if($apprenant['promotion'] == $activePromo){
                $apprenants[] = $apprenant;
            }
        }
        return $apprenants;
    }

/*function listApprenant(){
    $apprenants = [
        [
            "image" => "https://www.flaticon.com/free-animated-icon/profile_11186790?term=user&page=1&position=3&origin=search&related_id=11186790",
            "nom"=> "Diallo",
            "prenom" => "Ibrahima",
            "email" => "diallo@gmail.com",
            "genre" => "M",
            "telephone" => "770000000"
        ],
        [
            "image" => "https://www.flaticon.com/free-animated-icon/management-consulting_15401352?term=user&page=1&position=26&origin=search&related_id=15401352",
            "nom"=> "Bah",
            "prenom" => "khalil",
            "email" => "khalil@gmail.com",
            "genre" => "M",
            "telephone" => "770000000"
        ],
        [
            "image" => "https://www.flaticon.com/free-animated-icon/management-consulting_15401352?term=user&page=1&position=26&origin=search&related_id=15401352",
            "nom"=> "Sow",
            "prenom" => "Fatima",
            "email" => "fatima@gmail.com",
            "genre" => "F",
            "telephone" => "770000000"
        ],
        [
            "image" => "https://www.flaticon.com/free-animated-icon/management-consulting_15401352?term=user&page=1&position=26&origin=search&related_id=15401352",
            "nom"=> "Diallo",
            "prenom" => "Aminata",
            "email" => "aminata@gmail.com",
            "genre" => "F",
            "telephone" => "770000000"
        ],
        [
            "image" => "https://www.flaticon.com/free-animated-icon/management-consulting_15401352?term=user&page=1&position=26&origin=search&related_id=15401352",
            "nom"=> "Mahmoud",
            "prenom" => "Ibn Ibrahima",
            "email" => "mahmoud@gmail.com",
            "genre" => "M",
            "telephone" => "770000000"
        ]

    ];
    return $apprenants;
}*/

    function checkCredentials($email, $password){
        $apprenants = getAllApprenants();
        global $userInfo; // Accès à la variable globale
        foreach($apprenants as $app){
            if($app["email"] === trim($email) && $app["password"] === trim($password)){
                $userInfo["nom"] = $app["nom"];
                $userInfo["prenom"] = $app["prenom"];
                $userInfo["email"] = $app["email"];
                $userInfo["role"] = $app["role"];
                $userInfo["promotion"] = $app["promotion"];
                return true;
            }
        }
        return false;
    }

    function getAllApprenants(){
        $data = readCSVFile("apprenant.csv");
        $apps = [];
        global $onlyAdmin;
        foreach($data as $entry){
            $app = [
                "nom" => $entry[0],
                "prenom" => $entry[1],
                "email" => $entry[2],
                "password" => $entry[3],
                "genre" => $entry[4],
                "telephone" => $entry[5],
                "promotion" => $entry[6],
                "role" => $entry[7],
                "referentiel" => $entry[8]
            ];
            $apps [] = $app;
        }
        return $apps;
    }

    function filterByReferentiel($choices, $data){
        $apprenants = [];
        if(count($choices) !== 0 && count($data) !== 0){
            foreach($choices as $choice){
                foreach($data as $app){
                    if($choice === $app["referentiel"]){
                        $apprenants[] = $app;
                    }
                }
            }
        }
        return $apprenants;
    }
?>