<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "../config.php";
$username = $_SESSION['username'];

$stmt = mysqli_prepare($link,"SELECT covid_case.Date from covid_case WHERE Username = ?");

mysqli_stmt_bind_param($stmt, "s",  $username);

  if(mysqli_stmt_execute($stmt)){

  $date = $stmt->get_result();

$data =array();

while($r=mysqli_fetch_object($date))
{
  array_push($data,$r);
}
  if(isset($data))
  {
    echo json_encode(end($data)); // convert array into json  }
    exit();
  }
}
?>
