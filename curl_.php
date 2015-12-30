<?php
$sites[0] = 'http://www.traileraddict.com/';

// use this if you want to retrieve more than one page:
// $sites[1] = 'http://www.traileraddict.com/trailers/2';


foreach ($sites as $site)
{
    $ch = curl_init($site);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $html = curl_exec($ch);


 
 
// REGRX    /<a.*(href)="([^"]+).*class="m_title"[^>]*>([^<]*)/g   -----  groups \n$2 \n $3<------\n\n

$pattern = '/<a.*(?:href)="([^"]+).*class="m_title"[^>]*>([^<]*)/';
$matches="";

preg_match_all($pattern,$html,$matches );

//echo "Number of movie trailers: ".sizeof($matches[1])."\n<br>";



?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <!--<link rel="stylesheet" type="text/css" href="mycss.css"> -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    
</head>
<body style="background-color:white">
    
    
<nav class="navbar navbar-static-top navbar-custom1 "  style="background-color:#CFFF0D; color:black; font-weight: bold;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="color:black; font-weight: bold; ">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MVCalendar</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">About Us</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<ol class="list-group">
    

    <h2 style="color:#337ab7; font-weight: bold; "> New Movies:</h2>
    <br>
<?php


   for($j=0; $j < sizeof($matches[1]); $j++){
        // print("<ol >");
         print("<li class='list-group-item active' style='width:100%;'>");
         print ("<h3>".$matches[2][$j].":</h3>");
       //  print("<a href=\"".$matches[1][$j]."\">".$matches[1][$j]."</a></li><br>");
         
       print("<a style='color:white;' href=\"".$matches[1][$j]."\">".$matches[1][$j]."</a></li><br>");

        
        
      }




// $url = 'http://www.traileraddict.com/trailer/movie

  // now for the title we need to follow a similar process:

  // INSERT DB CODE HERE e.g.

 // $db_conn = mysql_connect('$host', '$user', '$password') or die('error');
  //mysql_select_db('$database', $db_conn) or die(mysql_error());

// $sql = "INSERT INTO trailers(url, title) VALUES ('".$url."', '".$title."')"

 // mysql_query($sql) or die(mysql_error()); 

 }
 

?>

            </ol>
       
</div>

</body>