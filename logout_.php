<?php 
// $servername = "localhost";
// $username = "root";
// $dbname = "schedule";

// // Create connection
// $conn = new mysqli($servername, $username,"", $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

include 'credentials.php';


//      open connection to mysql db

$connection = mysqli_connect($host,$user,$pass,$db) or die("Error " . mysqli_error($connection));



session_start();

$query= "UPDATE users SET Logged_in=0 WHERE user_name = '" . $_COOKIE['Username'] . "' "; 
//$query= "UPDATE users SET Logged_in = 0 WHERE Logged_in = 1 "; 
mysqli_query($connection,$query);

//setcookie("user_name", NULL, mktime() - 3600, "/");
$_SESSION['auth'] = 0; 
session_destroy();
header('Location: login.php'); 
?>