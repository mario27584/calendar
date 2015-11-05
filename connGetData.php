<?php

include 'credentials.php';


//      open connection to mysql db

$connection = mysqli_connect($host,$user,$pass,$db) or die("Error " . mysqli_error($connection));
//$connection = mysqli_connect("localhost","root","","schedule") or die("Error " . mysqli_error($conn));
      //fetch table rows from mysql db
     
$sql = "select * from classes";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
 
     //create an array
$class_array = array();
     
while($row = mysqli_fetch_assoc($result))
      {
          $class_array[] = $row;
         
      }
   
    //echo json_encode($class_array);
      
     echo "<script> var tasks=".json_encode($class_array)."</script>";
 
      //close the db connection
      mysqli_close($connection);

  ?>