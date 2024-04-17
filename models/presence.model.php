<?php

    include '../data/file.csv.php';
    function getPresence(){
        $data = readCSVFile("presence.csv");
        
        $presences = [];
        $activePromo = $_SESSION["activeSession"];
        foreach($data as $entry){
            $presence = [
                "matricule" => $entry[0],
                "nom" => $entry[1],
                "prenom" => $entry[2],
                "telephone" => $entry[3],
                "referentiel" => $entry[4],
                "heure_arrivee" => $entry[5],
                "status" => $entry[6],
                "date" => $entry[7],
                "promotion" => $entry[8]
            ];
            if($presence['promotion'] == $activePromo){
                $presences[] = $presence;
            }
        }
        return $presences;
    }
    /*function generatePresence(){
        $presences = [
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Diallo",
                "prenom" => "Ibrahima Kaba",
                "telephone" => "783332212",
                "referentiel" => "dev_web",
                "heure_arrivee" => "08:00",
                "status" => "present",
                "date" => date('Y-m-d')
            ],
            [
                "matricule" => "P6_DEVDATA_2024_001",
                "nom" => "Bah",
                "prenom" => "Khalil",
                "telephone" => "780000000",
                "referentiel" => "dev_data",
                "heure_arrivee" => "08:10",
                "status" => "present",
                "date" => date('Y-m-d')
            ],
            [
                "matricule" => "P6_REFDIG_2024_001",
                "nom" => "Diallo",
                "prenom" => "Aminata",
                "telephone" => "785106300",
                "referentiel" => "ref_dig",
                "heure_arrivee" => "07:50",
                "status" => "present",
                "date" => date('Y-m-d')
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Sow",
                "prenom" => "Moussa",
                "telephone" => "784567810",
                "referentiel" => "dev_web",
                "heure_arrivee" => "08:50",
                "status" => "present",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Diallo",
                "prenom" => "Ibrahima",
                "telephone" => "784567810",
                "referentiel" => "dev_web",
                "heure_arrivee" => "09:30",
                "status" => "present",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Diop",
                "prenom" => "Mouhmed",
                "telephone" => "784567810",
                "referentiel" => "dev_web",
                "heure_arrivee" => "-",
                "status" => "absent",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Diop",
                "prenom" => "Aissata",
                "telephone" => "784567810",
                "referentiel" => "dev_web",
                "heure_arrivee" => "-",
                "status" => "absent",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Hazard",
                "prenom" => "Eden",
                "telephone" => "784567810",
                "referentiel" => "dev_web",
                "heure_arrivee" => "07:55",
                "status" => "present",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Abba",
                "prenom" => "Show",
                "telephone" => "Goku",
                "referentiel" => "dev_data",
                "heure_arrivee" => "-",
                "status" => "absent",
                "date" => '2024-03-05'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Phone",
                "prenom" => "Phone",
                "telephone" => "784567810",
                "referentiel" => "ref_dig",
                "heure_arrivee" => "-",
                "status" => "absent",
                "date" => '2024-04-04'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Moustapha",
                "prenom" => "Diop",
                "telephone" => "784567810",
                "referentiel" => "ref_dig",
                "heure_arrivee" => "10:00",
                "status" => "present",
                "date" => '2024-04-04'
            ],
            [
                "matricule" => "P6_DEVWEB_2024_001",
                "nom" => "Ya",
                "prenom" => "Awa",
                "telephone" => "784567810",
                "referentiel" => "ref_dig",
                "heure_arrivee" => "-",
                "status" => "absent",
                "date" => '2024-04-04'
            ]
        ];
        return $presences;
    }*/

    function filterPresence($status='status', $ref='referentiel', $date){
        $presences = getPresence();
        $presencesFilter = [];
        
        if($status == 'status' && $ref == 'referentiel'){
            foreach($presences as $p){
                if($p['date'] === $date){
                    $presencesFilter[] = $p;
                }
            }
            
            return $presencesFilter;
        }

        
        foreach($presences as $p){
            if($status != 'status' && $ref != 'referentiel'){
                // Si les deux valeurs sont sélectionnées, filtrez en fonction des deux
                if($p['status'] == $status && $p['referentiel'] == $ref && $p['date'] === $date){
                    $presencesFilter[] = $p;
                }
            } elseif($status != 'status') {
                // Si seul le statut est sélectionné, filtrez en fonction du statut uniquement
                if($p['status'] == $status && $p['date'] === $date){
                    $presencesFilter[] = $p;
                }
            } elseif($ref != 'referentiel') {
                // Si seul le référentiel est sélectionné, filtrez en fonction du référentiel uniquement
                if($p['referentiel'] == $ref && $p['date'] === $date){
                    $presencesFilter[] = $p;
                }
            }
        }

        return $presencesFilter;
    }
?>  