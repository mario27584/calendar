<?php
$username = 'root';
$password = '';
mysqli_connect("localhost", $username, $password)
	or die('Unable to connect to server:' . mysql_error());

$sort = (isset($_GET[sort])) ? $_GET[sort] : 'id';
$database = 'sorting';
mysqli_select_db($database)
	or die('Unable to select database:' . mysql_error());
	
	
$sort = $_GET[sort];	


$query = "SELECT id, time, room FROM conference_sessions as cs ORDER BY $sort"; 
//$results = $persons;
$sessions = mysql_query($query)
 or die('Query failed:' . mysql_error());

$rows = mysql_num_rows($sessions);

//echo "Query returned $rows rows";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body{
	text-align:center;
	}
table{ align:center;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fiinal Project</title>
<link href="../shared.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#66CCFF">  
<div id="wrapper">
<h1>Final Conference</h1>
<table border="1">
	<tr>
    	<td>Sessions</td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'],'?sort=id';
	  echo ($sort=='id ASC') ? ' DESC':' ASC';?>">Time</a></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF'],'?sort=time';
	  echo ($sort=='time ASC') ? ' DESC':' ASC';?>">Room</a></td>
  
    </tr>

<?php
//$person = mysql_fetch_assoc($persons);
//echo '<pre>', print_r($person), '</pre>';
while($session = mysql_fetch_assoc($sessions)) {
 $time = date("F j, Y, g:i a",$session['time']);
	$link = "<a href='papers.php?id=$session[id]'>&plusmn;</a>";
	echo "<tr><td>$link</td>",
	     "<td>$time</td>",
	   	 "<td>$session[room]</td>",
		 "</tr>";              
}



?>
</table>

</div>
</body>

</html>