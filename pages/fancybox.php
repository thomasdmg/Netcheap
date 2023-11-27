
<head>
    <title>Netcheap - description</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/fancybox.css">
    <!-- lien avec js -->
    <script src="../pages/test.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <?php
        function POST_REQUEST($url, $data=false) {
            isset($data) ? $data = json_encode($data) : $data = null;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($result, true);
            return $result;
        }

        isset($_GET['serie_id']) ? $serieId = $_GET['serie_id'] : $serieId = null;
        $data = POST_REQUEST("http://localhost/api_rest_series/index.php?process=get_info_serie", array("serie_id" => $serieId));
        $data = $data['response'];
    ?>
</head>
<body>
    
    <div id="main-container">
    <div id="header">
        <div id="title">
            <h1><?php echo $data['nom_serie']; ?></h1>
        </div>
        <!-- <div id="close">
            <span class="close_icon"><i class="fas fa-times"></i></span>
        </div> -->
    </div>
        
    <div id="img">
        <?php
            $imagePath = "../images/homepaper/" . $data['serie_id'] . ".jpg";
            echo '<img id="img_thumb" src="' . $imagePath . '">';
        ?>
    </div>

    <div id="content">
        <div id="header_desc">
            <div id="title">
                <h2>Informations</h2>
            </div>
            <div id="like">
                <span class="like_icon"><i class="fas fa-heart"></i></span>
            </div>
        </div>
        <div id="genre">
            <p><strong> Genres : </strong>
                <?php foreach ($data['categories'] as $category) {
                    echo $category . " ";
                } ?>
            </p>
        </div>
        <div id="desc">
            <p><strong> Description : </strong></p>
            <p id="description-text"><?php echo $data['desc']; ?></p>
        </div>
    </div>
        
    </div>
    
</body>

