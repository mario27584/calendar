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



//      open connection to mysql db
$conn = mysqli_connect($host,$user,$pass,$db) or die("Error " . mysqli_error($conn));
//$conn = mysqli_connect("localhost","root","","schedule") or die("Error " . mysqli_error($conn));
    
if($deleteOrMove == 'move')
{
    $sq =  "UPDATE classes SET day=\"$day\", time=\"$time\" WHERE id=\"$id\"";

   // echo $sq;

   $result = mysqli_query($conn, $sq) or die("!!!!!Error" . mysqli_error($conn));
 
      if (mysqli_query($conn, $sq)) {
       echo "<p>Record updated successfully</p>";
       echo '<script language="javascript">';
        echo 'alert("message successfully sent")';
        echo '</script>';

    } 
    else {  
            echo "Error updating record: " . mysqli_error($conn);
    }
}

elseif($deleteOrMove == 'delete'){
  
  $sq =  "DELETE FROM classes WHERE id=\"$id\"";

   
   $result = mysqli_query($conn, $sq) or die("DEleted !Error" . mysqli_error($conn));
 
      if (mysqli_query($conn, $sq)) {
         echo "Record Deleted successfully";
            echo '<script language="javascript">';
        echo 'alert("message sucdeleteeeecessfully sent")';
        echo '</script>';
    } 
    else {  
         echo "Error updating record: " . mysqli_error($conn);
    }
  
  
  
}

mysqli_close($conn);



?>