<?php
    include '../data/file.csv.php';
    function getPromotion(){
        $promotions = [];
        $data = readCSVFile("promotion.csv");
        foreach($data as $entry){
            // Convertir la valeur de "state" en booléen
            //$entry[4] = ($entry[4] === 'true');
            $promotion=[
                "id" => $entry[0],
                "libelle" => $entry[1],
                "date_debut" => $entry[2],
                "date_fin" => $entry[3],
                "state" => $entry[4]
            ];
            $promotions[] = $promotion;
        }

        return $promotions;
    }
    /*function listPromotion(){
        return $promotions = [
            [
                "libelle" => "Promotion 6",
                "date_debut" => "2024-02-02",
                "date_fin" => "2024-11-01",
                "state" => true
            ],
            [
                "libelle" => "Promotion 5",
                "date_debut" => "2023-02-02",
                "date_fin" => "2023-11-01",
                "state" => false
            ],
            [
                "libelle" => "Promotion 4",
                "date_debut" => "2022-02-02",
                "date_fin" => "2022-11-01",
                "state" => false
            ],
            [
                "libelle" => "Promotion 3",
                "date_debut" => "2021-02-02",
                "date_fin" => "2021-11-01",
                "state" => false
            ],
            [
                "libelle" => "Promotion 2",
                "date_debut" => "2020-02-02",
                "date_fin" => "2020-11-01",
                "state" => false
            ],
            [
                "libelle" => "Promotion 1",
                "date_debut" => "2019-02-02",
                "date_fin" => "2019-11-01",
                "state" => false
            ]
        ];
    }*/

    function enablePromotion($id){
        // Récupérer la liste des promotions
        $promotions = getPromotion();
        $updatedPromotion = [];

        // Parcourir chaque promotion pour mettre à jour l'état
        foreach ($promotions as $promotion) {
            // Si l'ID de la promotion correspond à celui passé en paramètre
            if ($promotion['id'] == $id) {
                // Mettre à jour l'état de la promotion à true
                $promotion['state'] = 1;
            } else {
                // Mettre à jour l'état de toutes les autres promotions à false
                $promotion['state'] = 0;
            }
            $updatedPromotion[] = $promotion;
        }

        
        updatePromotionFile($updatedPromotion);
        //var_dump($updatedPromotion);
        //die();
        // Retourner la nouvelle liste de promotions mise à jour
        return $updatedPromotion;
    }

    function updatePromotionFile($promotions){
        writeCSVFile("promotion.csv", $promotions);
    }

    function getLastIdOnPromo(){
        $lastId = 0;
        $promotions = getPromotion();
        foreach($promotions as $p){
            $lastId = $p["id"];
        }

        return $lastId;
    }

    function savePromo($libelle, $dateDebut, $DateFin){
        $lastIdPromo = getLastIdOnPromo();
        $lastIdPromo += 1;
        $promotion["id"] = $lastIdPromo;
        $promotion["libelle"] = $libelle;
        $promotion["dateDebut"] = $dateDebut;
        $promotion["dateFin"] = $DateFin;
        $promotion["state"] = 0;
        saveDataOnFile("promotion.csv", $promotion);
    }
?>