<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Tutorial</title>
    <!-- leaflet css-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>


    <style>
        /*gia na mhn exei lefka shmeia sthn othoni*/
        body{
            margin: 0;
            padding: 0;
        }
        /* thelw na pianei olh thn othoni*/
        #map{
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>

    <div id="map"></div>

</body>
</html>
<!-- leaflet script-->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" ></script>
<!--Prospatheia na fortwse ta data-->
<!--<script src="./specific.js"></script>-->
<!--<script src="./starting_pois.js"></script>-->
<!-- <script src="./marker.js"></script>
<script src="./test.js"></script> -->
<script src="./js/map.js"></script>
<!-- Get users location -->
<script src="./js/locate_control/src/L.Control.Locate.js" charset="utf-8"></script> <!--We are using  https://github.com/domoritz/leaflet-locatecontrol tha we found on leaflet plugins-->
