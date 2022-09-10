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

    <link rel="stylesheet" href ="css/change_credentials.css">

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

<!-- Form to Update our credentials -->
    <form method="post" action="php/user_update_credentials.php">
      <div class="form-group">
        <label for="formGroupExampleInput">Αλλαγή Ονόματος Χρήστη</label>
        <input type="text" class="form-control" name="update_username" placeholder="<?php echo $_SESSION['username'];?>" >
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Νέος Κωδικός Χρήστη</label>
        <input type="password" class="form-control" name="update_new_password" placeholder="Νέος Κωδικός">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Επαλλήθευση Κωδικού</label>
        <input type="password" class="form-control" name="update_comf_new_password" placeholder="Επαλλήθευση">
      </div>
      <div class="form-group">
          <input name="update_button" type="submit" class="btn btn-primary" value="Submit">
      </div>
    </form>

  <!-- Se periptwsh lathous epistrefontai sthn selida ta epomena errors -->
      <?php
      	if(isset($_GET['error'])){
      		if($_GET['error'] == "wrongpassword"){
      			echo '<div class="error" style ="margin-top: -44%;"><p>Λάθος Κωδικός!<br> Το password πρέπει
      			να είναι τουλάχιστον 8 χαρακτήρες και να περιέχει τουλάχιστον<br> ένα κεφαλαίο γράμμα, έναν αριθμό
      			και κάποιο σύμβολο (π.χ. #$*&@)</div>';
      		}
      		else if($_GET['error'] == "passwordsdontmatch"){
      			echo '<div class="error">Οι κωδικοί δεν είναι όμοιοι!</div>';
      		}
      		else if($_GET['error'] == "usernametaken"){
      			echo '<div class="error" style ="margin-top: -42%;">Υπάρχει ήδη χρήστης με αυτό το όνομα!</div>';
      		}
      	}
      	if(isset($_GET['update'])){
      		if($_GET['update'] == "success")
      		{
      			echo '<h2 style="text-align: center; color: #418385; font-weight: bold; margin-top: -43%;">Οι αλλαγές έγιναν με επιτυχία!</h2>';
            // echo '<div class="alert alert-success" role="alert">Οι αλλαγές έγιναν με επιτυχία!</div>';

      		}
      }
  	?>

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
<!-- <script src="lib/leaflet/leaflet.js"></script> -->
<!-- Jquery  -->
<script src="lib/leaflet/jquery-3.5.1.js"></script>

<!-- <script src="js/source_code.js"></script> -->

<!-- Control Locate-->
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
