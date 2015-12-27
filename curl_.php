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

echo "Number of movie trailers: ".sizeof($matches[1])."\n<br>";

// foreach ($matches as $k=>$us) {
//   foreach ($us as $u){
//       print("url: $u \n<br>");
  
//   }
// }
//var_dump($matches);

?>

<ol type="1">

<?php

   for($j=0; $j < sizeof($matches[1]); $j++){
        // print("<ol >");
         print("<li>");
         print($matches[1][$j]."<br>");
         print ($matches[2][$j]."</li><br>");
        
        
        
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