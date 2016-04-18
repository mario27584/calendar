<?php
// $servername = "localhost";
// $username = "root";
// $dbname = "schedule";


include 'credentials.php';


//      open connection to mysql db

$connection = mysqli_connect($host,$user,$pass,$db) or die("Error " . mysqli_error($connection));




// // Create connection
// $conn = new mysqli($servername, $username,"", $dbname);

// // Check connection
// if (mysqli_connect_errno()) {
//     die("Connection failed: " . $conn->connect_error);
// } 



if (isset($_POST['name']) || isset($_POST['pass'])) {
    // form submitted 
    // check for required values 
    if (empty($_POST['name'])) {
        echo "<script language=javascript>
			alert('Please enter a username!');
			window.location.reload();
		</script>";
    }
    if (empty($_POST['pass'])) {
        echo "<script language=javascript>
			alert('Please enter a password!');
			window.location.reload();
		</script>";
    }
    
   // var_dump($_POST('name'));
    
	$query = "SELECT user_name, password FROM users WHERE user_name = '" . $_POST['name'] . "' AND password = '" . $_POST['pass'] . "'";
	
    // execute query 
    $result = mysqli_query($connection,$query);
	var_dump($result);
 	
    // see if any rows were returned 
    if (mysqli_num_rows($result)) {
		
        // if a row was returned 
        // authentication was successful 
        // create session and set cookie with username 
        session_start();
		$query  = "UPDATE users SET Logged_in=1 WHERE user_name ='" .$_POST['name']."'";
         mysqli_query($connection, $query);
		//die( $query);

        $_SESSION['auth'] = 1;
	
        setcookie("Username", $_POST['name'], time() + (184600 * 30));
		$user= $_POST['name'];	
        header('Location: calendar');
        echo "Access granted!"; 
        
    } else {
        // no result 
        // authentication failed 
        echo "<script language=javascript>
            alert('Please enter a valid username and password.');
            window.location.href='login';
        </script>"; //"ERROR: Incorrect username or password!";
        
    }
    
    
    mysql_free_result($result);
    
     
   mysqli_close($connection);
} 


else {
    
?> 
    <html> 
    <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		 <link rel="stylesheet" type="text/css" href="loginStyle.css"> 
	      <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			
	
    </head> 
	
    <body> 
    
	<div class="container">

      <form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <h2 class="form-signin-heading">&nbsp;&nbsp;&nbsp;Sign in to Calendar</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="name" name="name"  class="form-control" placeholder="User Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
	
	
    
    </body> 
    </html> 
<?php
}

?>