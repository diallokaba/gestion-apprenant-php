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
                "genre" => $entry[3],
                "telephone" => $entry[4],
                "promotion" => $entry[5],
            ];
            if($apprenant['promotion'] == $activePromo){
                $apprenants[] = $apprenant;
            }
        }
        return $apprenants;
    }

function listApprenant(){
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
}



?>