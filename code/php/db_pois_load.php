<?php
// Include config file
require_once "config.php";
$filename = "starting_pois_db.json";

$data = file_get_contents($filename);

$array = json_decode($data, true); //true -> json will be tranformed into an array


foreach($array as $row)
{
  $id= $row["id"];
  $name= $row["name"];
  $address= $row["address"];
  $lat= $row["coordinates"]["lat"];
  $lng= $row["coordinates"]["lng"];


  $sql_pois = mysqli_prepare($link,'INSERT INTO pois(idPois,Name,Address,Latitude,Longitude) VALUES(?,?,?,?,?)');
  mysqli_stmt_bind_param($sql_pois, 'sssss', $id,$name,$address, $lat, $lng);
  mysqli_stmt_execute($sql_pois);

    foreach($row["types"] as $types)
    {
      //ftiaxame neo pinaka "types" poy den exei kapoia klhronomikothta me ton "pois" kai bainoun ekei ola ta types gia to kathe pois ksexwrista
      $sql_types = mysqli_prepare($link, 'INSERT INTO covid_db.types(Pois_id,type,Pois_Name) VALUES(?,?,?)');
      mysqli_stmt_bind_param($sql_types, 'sss', $id,$types,$name);
      mysqli_stmt_execute($sql_types);

    }

    foreach($row["populartimes"] as $pop_times )
    {
        $pop_name = $pop_times["name"];//day
        $time = 0;

        foreach ($pop_times["data"] as $popularity){
           $time++;
            $sql_time = mysqli_prepare($link, 'INSERT INTO pop_times(Pois_id,day,Pois_name,popularity,time) VALUES(?,?,?,?,?)');
            mysqli_stmt_bind_param($sql_time,'sssss',$id,$pop_name,$name,$popularity,$time);
            mysqli_stmt_execute($sql_time);

          }


      }

}
echo "Data Inserted";

?>
