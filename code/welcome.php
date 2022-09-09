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



    <!-- Bootstrap -->
    <link rel="stylesheet" href ="bootstrap/css/bootstrap.min.css">
    <!-- leaflet css-->
    <link rel="stylesheet" href="lib/leaflet/leaflet.css">
     <!-- Geolocation css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />




    <style>
        /*gia na mhn exei lefka shmeia sthn othoni*/
        body{
            margin: 0;
            padding: 0;
            background-color: #d1e8e2;
        }

        /* thelw na pianei olh thn othoni*/
        #map{
           height:600px;
           width: 95%;
           top: 150px;
           left: 2.5%;
           border-radius: 5px;



        }
        .input-group{
            position: fixed;
            padding: 10px;
            top:25px;
            width: 20%;
            z-index: 9999;
            right: 2%;
        }
        .footer{
          position:absolute;
          bottom: 0;
          z-index: 9999;
          height: 5px;
        }
        .navbar{
          position: fixed;
          top: 0;
          width: 100%;
          height:14vh;
          z-index: 9999;

        }
        .navbar-brand{
          padding: 50px;
          left: 6px;
        }
        .navbar-nav{
          padding: 15px;

        }
    </style>


</head>
<body>

<!--Menu bar-->

  <nav id ="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
    <a id="navbar_title" class="navbar-brand" href="welcome.php">Covid-19 Tracking</a>
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <!-- Na ftiaxoume covid_case.php  -->
            <!-- class="nav-link active" me ayto to kanoume akrive -->
            <!-- aria-current="page" me ayto deixnoume oti eimaste sthn sugkekrimenh selida -->
            <a class="nav-link" href="covid_case.php">Καταχώρηση Κρούσματος</a>
          </li>
          <li class="nav-item">
            <!-- Na ftisxoume load covid.php -->
            <a class="nav-link" href="load_covid.php">Πιθανή επαφή με κρούσμα</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Επεξεργασία Προφιλ
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="change_credentials.php">Αλλαγή Στοιχείων</a></li>
              <li><a class="dropdown-item" href="history.php">Ιστορικό</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!-- <form class="d-flex"> -->
        <!-- <div class="input-group">
          <input id="search_input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button id="search_btn" class="btn btn-outline-success" type="submit">Search</button>
        </div> -->
        <!-- </form> -->
      </div>
    </div>
  </nav>
<!-- searchbar -->
  <div class="input-group">
    <input id="search_input" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <button id="search_btn" type="submit" value="Submit" class="btn btn-dark">Search</button>
  </div>
<!-- Map div -->
  <div id="map"></div>
</div>
<!-- Footer -->
  <footer class="footer">
    <div class="container">
      <span class="text-muted">
  	Η τρέχουσα διαδικτυακή εφαρμογή αναπτύχθηκε στα πλαίσια του μαθήματος "Προγραμματισμός και Συστήματα στον Παγκόσμιο Ιστό
      <br>Copyright 2022 &copy</span>
    </div>
  </footer>

</body>

</html>
<!-- Bootstrap -->
<script src ="bootstrap/js/bootstrap.min.js"></script>

<!-- Implement Leaflet  -->
<script src="lib/leaflet/leaflet.js"></script>
<!-- Jquery  -->
<script src="lib/leaflet/jquery-3.5.1.js"></script>

<script src="js/source_code.js"></script>

<!-- Control Locate-->
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
