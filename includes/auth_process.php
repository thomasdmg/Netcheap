<?php

    // header('Location: ../pages/accueil.php');
    if (isset($_POST)) {
        $data = $_POST;
        $username = $data['username'];
        $password = $data['password'];
    
        if ($username != "" && $password != "") {
            // Créer un tableau contenant les données de l'utilisateur
            $userData = [
                'user' => $username, 
                'password' => $password
            ];
    
            // Convertir les données en JSON
            $jsonData = json_encode($userData);
            
            // URL de l'API
            $url = 'http://localhost/api_rest_series/auth.php?process=login';
    
            // Initialiser une session cURL
            $curl = curl_init($url);
    
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData)
            ]);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            // Exécuter la requête cURL
            $result = curl_exec($curl);
            
            // Fermer la session cURL
            curl_close($curl);
            
            // Traiter la réponse de l'API
            $response = json_decode($result);
            
            if ($response && $response->success === true) {
               
                // Authentification réussie, rediriger vers accueil.php & Crée une session pour l'utilisateur
                session_start();
                $_SESSION['user_id'] = $response->user_id;
                $_SESSION['username'] = $response->username;
                header('Location: ../pages/accueil.php');
                
                exit;
            } else {
                // Authentification échouée, rediriger vers la page de connexion avec un paramètre d'erreur
                header('Location: ../pages/auth.php');
                exit;
            }
        } else {
            // Les champs sont vides, rediriger vers la page de connexion
            header('Location: ../pages/auth.php');
            exit;
        }
    }

?>