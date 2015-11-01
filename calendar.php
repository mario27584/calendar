<!--TEST TEST TEST CRedentials
parent of d0d7f2d... added a new line to explain why this file is important -->

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=*">
    <link rel="stylesheet" type="text/css" href="mycss.css"> 

       
</head>
<body>

<?php include 'connGetData.php';?>
<script type="text/JavaScript" src="processing.js"></script> 

   <br><br>
   <a id="showform" href'#' onclick='overlay()'> Add a new task</a>
    
<!--<br>-->
<div id="overlay" style="position:absolute;top:50%;left:20%;margin:-320px 0 0 -320px;">
 
<form action="createTask.php" method="POST">
    <legend>Insert New Task</legend><br>
   name: <input type="text" id="name" name="name"><br>
   day: <input type="text" id="day" name="day" ><br>
   time: <input type="text" id="time" name="time" ><br>
   
  <br> <input type="submit" id="submit" value="submit" name="submit">
  <a href="http://mvcalendar.azurewebsites.net/calendar.php">
  <input type="button" value="Cancel" />
</a>
</form>
</div>
<br><br><br>

<div id='menu' >


<ul id="navigation-bar">
     <br>
  <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Home</a></li> <br>
  <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Products</a></li><br>
  <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Services</a></li><br>
  <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">Press</a></li><br>
  <li><a href="http://mvcalendar.azurewebsites.net/calendar.php">About</a></li><br>
</ul>
</div>
<div id='panel' class="Table disp tmp" style=" position:absolute;top:40%;left:40%;margin:-250px 0 0 -220px">
    
    
    <div class="Heading">
        <div id="Cell">
            <p>Hour</p>
        </div>
        <div id="Cell">
            <p>Monday</p>
        </div>
        <div id="Cell">
            <p>Tuesday</p>
        </div>
        <div id="Cell">
            <p>Wednesday</p>
        </div>
        <div id="Cell"> 
            <p>Thursday</p>
        </div>
        <div id="Cell">
            <p>Friday</p>
        </div>
        <div id="Cell">
            <p>Saturday</p>
        </div>
        <div id="Cell">
            <p>Sunday</p>
        </div>
    </div>
    
    
    <div id="_8" class="Row">
        <div id="Cell" class="8">
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
    
    <div id="_9" class="Row">
        <div id="Cell" class="9">
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
    
    
    <div id="_10" class="Row">
        <div id="Cell" class="10" >
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
    
     <div id="_11" class="Row">
        <div id="Cell" class="11">
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
    
    <div id="_12" class="Row">
        <div id="Cell" class="12">
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
 
 <div id="_13" class="Row">
        <div id="Cell" class="13">
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
 
 <div id="_14" class="Row">
        <div id="Cell" class="14">
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
 
 <div id="_15" class="Row">
        <div id="Cell" class="15">
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
 
 <div id="_16" class="Row">
        <div id="Cell" class="16">
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
    
    
 <div id="_17" class="Row">
        <div id="Cell" class="17">
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
    
    
 <div id="_18" class="Row">
        <div id="Cell" class="18">
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

</body></html>