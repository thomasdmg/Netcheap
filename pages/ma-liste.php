<?php

    session_start();
    if (!isset($_SESSION) || $_SESSION['username'] == "") {
        header("Location: ../pages/auth.php");
        // var_dump($_SESSION);
        exit;
    }

    // Vérifier si le bouton de déconnexion est cliqué
    if (isset($_GET['disconnect'])) {
        session_unset();
        session_destroy();
        header("Location: ../pages/auth.php");
        exit;
    }

    function POST_REQUEST($url, $data=false) {

        isset($data) ? $data = json_encode($data) : $data = null;
        // var_dump($data);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        return $result;

    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Netcheap</title>
    <link rel="icon" href="../pages/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/ma-liste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="../pages/fancybox.js"></script>
</head>
<body>
    <div id="main-page">
        <div id="nav-bar">
            <img src="../images/logo.png" id="logo">
            <div id="nav-links">
                <a class="link" href="../pages/accueil.php">Accueil</a>
                <a class="link" href="../pages/ma-liste.php"><strong>Ma liste</strong></a>
                <a class="link" href="../pages/mes-recommendations.php">Mes recommendations</a>
            </div>
            <div id=nav-right>
                <div id="search-bar">
                    <form id="search-form" action="../pages/search.php" method="GET">
                        <input type="text" name="search" placeholder="Rechercher">
                        <button id="search-btn" type="submit" name="submit" class="btn-search"><i class="fas fa-search" style="color: #ffffff;"></i></button>
                    </form>
                    
                </div>
                <div id="disconnect-btn">
                    <a href="../pages/accueil.php?disconnect=true"><i class="fas fa-times-circle" style="color: #ffffff;"></i></a>
                </div>
            </div>
        </div>
        <div id="main-content">

        <!-- Contenu liké par l'utilisateur -->

            <div class="caroussel_title">
                <h1 class="section_title">Mes séries préférées</h1>
            </div>
            
            <div class="caroussel_container">

                <div class="all_thumb_container_maliste">
                        <?php
                            $data = POST_REQUEST("http://localhost/api_rest_series/index.php?process=get_like_of_user", array("user_id" => $_SESSION['user_id'], "limit" => 30));
                            if(isset($data['response']) && !empty($data['response'])) {
                                foreach ($data['response'] as $serie) {
                                    $thumbnailPath = "../images/pp/" . $serie['serie_id'] . ".jpg";
                                    echo '<img class="carousel-img serie-link" src="' . $thumbnailPath . '" alt="Thumbnail" draggable="false" data-serie-id="' . $serie['serie_id'] . '">';
                                }
                            }
                        ?>
                </div>
                
            </div>
           
        </div>
    </div>
</body>
</html>

