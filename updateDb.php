<?php

include 'credentials.php';

$daytime=$_GET['daytime'];
$dtarray = explode("_",$daytime);
$name = $_GET['name'];
$id = $_GET['id'];
$deleteOrMove = $_GET['deleteOrMove'];

//print_r($dtarray);

$day = $dtarray[0];
$time = $dtarray[1]; 


//echo $deleteOrMove;

//echo $time;

//echo $name;

//      open connection to mysql db
$conn = mysqli_connect($host,$user,$pass,$db) or die("Error " . mysqli_error($conn));

    
if($deleteOrMove == 'move')
{
    $sq =  "UPDATE classes SET day=\"$day\", time=\"$time\" WHERE id=\"$id\"";

   // echo $sq;

   $result = mysqli_query($conn, $sq) or die("!!!!!Error" . mysqli_error($conn));
 
      if (mysqli_query($conn, $sq)) {
       echo "Record updated successfully";
// echo $day;

//  echo $time;

//  echo $name;
 

    } 
    else {  
            echo "Error updating record: " . mysqli_error($conn);
    }
}

elseif($deleteOrMove == 'delete'){
  
  $sq =  "DELETE FROM classes WHERE id=\"$id\"";

   // echo $sq;
   // die($sq);

   $result = mysqli_query($conn, $sq) or die("DEleted !Error" . mysqli_error($conn));
 
      if (mysqli_query($conn, $sq)) {
         echo "Record Deleted successfully";
//     echo $day;

// echo $time;

// echo $name;
    } 
    else {  
         echo "Error updating record: " . mysqli_error($conn);
    }
  
  
  
  
  
  
  
  
}

mysqli_close($conn);



?>