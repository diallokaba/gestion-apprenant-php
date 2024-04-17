<?php

    include "../data/file.csv.php";
    function getReferentiel(){
        $referentiels = [];
        $data =  readCSVFile("referentiel.csv");
        $activePromo = $_SESSION["activeSession"];
        foreach($data as $entry){
            $referentiel = [
                "libelle" => $entry[0],
                "description" => $entry[1],
                "etat" => $entry[2],
                "promotion" => $entry[3],
                "image" => $entry[4],
            ];
            if($referentiel['promotion'] == $activePromo){
                $referentiels[] = $referentiel;
            }
        }
        
        
        
        return $referentiels;
    }

    function listReferentiel(){
        $referentiels = [
            [
                "libelle" => "Dev Web/Mobile",
                "etat" => "active",
            ],
            [
                "libelle" => "Referent Digital",
                "etat" => "active",
            ],
            [
                "libelle" => "AWS",
                "etat" => "active",
            ],
            [
                "libelle" => "Hackeuse",
                "etat" => "active",
            ],
            [
                "libelle" => "Develeppement Data",
                "etat" => "active",
            ]
        ];

        return $referentiels;
    }

    function saveReferentiel($state_ref, $libelle, $description, $selectedImage, $activeNumberPromo){
        $referentiel["libelle"] = $libelle;
        $referentiel["description"] = $description;
        $referentiel["etat"] = $state_ref;
        $referentiel["promotion"] = $activeNumberPromo;
        
        // Vérification si un fichier image a été téléchargé
        if(!empty($selectedImage)) {
            $referentiel["image"] = saveReferentielImage($selectedImage);
        } else {
            $referentiel["image"] = ""; // Enregistre une chaîne vide si aucun fichier image n'est sélectionné
        }


        saveDataOnFile("referentiel.csv", $referentiel);
    }

    function saveReferentielImage($imageFile){
        $targetDirectory = "../public/images/";
        $targetFile = $targetDirectory . basename($imageFile);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        return $targetFile;
    }

?>