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


	<link rel="stylesheet" type="text/css" href="dropdown_menu.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href ="bootstrap/css/bootstrap.min.css">
    <!-- leaflet css-->
    <link rel="stylesheet" href="lib/leaflet/leaflet.css">
     <!-- Geolocation css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

    <link href="dropdown_menu.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">

    <style>
        /*gia na mhn exei lefka shmeia sthn othoni*/
        body{
            margin: 0;
            padding: 0;
        }
        /* thelw na pianei olh thn othoni*/
        #map{
            position: absolute;
            width: 100%;
            height: 80vh;

        }
        .input-group{
            position: absolute;
            padding: 10px;
            top: 50;
            width: 20%;
            z-index: 9999;
            left:40%;
        }

    </style>
</head>
<body>

<!--Menu bar-->

<header class="p-3 mb-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="login.php" class="nav-link px-2 link-secondary">Καταχώρηση Κρούσματος</a></li>
        <li><a href="login.php" class="nav-link px-2 link-dark">Πιθανή επαφή με κρούσμα</a></li>
        <div class="dropdown text-end">
      </ul>
    <div class="wrapper">
  <div class="dropdown dropdown_desktop_icon">
      <button><span class="icon"></span>
        <span class="text">User Menu</span>
      </button>
      <ul>
        <li><a href="#">
          <span class="icon">
            <ion-icon name="person-sharp"></ion-icon>
          </span>
          <span class="text">Επεξεργασία Προφιλ</span>
        </a></li>
        <li><a href="register.php">
          <span class="icon">
            <ion-icon name="help-circle-sharp"></ion-icon>
          </span>
          <span class="text">Log out</span>
        </a></li>

  </div>
</div>

</ul>
        </ul>
      </div>
    </div>
  </div>
</header>

</div>

      <div class="input-group">
        <input id="search_input" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button id="search_btn" type="submit" value="Submit" class="btn btn-dark">Search</button>
      </div>


      <div id="map"></div>

      <footer class="footer mt-auto py-3 bg-light">
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

<script type="text/javascript" src="js/dropdowns.js"></script>

<!-- Control Locate-->
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
