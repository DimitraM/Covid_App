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
    <title>Welcome Page</title>

    <!-- leaflet css-->
    <link rel="stylesheet" href="lib/leaflet/leaflet.css">
     <!-- Geolocation css -->
    <link rel="stylesheet" href="lib\leaflet-locatecontrol\src\L.Control.Locate.scss" />

    <!-- Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

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
<!-- Implement Leaflet  -->
<script src="lib/leaflet/leaflet.js"></script>
<!-- Jquery  -->
<script src="lib/leaflet/jquery-3.5.1.js"></script>

<script src="js/source_code.js"></script>

<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<!-- Control Geocoder-->
<script src="lib\leaflet-locatecontrol\src\L.Control.Locate.js"></script>
