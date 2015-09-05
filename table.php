
<!-- saved from url=(0042)file:///C:/Users/Mario/OneDrive/table.html -->
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
        border: solid;
        text-align: center;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
        width: 40px;
        height:  40px;
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
    var size = 100;

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
        var newDiv = appendTask(element, tasks[i].name,tasks[i].color);
        elemList.push({node: newDiv, parent: element});
        
    }

    resizeChildren(elemList);
   //s getDivPositions();
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

function appendTask(element, name, color) {
    
        var newDiv = document.createElement("DIV");
        newDiv.textContent = name;
        newDiv.style.backgroundColor = color;
        newDiv.style.display = "inline-block";
        newDiv.id = name;
     // newDiv.style.position = "absolute";
        newDiv.onmousedown = move;
        element.appendChild(newDiv);
        return newDiv;
}

function resizeChildren(elemList){
    for(var i=0; i <elemList.length; i++)
    {
        var numberChildren = elemList[i].parent.children.length;
        elemList[i].node.style.width = size/numberChildren+"px";
        elemList[i].node.style.height = size+"px";
        
    }
    
    
}

function move() {
  //  console.log("function move " + this);
    var targetdiv = this;

    var y = this.offsetTop;
    var x = this.offsetLeft;
    
     var mousex = event.clientX 
     var mousey = event.clientY
     
     var offsety = mousey-y;// mouse - box
     var offsetx = mousex-x;     

    //console.log(y + " y position");
    this.onmousemove = function () {
       // console.log("new position")
        var newX = event.clientX-offsetx;
        var newY = event.clientY-offsety;
      //  console.log("client y" + newY)
       // console.log("onmousemove target" + targetdiv);
        targetdiv.style.position = "absolute";
       
        targetdiv.style.top = newY + "px";
        targetdiv.style.left = newX + "px";
       


    }

    this.onmouseup = function () {
        var my =  event.clientY;
        var mx =  event.clientX;
        this.onmousemove = null;
     //   targetdiv.style.position = "static";   
    
     
     //parent.removeChild(targetdiv);
     //console.log("parent---> "+ parent.id);
      
       getDivPositions(my,mx,targetdiv);
       var parent = targetdiv.parentNode;
      console.log("parent---> "+ parent.id);
        
    }

}


function getDivPositions(top,left,targetdiv){
    console.log("getDivPositions");
    
    var divs = document.getElementsByClassName("divtime");
    
    for (var i = 0; i < divs.length; i++) {
       
        var divy = divs[i].offsetTop;
        var divx = divs[i].offsetLeft;
          
       var id = divs[i].getAttributeNode("id").value;
    //    console.log("get id ... "+id);
        var element_ = document.getElementById(id);
      //  console.log("height :"+element_.clientHeight);
     //    console.log("width :"+element_.clientWidth);
     var dy = divy+element_.clientHeight;
     var dx = divx+element_.clientWidth;
     console.log("TATH TOP LEFT ", top+" "+left+" "+dy+" "+ dx);
        if ((divy+element_.clientHeigh > top && divy < top ) && (left > divx && left < divx+element_.clientWidth)) {
           // divs[i].appendChild(targetdiv);
           element.appendChild(targetdiv);
               console.log("checking ..... div ");           
        }
          
      //  console.log("position div: "+divx);
    }
    
}
 
 
 
  window.onload =processData;
    
</script>    
    

    
    
<div id='panel' class="Table disp tmp" style=" position:absolute;top:50%;left:50%;margin:-250px 0 0 -250px">
    <div class="Title">
        <p>Schedule</p>
    </div>
    
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
    </div>
    
    
    
    <div id="_10" class="Row">
        <div id="Cell" class="10" >
            <p>10</p>
        </div>
        <div id="monday_10" class="divtime"  >
            
        </div>
        <div id="tuesday_10" class="divtime" >
            
        </div>
         <div id="wednesday_10" class="divtime"  >
           
        </div>
         <div id="thursday_10" class="divtime">
            
        </div>
         <div id="friday_10" class="divtime" >
            
        </div>
    </div>
    
     <div id="_11" class="Row">
        <div id="Cell" class="11">
            <p>11</p>
        </div>
        <div id="monday_11" class="divtime">
            
        </div>
        <div id="tuesday_11" class="divtime">
          
        </div>
         <div id="wednesday_11" class="divtime">
           
        </div>
         <div id="thursday_11" class="divtime">
           
        </div>
         <div id="friday_11" class="divtime">
          
        </div>
    </div>
    
    <div id="_12" class="Row">
        <div id="Cell" class="12">
            <p>12</p>
        </div>
        <div id="monday_12" class="divtime">
            
        </div>
        <div id="tuesday_12" class="divtime">
          
        </div>
         <div id="wednesday_12" class="divtime">
            
        </div>
         <div id="thursday_12" class="divtime">
            
        </div>
         <div id="friday_12" class="divtime">
           
        </div>
    </div>
 
</div>

</body></html>