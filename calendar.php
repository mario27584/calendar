<<<<<<< HEAD
<!--TEST TEST TEST I wanna to revert laters -->
<!-- THIS IS ON GITHUB saved from url=(0042)file:///C:/Users/Mario/OneDrive/table.html -->
=======

<!-- saved from url=(0042)file:///C:/Users/Mario/OneDrive/table.html -->
>>>>>>> parent of dc4a6b4... h
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
        text-align: center;
    }
    .divtime, #Cell
    {
        display: table-cell;
        background-color: #b0c4de;
        border: solid;
        text-align: center;
        border-width: thin;
        width: 100px;
        max-width: 100px;
        height:  50px;
        max-height: 50px;
        border-right: 2px double blue;
        border-bottom: 2px double blue;
    }
    
   *{
       
       padding:0px;
       margin: 0px;
       
   }
   

   
 body {
        font-family: 'Vollkorn', serif;
        font-size: 20px;
        background-color:silver;
      }
      
      #overlay {
     visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;
     /*background-color:silver;*/
}
 
#overlay form {
     width:300px;
     margin: 100px auto;
     background-color:  #b0c4de;
     border:1px solid #000;
     padding:15px;
     text-align:center;
}


#showform{ 
   border-style: solid;
   border-width : 1px 4px 4px 1px;
   text-decoration : none;
   padding : 4px;
   border-color : #69f #00f #00f #69f;
   background-color: #b0c4de;
 }
 
 p{
     font-weight:bold;
     
 }
 
</style>
 

   
    
    
 </head>
<body>
<?php
        
//      open connection to mysql db
$connection = mysqli_connect("localhost","root","","schedule") or die("Error " . mysqli_error($connection));

      //fetch table rows from mysql db
     
$sql = "select * from classes";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
 
     //create an array
$class_array = array();
     
while($row = mysqli_fetch_assoc($result))
      {
          $class_array[] = $row;
         
      }
   
    // echo json_encode($class_array);
      
     echo "<script> var tasks=".json_encode($class_array)."</script>";
 
      //close the db connection
      mysqli_close($connection);

  ?>
 
        
    
    
<script>
    var size = 50;
    var id; 

// var tasks = [
// {
//      name: "Math",
//      time: "11",
//      day: "wednesday",
//      color:"blue"
//  },
//  {
//      name: "CS",
//      time: "10",
//      day: "monday",
//      color: "red"
//  }
// ];

function processData() {
    console.log("function is called");
    var elemList = [];
    for (var i = 0; i < tasks.length; i++) {
        var time = "_" + tasks[i].time;
        var day = tasks[i].day;
        var element = findTaskSpot(time, day+time);
        id = tasks[i].id;
        var newDiv = appendTask(element, tasks[i].name,tasks[i].color,id);
        elemList.push({node: newDiv, parent: element});
        
    }

    resizeChildren(elemList);
   // getDivPositions();
}

function findTaskSpot(time, day) {

    var cList = document.getElementById(time).getElementsByTagName("div");
    
    for (var j = 0; j < cList.length; j++) {
        var elem = cList[j];
        console.log("tag name:" + elem.tagName);
        if (elem.getAttribute("id") == day) {
            
            return elem;
        }
    }
}

function appendTask(element, name, color,id) {
    
        var newDiv = document.createElement("DIV");
        newDiv.style.zIndex="-1"
        newDiv.textContent = name;
        newDiv.contenteditable="true";
        newDiv.style.backgroundColor = color;
        newDiv.style.display = "block"; //horizontal
      //  newDiv.style.display = "inline-block"; vertical 
        newDiv.id = name+"_"+id;
        newDiv.name = name;
        newDiv.style.height = "50px";
        newDiv.draggable="true";
        newDiv.ondragstart=drag; 
        element.appendChild(newDiv);
        return newDiv;
}

function resizeChildren(elemList){
    for(var i=0; i <elemList.length; i++)
    {
        var numberChildren = elemList[i].parent.children.length;
     //   elemList[i].node.style.width = size/numberChildren+"px"; vertical
        elemList[i].node.style.height = size/numberChildren+"px";
        
    }
    
    
}


    

function secondResize(){
    var divs = document.getElementsByClassName("divtime");
    var numChild;
    var children;
    
   for (var i = 0; i < divs.length; i++) {
       
        numChild = divs[i].children.length;
        children = divs[i].children;
        console.log("number of children   :"+numChild);
        var newsize = size/numChild;
         for (var j = 0; j < children.length; j++) {
             //children[j].style.width = newsize+"px";
             children[j].style.height = newsize+"px";
             
         }
         
    }   
    
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  
     console.log("check where name gets lost :"+ev.target.name);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
   
    console.log("this is the id: "+data);
     console.log("check parent drop div : "+ev.target.id);
    console.log("check name  : "+name);
     var myTarget =  ev.target;
    if(ev.target.className != "divtime" ){
        myTarget = myTarget.parentNode;
    }  

    
    myTarget.appendChild(document.getElementById(data));
        
    secondResize();
    console.log("check target id: "+myTarget.id );
    console.log("child name: "+myTarget.childNode);
    var splitIdName = data.split('_');
    var name = splitIdName[0];
    var i_d=  splitIdName[1];
    loadXMLDoc(name, myTarget.id,i_d)
    
    
    
}

function loadXMLDoc(name,daytime,id)
{
 xmlhttp=new XMLHttpRequest();
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    
    }
  }
  var str = "updateDb.php?name="+name+"&daytime="+daytime+"&id="+id;
  //alert(str);
  console.log("file called: "+str)
xmlhttp.open("GET",str ,true);
xmlhttp.send();
}    
    
    
function overlay() {
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}



 
  window.onload =processData;
    
</script>   

    <div id="myDiv"></div>
   <br>
   <a id="showform" href'#' onclick='overlay()'> Add a new task</a>
    
<!--<br>-->
<div id="overlay" style=" position:absolute;top:50%;left:20%;margin:-250px 0 0 -250px"">
 
<form action="createTask.php" method="POST">
    <legend>Insert New Task</legend><br>
   name: <input type="text" id="name" name="name"><br>
   day: <input type="text" id="day" name="day" ><br>
   time: <input type="text" id="time" name="time" ><br>
   color: <input type="text" id="color" name="color" ><br>
  <br> <input type="submit" id="submit" value="submit" name="submit">
  <a href="http://localhost:8383/calendar.php">
  <input type="button" value="Cancel" />
</a>
</form>
</div>
<div id='panel' class="Table disp tmp" style=" position:absolute;top:40%;left:40%;margin:-250px 0 0 -250px">
    
    
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