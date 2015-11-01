<?php
 //var_dump($_POST);   
   
 include 'credentials.php';
    
if(isset($_POST['submit']))
{


//      open connection to mysql db
$conn = mysqli_connect($host,$user,$pass,$db) or die("@@@@Error " . mysqli_error($conn));

$name = $_POST['name'];
//echo "name: ".$name;
$time = $_POST['time'];
$day = strtolower($_POST['day']);
//$color = $_POST['color'];
$name = preg_replace('/\s+/', '', $name);

if($name && $time && $day){
    

$sql = "INSERT INTO classes (name,time,day) VALUES (\"$name\",\"$time\",\"$day\")";
$result = mysqli_query($conn, $sql) or die("Error" . mysqli_error($conn));

 if ($result) {
    echo "Record updated successfully";
    echo"<br>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
}

else {
    echo "NOT SUBMITED";
    
}


echo <"a href=http://mvcalendar.azurewebsites.net/calendar.php"> Go Back </a>;

//echo "<a href=http://localhost:8383/calendar/calendar.php>GO BACK</a>";

?>