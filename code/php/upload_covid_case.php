<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "../config.php";
if(isset($_POST['date']) && isset($_SESSION['username'])){

  $date_sent= $_POST['date'];// hmera shmera se string morfh
  $date = date( "Y-m-d", strtotime($date_sent));
  $username =  $_SESSION['username'];
  $stmt = mysqli_query($link,"INSERT INTO covid_db.covid_case(Date,Username) VALUES('".$date."', '".$username."')");

  echo $date;
  exit();

}
?>
