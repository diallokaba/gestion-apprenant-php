<?php

    if (!function_exists('readCSVFile')) {
        function readCSVFile($file){
            $dataOnFiles = [];
    
            //ouvrir le fichier
            $handle = fopen(__DIR__ ."/$file", "r");
            //Vérifier si le fichier est ouvert avec succès 
            if($handle !== FALSE){
                //Lire chaque ligne du fichier
                while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                    //Ajouter les données de chaque ligne au tableau présence
                    $dataOnFiles[] = $data;
                }
                //Fermer le fichier
                fclose($handle);
            }else{
                // Gérer l'erreur si le fichier ne peut pas être ouvert
                die("Erreur: Impossible d'ouvrir le fichier $file.");
            }
            return $dataOnFiles;
        }
    }

    if(!function_exists('writeCSVFile')){
        function writeCSVFile($file, $data) {
            $handle = fopen(__DIR__ ."/$file", "w");
            if ($handle !== FALSE) {
                foreach ($data as $entry) {
                    fputcsv($handle, $entry);
                }
                fclose($handle);
            } else {
                die("Erreur: Impossible d'ouvrir le fichier $file en écriture.");
            }
        }
    }

    if(!function_exists('saveDataOnFile')){
        function saveDataOnFile($file, $data){
            $handle = fopen(__DIR__ ."/$file", "a");
            if($handle !== FALSE){
                fputcsv($handle, $data);
            }else{
                die("Erreur: Impossible d'ouvrir le fichier $file en écriture.");
            }
        }
    }

?>