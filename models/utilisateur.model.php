<?php
    include "../data/file.csv.php";
    function getUtilisateur(){
        $utilisateurs = [];
        $data =  readCSVFile("apprenant.csv");
        
        foreach($data as $entry){
            $utilisateur = [
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
            if($utilisateur['role'] == "ROLE_ADMIN"){
                $utilisateurs[] = $utilisateur;
            }
        }
        return $utilisateurs;
    }