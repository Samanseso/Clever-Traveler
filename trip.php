<?php
    session_start();
    
    require_once('config/db.php');

    $place_id = 'default';

    if (isset($_GET['place_id'])) {
        $place_id = $_GET['place_id'];
    }

    $trip_query = "select * from place_info where place_id = '" . $place_id . "'";
    $trip_result = mysqli_query($conn, $trip_query);
    $trip_row = mysqli_fetch_assoc($trip_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clever Traveller</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!--Font Awsome-->
    <script src="https://kit.fontawesome.com/acb62c1ffe.js" crossorigin="anonymous"></script>


    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link type="image/png" rel="icon" href="css/images/logo.png"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="css/leaflet.css?v=1.3.1" />
    <script type="text/javascript" src="js/leaflet.js?v=1.3.1"></script>

    <script type="text/javascript" src="js/bouncemarker.js"></script>
    <script type="text/javascript" src="dist/graphhopper-client.js?v=0.9.0-4"></script>
    <script type="text/javascript" src="js/togeojson.js"></script>
    <link rel="stylesheet" href="css/style_trip.css">
</head>
<body>
    <div class="loading">
        <div class="spinner-border text-info" role="status">
        <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <?php include('loading.php') ?>
    <div id="main position-relative">
        <div id="routing" class="tab-content position-absolute z-1">
            <div id="routing-map"></div>
            <div id="instructions-header">
                <div id="instructions" class="px-3 px-sm-5"></div>
            </div>
        </div>
        <div id="page-contaier">
            <div class="page page1 px-3">
                <?php include('header.php'); ?>
                <div class="details position-absolute gap-3 ps-3">
                    <p id="time" class="position-relative z-2 bg-light px-3 py-2 rounded fs-1"></p>
                </div>
                
                <div class="buttons d-flex justify-content-center gap-3 position-absolute w-100 px-3">
                    <button class="btn btn-info rounded fs-1 w-100 text-light position-relative z-2" onclick="showMap()">Map</button>
                    <button class="btn border rounded fs-1 w-100 btn-light position-relative z-2" onclick="showDirections()">Directions</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let orig_lat;
    let orig_lng;

    navigator.geolocation.getCurrentPosition(
        function(position) {
            orig_lat = position.coords.latitude 
            orig_lng = position.coords.longitude;
        },
        function(error){
            alert(error.message);
        }, {
            enableHighAccuracy: true,
            timeout : 5000
        }
    );

    window.onload = function () {
        document.querySelector('.loading').style.display = 'none';
    }

    var dest_lat = <?php echo $trip_row['latitude'] ?>;
    var dest_lng = <?php echo $trip_row['longitude'] ?>;
</script>
<script src="js/trip.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>