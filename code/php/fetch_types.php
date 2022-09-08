<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file/
require_once "../config.php";

if(isset($_POST['suggestion'])){

$stmt  = mysqli_prepare($link,"SELECT idPois,Name,Address,Latitude,Longitude,Timestamp from pois,types WHERE types.type = ? AND idPois= Pois_id");

  if($stmt){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s",  $input);
    $input=trim($_POST['suggestion']);


    if(mysqli_stmt_execute($stmt)){

    $result = $stmt->get_result();// get results from query

    $data = array();
    // echo "Fuck me";
    while($r=mysqli_fetch_object($result))
    {
      array_push($data,$r);
    }
      echo json_encode($data);
    }

  }


}
?>
