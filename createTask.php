<?php
 //var_dump($_POST);   
    
if(isset($_POST['submit']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';


//      open connection to mysql db
$conn = mysqli_connect("localhost","root","","schedule") or die("@@@@Error " . mysqli_error($conn));


$name = $_POST['name'];
//echo "name: ".$name;
$time = $_POST['time'];
$day = $_POST['day'];
$color = $_POST['color'];

if($name && $time && $day && $color){
    

$sql = "INSERT INTO classes (name,time,day,color) VALUES (\"$name\",\"$time\",\"$day\",\"$color\")";
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


//echo "<a href=\"javascript:window.location.reload(history.go(-2));\">Back<a>";

echo "<a href=http://localhost:8383/calendar/calendar.php>GO BACK</a>";

?>