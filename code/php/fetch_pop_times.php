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
if(isset($_POST['suggestion'])){

$stmt = mysqli_prepare($link,"SELECT time,pop_times.Pois_id, popularity ,day  from pop_times, types where types.type =? AND types.Pois_id = pop_times.Pois_id");

mysqli_stmt_bind_param($stmt, "s",  $input);
$input=trim($_POST['suggestion']);

  if(mysqli_stmt_execute($stmt)){

  $pop_times = $stmt->get_result();

  $data = array();

  while($r=mysqli_fetch_object($pop_times))
  {
    // array_push($data,$r);
    $time_now = date("H");
    $day_now = date("l");
    if ($r->day== $day_now)
    {
        array_push($data,$r);
    }

  }
  echo json_encode($data); // convert array into json
  }
}
?>
