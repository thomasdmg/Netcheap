<?php

    // header('Location: ../pages/accueil.php');
    if (isset($_POST)) {
        $data = $_POST;
        $username = $data['username'];
        $password = $data['password'];
    
        if ($username != "" && $password != "") {
            // Cr�er un tableau contenant les donn�es de l'utilisateur
            $userData = [
                'user' => $username, 
                'password' => $password
            ];
    
            // Convertir les donn�es en JSON
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
    
            // Ex�cuter la requ�te cURL
            $result = curl_exec($curl);
            
            // Fermer la session cURL
            curl_close($curl);
            
            // Traiter la r�ponse de l'API
            $response = json_decode($result);
            
            if ($response && $response->success === true) {
               
                // Authentification r�ussie, rediriger vers accueil.php & Cr�e une session pour l'utilisateur
                session_start();
                $_SESSION['user_id'] = $response->user_id;
                $_SESSION['username'] = $response->username;
                header('Location: ../pages/accueil.php');
                
                exit;
            } else {
                // Authentification �chou�e, rediriger vers la page de connexion avec un param�tre d'erreur
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