<?php
// Include config file
require_once "config.php";
$filename = "starting_pois_db.json";

$data = file_get_contents($filename);

$array = json_decode($data, true); //true -> json will be tranformed into an array


foreach($array as $row)
{
  //$lat = $row["coordinates"]["lat"];
  //$lon = $row["coordinates"]["lng"];

  $sql = "INSERT INTO pois(idPois,Name,Address,Latitude,Longitude,Types,Pop_times) VALUES('".$row["id"]."','".$row["name"]."','".$row["address"]."','". $row["coordinates"]["lat"]."','".$row["coordinates"]["lng"]."','".$row["types"]."','".$row["populartimes"]."')";

  mysqli_query($link,$sql);
}
echo "Data Inserted";
?>
