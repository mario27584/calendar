<!--TEST TEST TEST CRedentials
parent of d0d7f2d... added a new line to explain why this file is important -->

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=*">
    <link rel="stylesheet" type="text/css" href="mycss.css"> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</head>
<body>

<?php include 'connGetData.php';?>
<script type="text/JavaScript" src="processing.js"></script> 

  
   
   
   
   
   
 
<!--------------------     begining of hidden background div overlay  --------------------------> 
    

<div id="overlay" style="position:absolute;">
    
    
<!--------------------    begining of  create task hidden form  ----------------->
 
<form action="createTask.php" method="POST" style="position:absolute;top:25%;left:35%;">
    <legend>Insert New Task</legend><br>
   name: <input type="text" id="name" name="name"><br>
   day: <input type="text" id="day" name="day" ><br>
   time: <input type="text" id="time" name="time" ><br>
   <br> <input type="submit" id="submit" value="submit" name="submit">
  <a href="http://mvcalendar.azurewebsites.net/calendar.php">
  <input type="button" value="Cancel">
</a>
</form>
<!------------------    end create task hidden form     --------------------------->
</div>



<!--------------------      end of hidden background div overlay  ------------------------------->
<img src="ecuador.jpg" id="logo-ecuador" alt="ecuador">




<!--------------------      begining of navigation bar div ----------------------------------------->
<!--<div id="nav-bar"  >
    <img src="menu_icon.jpg"  id="menu_icon" width="50px" height="50px" />
<ul class="nav" >
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Home</a></li>
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">News</a></li>
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Blog</a></li>
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">About</a></li>
    <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Home</a></li>
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">News</a></li>
	<li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Blog</a></li>
	
	
</ul>
</div>-->


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
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
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
<!-----------------------------      end of navigation bar  ----------------------------------------->
<!-----------------------------------  begining of calendar table --------------------------------------------------->
<div id='calendar'>

<!--<a id="showform" href'#' onclick='overlay()'> Add a new task</a>-->
   <input type="submit" class='button1' href'#' onclick='overlay()' value="Add a new task">
    
 <!------------------table headings horizontal --------------------->
 
    <div class="Heading">
        
        <div class="Cell">
            <p>Hour</p>
        </div>
        <div class="Cell">
            <p>Monday</p>
        </div>
        <div class="Cell">
            <p>Tuesday</p>
        </div>
        <div class="Cell">
            <p>Wednesday</p>
        </div>
        <div class="Cell"> 
            <p>Thursday</p>
        </div>
        <div class="Cell">
            <p>Friday</p>
        </div>
        <div class="Cell">
            <p>Saturday</p>
        </div>
        <div class="Cell">
            <p>Sunday</p>
        </div>
    </div>
    
 <!--------------------    end table headings horizontal  ------------------->
 
 
<!--begining time cells and cells to populate inside the table -------------------------------- -->
    <div id="_8" class="Rowe">
        <div class="Cell">
            <p>8</p>
        </div>
        <div id="monday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_8" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
    
    <div id="_9" class="Rowe">
        <div class="Cell 9">
            <p>9</p>
        </div>
        <div id="monday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_9" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
    
    
    <div id="_10" class="Rowe">
        <div class="Cell 10" >
            <p>10</p>
        </div>
        <div id="monday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        </div>
        <div id="tuesday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
           
        </div>
         <div id="thursday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
            
        </div>
        
          <div id="saturday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_10" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
        
        
    </div>
    
     <div id="_11" class="Rowe">
        <div class="Cell 11">
           <p>11</p>
        </div>
        <div id="monday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
         <div id="thursday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
         <div id="friday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
       
        </div>
          <div id="saturday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_11" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
        
    </div>
    
    <div id="_12" class="Rowe">
        <div class="Cell 12">
            <p>12</p>
        </div>
        <div id="monday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_12" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
 
 <div id="_13" class="Rowe">
        <div class="Cell 13">
            <p>13</p>
        </div>
        <div id="monday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_13" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
 
 <div id="_14" class="Rowe">
        <div class="Cell 14">
            <p>14</p>
        </div>
        <div id="monday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_14" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
 
 <div id="_15" class="Rowe">
        <div class="Cell 15">
            <p>15</p>
        </div>
        <div id="monday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_15" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
 
 <div id="_16" class="Rowe">
        <div class="Cell 16">
            <p>16</p>
        </div>
        <div id="monday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_16" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
    
    
 <div id="_17" class="Rowe">
        <div class="Cell 17">
            <p>17</p>
        </div>
        <div id="monday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_17" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
    
    
 <div id="_18" class="Rowe">
        <div class="Cell 18">
            <p>18</p>
        </div>
        <div id="monday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
        <div id="tuesday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
          
        </div>
         <div id="wednesday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="thursday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="friday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
           
        </div>
        
          <div id="saturday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)">
            
        </div>
         <div id="sunday_18" class="divtime" ondrop="drop(event)" ondragover="allowDrop(event)" >
        
    </div>
    </div>
    
</div>
</div>

</body></html>