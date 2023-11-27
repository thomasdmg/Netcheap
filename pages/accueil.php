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
    <script src="../pages/accueil.js"></script>
    <link rel="icon" href="../pages/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
</head>
<body>
    <div id="main-page">
        <div id="nav-bar">
            <img src="../images/logo.png" id="logo">
            <div id="nav-links">
                <a class="link" href="../pages/accueil.php"><strong>Accueil</strong></a>
                <a class="link" href="../pages/ma-liste.php">Ma liste</a>
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

        <!-- Contenu le plus populaire sur la plateforme -->

            <div class="caroussel_title">
                <h1 class="section_title">Appréciés sur Netcheap</h1>
            </div>
            
            <div class="caroussel_container">

                <div class="wrapper">
                    <i id="left" class="fas fa-angle-left"></i>
                    <div class="carousel">
                            <?php
                                $data = POST_REQUEST("http://localhost/api_rest_series_series/index.php?process=get_popular", null);
                                if(isset($data['response']) && !empty($data['response'])) {
                                    foreach($data['response'] as $serie) {
                                        $thumbnailPath = "../images/pp/" . $serie['serie_id'] . ".jpg";
                                        echo '<img class="carousel-img" src="' . $thumbnailPath . '" alt="Thumbnail" draggable="false" >';
                                    }
                                }
                            ?>
                    </div>
                    <i id="right" class="fas fa-angle-right"></i>
                </div>

            </div>

            <!-- Mes préférences -->

            <div class="caroussel_title">
                <h1 class="section_title">Nos recommendations pour <?php echo $_SESSION['username'] ?></h1>
            </div>
            
            <div class="caroussel_container">

                <div class="wrapper2">
                    <i id="left2" class="fas fa-angle-left"></i>
                    <div class="carousel2">
                            <?php
                                $data = POST_REQUEST("http://localhost/api_rest_series_series/index.php?process=get_recommendation_lite", 
                                array("user_id" => $_SESSION['user_id'], "limit" => 15, "sort" => -1));

                                if(isset($data['response']) && !empty($data['response'])) {
                                    foreach($data['response'] as $serie) {
                                        $thumbnailPath = "../images/pp/" . $serie['serie_id'] . ".jpg";
                                        echo '<img class="carousel2-img" src="' . $thumbnailPath . '" alt="Thumbnail" draggable="false" >';
                                    }
                                }
                            ?>
                    </div>
                    <i id="right2" class="fas fa-angle-right"></i>
                </div>

            </div>

            <!-- Nouveauté -->

            <div class="caroussel_title">
                <h1 class="section_title">Nouveautés</h1>
            </div>
            
            <div class="caroussel_container">

                <div class="wrapper3">
                    <i id="left3" class="fas fa-angle-left"></i>
                    <div class="carousel3">
                            <?php
                                $data = POST_REQUEST("http://localhost/api_rest_series_series/index.php?process=get_recommendation_lite", 
                                array("user_id" => $_SESSION['user_id'], "limit" => 15, "sort" => 1));

                                if(isset($data['response']) && !empty($data['response'])) {
                                    foreach($data['response'] as $serie) {
                                        $thumbnailPath = "../images/pp/" . $serie['serie_id'] . ".jpg";
                                        echo '<img class="carousel3-img" src="' . $thumbnailPath . '" alt="Thumbnail" draggable="false" >';
                                    }
                                }
                            ?>
                    </div>
                    <i id="right3" class="fas fa-angle-right"></i>
                </div>

            </div>
           
        </div>
    </div>
</body>
</html>

