<?php
    define("WEBROOT","http://www.ibrahima.diallo:8370/projet/public");

    //require_once '../config/helpers.php';
    //include('../model/presence.model.php');

    function globalSearchHeader($keyword, $data){
        $results = [];
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                // Vérifie si la valeur contient le mot-clé recherché
                if (stripos($value, $keyword) !== false) {
                    // Ajoute l'élément correspondant aux résultats
                    $results[] = $item;
                    // Passe à l'élément suivant
                    break;
                }
            }
        }
        return $results;
    }

    function dump($data, $method){
        if($method != null){
            echo "<h5>$method</h5>";
        }
        echo "<pre>";
            var_dump($data);
        echo "</pre>";
    }
    
