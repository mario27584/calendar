var size = 50;
var id; 
var show =  1;
        
        
        
        
var colors = ['#558C89','#74AFAD','#D9853B','#ECECEA','#DE1B1B','#E9E581', '#4A96AD', '#FFE658', '#C1E1A6','#FF9009','#DF3D82','#CBE32D'];
        
        //myDiv.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        
        
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
                console.log("printing each element of tasks array : "+tasks[i].time+", "+tasks[i].day+", "+tasks[i].name);
                var time = "_" + tasks[i].time;
                var day = tasks[i].day;
                var element = findTaskSpot(time, day+time);
                id = tasks[i].id;
                var newDiv = appendTask(element, tasks[i].name,tasks[i].color,id);
                elemList.push({node: newDiv, parent: element});
                resizeChildren(elemList);
            }
        
            //resizeChildren(elemList);
            checkWindowSize();   
     //       alert("width is ---> "+document.body.clientWidth);
           
           
        
        }
        
function findTaskSpot(time, day) {
        
            var cList = document.getElementById(time).getElementsByTagName("div");
            
            for (var j = 0; j < cList.length; j++) {
                var elem = cList[j];
                console.log("tag name:" + elem.tagName);
                
                if (elem.getAttribute("id") == day) {
                    console.log("returned element is : "+elem.id);
                    return elem;
                }
            }
        }
        
        
function appendTask(element, name, color,id) {
            
                var newDiv = document.createElement("DIV");
                newDiv.style.zIndex="-1"
                newDiv.textContent = name;
                newDiv.contenteditable="true";
                newDiv.style.display = "block"; //horizontal   and  //newDiv.style.display = "inline-block"; // vertical 
                newDiv.id = name+"_"+id;
                newDiv.className = "textInsideTaskDiv";
                newDiv.name = name;
                newDiv.style.height = "50px";
                newDiv.style.fontWeight = "bold"; 
                newDiv.style.color = "black";
            
                newDiv.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                // newDiv.contentEditable ="true";
                newDiv.draggable="true";
                newDiv.ondragstart=drag; 
                
            
                var imgX = document.createElement("IMG");
                imgX.setAttribute("src", "x.jpg");
                imgX.setAttribute("class","deleteDiv");  // newDiv.id  = math_88  ---- math_88
                imgX.setAttribute("id",newDiv.id);
                imgX.setAttribute("alt", "delete");
                imgX.onclick = function () {
                                                var deleteOrMove = "delete";
                                                var day_time = imgX.parentNode.parentNode.id;
                                                var name_id = imgX.id.split('_');
                                                var name = name_id[0];
                                                var id = name_id[1];
                                                document.getElementById(this.id).remove();
                                        
                                                secondResize();
                                                loadXMLDoc(name,day_time,id,deleteOrMove);
                }
            newDiv.appendChild(imgX);
            element.appendChild(newDiv);
            console.log("this is appending or not???????")
            return newDiv;
        }
        
function resizeChildren(elemList){
            for(var i=0; i <elemList.length; i++)
            {
                var numberChildren = elemList[i].parent.children.length;
                //vertical
            // elemList[i].node.style.width = size/numberChildren+"px";
                
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
            var deleteOrMove="move";
            console.log("What is this id???..."+i_d)
            loadXMLDoc(name, myTarget.id,i_d,deleteOrMove)
            
        }
        
function loadXMLDoc(name,daytime,id,deleteOrMove)
        {
        xmlhttp=new XMLHttpRequest();
        
        xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
        //  document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                //alert(xmlhttp.responseText);
            }
        }
        var str = "updateDb.php?name="+name+"&daytime="+daytime+"&id="+id+"&deleteOrMove="+deleteOrMove;
        // alert(str);
        console.log("file called: "+str)
        xmlhttp.open("GET",str ,true);
        xmlhttp.send();
        
        }    
            
            
function overlay() {
    
            el = document.getElementById("overlay");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
        }
        
        
function checkWindowSize(){
    
    
    
        if (document.body.clientWidth > 800){
          
            
                    document.getElementById("sunday_cell").style.display = "table-cell";
                     document.getElementById("sunday_7").style.display = "table-cell";
                    document.getElementById("sunday_8").style.display = "table-cell";
                    document.getElementById("sunday_9").style.display = "table-cell";
                    document.getElementById("sunday_10").style.display = "table-cell";
                    document.getElementById("sunday_11").style.display = "table-cell";
                    document.getElementById("sunday_12").style.display = "table-cell";
                    document.getElementById("sunday_13").style.display = "table-cell";
                    document.getElementById("sunday_14").style.display = "table-cell";
                    document.getElementById("sunday_15").style.display = "table-cell";
                    document.getElementById("sunday_16").style.display = "table-cell";
                    document.getElementById("sunday_17").style.display = "table-cell";
                    document.getElementById("sunday_18").style.display = "table-cell";
                     document.getElementById("sunday_19").style.display = "table-cell";
                    
                    document.getElementById("saturday_cell").style.display = "table-cell";
                    document.getElementById("saturday_7").style.display = "table-cell";
                    document.getElementById("saturday_8").style.display = "table-cell";
                    document.getElementById("saturday_9").style.display = "table-cell";
                    document.getElementById("saturday_10").style.display = "table-cell";
                    document.getElementById("saturday_11").style.display = "table-cell";
                    document.getElementById("saturday_12").style.display = "table-cell";
                    document.getElementById("saturday_13").style.display = "table-cell";
                    document.getElementById("saturday_14").style.display = "table-cell";
                    document.getElementById("saturday_15").style.display = "table-cell";
                    document.getElementById("saturday_16").style.display = "table-cell";
                    document.getElementById("saturday_17").style.display = "table-cell";
                    document.getElementById("saturday_18").style.display = "table-cell";
                    document.getElementById("saturday_19").style.display = "table-cell";
                    
                    document.getElementById("friday_cell").style.display = "table-cell";
                    document.getElementById("friday_7").style.display = "table-cell";
                    document.getElementById("friday_8").style.display = "table-cell";
                    document.getElementById("friday_9").style.display = "table-cell";
                    document.getElementById("friday_10").style.display = "table-cell";
                    document.getElementById("friday_11").style.display = "table-cell";
                    document.getElementById("friday_12").style.display = "table-cell";
                    document.getElementById("friday_13").style.display = "table-cell";
                    document.getElementById("friday_14").style.display = "table-cell";
                    document.getElementById("friday_15").style.display = "table-cell";
                    document.getElementById("friday_16").style.display = "table-cell";
                    document.getElementById("friday_17").style.display = "table-cell";
                    document.getElementById("friday_18").style.display = "table-cell";
                    document.getElementById("friday_19").style.display = "table-cell";
                    
                    document.getElementById("thursday_cell").style.display = "table-cell";
                    document.getElementById("thursday_7").style.display = "table-cell";
                    document.getElementById("thursday_8").style.display = "table-cell";
                    document.getElementById("thursday_9").style.display = "table-cell";
                    document.getElementById("thursday_10").style.display = "table-cell";
                    document.getElementById("thursday_11").style.display = "table-cell";
                    document.getElementById("thursday_12").style.display = "table-cell";
                    document.getElementById("thursday_13").style.display = "table-cell";
                    document.getElementById("thursday_14").style.display = "table-cell";
                    document.getElementById("thursday_15").style.display = "table-cell";
                    document.getElementById("thursday_16").style.display = "table-cell";
                    document.getElementById("thursday_17").style.display = "table-cell";
                    document.getElementById("thursday_18").style.display = "table-cell";
                   document.getElementById("thursday_19").style.display = "table-cell";
                    
                    document.getElementById("wednesday_cell").style.display = "table-cell";
                    document.getElementById("wednesday_7").style.display = "table-cell";
                    document.getElementById("wednesday_8").style.display = "table-cell";
                    document.getElementById("wednesday_9").style.display = "table-cell";
                    document.getElementById("wednesday_10").style.display = "table-cell";
                    document.getElementById("wednesday_11").style.display = "table-cell";
                    document.getElementById("wednesday_12").style.display = "table-cell";
                    document.getElementById("wednesday_13").style.display = "table-cell";
                    document.getElementById("wednesday_14").style.display = "table-cell";
                    document.getElementById("wednesday_15").style.display = "table-cell";
                    document.getElementById("wednesday_16").style.display = "table-cell";
                    document.getElementById("wednesday_17").style.display = "table-cell";
                    document.getElementById("wednesday_18").style.display = "table-cell";
                    document.getElementById("wednesday_19").style.display = "table-cell";
                    
                    document.getElementById("tuesday_cell").style.display = "table-cell";
                    document.getElementById("tuesday_7").style.display = "table-cell";
                    document.getElementById("tuesday_8").style.display = "table-cell";
                    document.getElementById("tuesday_9").style.display = "table-cell";
                    document.getElementById("tuesday_10").style.display = "table-cell";
                    document.getElementById("tuesday_11").style.display = "table-cell";
                    document.getElementById("tuesday_12").style.display = "table-cell";
                    document.getElementById("tuesday_13").style.display = "table-cell";
                    document.getElementById("tuesday_14").style.display = "table-cell";
                    document.getElementById("tuesday_15").style.display = "table-cell";
                    document.getElementById("tuesday_16").style.display = "table-cell";
                    document.getElementById("tuesday_17").style.display = "table-cell";
                    document.getElementById("tuesday_18").style.display = "table-cell";
                    document.getElementById("tuesday_19").style.display = "table-cell";
                    
                    document.getElementById("monday_cell").style.display = "table-cell";
                    document.getElementById("monday_7").style.display = "table-cell";
                    document.getElementById("monday_8").style.display = "table-cell";
                    document.getElementById("monday_9").style.display = "table-cell";
                    document.getElementById("monday_10").style.display = "table-cell";
                    document.getElementById("monday_11").style.display = "table-cell";
                    document.getElementById("monday_12").style.display = "table-cell";
                    document.getElementById("monday_13").style.display = "table-cell";
                    document.getElementById("monday_14").style.display = "table-cell";
                    document.getElementById("monday_15").style.display = "table-cell";
                    document.getElementById("monday_16").style.display = "table-cell";
                    document.getElementById("monday_17").style.display = "table-cell";
                    document.getElementById("monday_18").style.display = "table-cell";
                    document.getElementById("monday_19").style.display = "table-cell";
                    
                    
                    
            
        }
            
            
            
            
        else  if(document.body.clientWidth < 800)
        {
            
         // alert("width is ---> "+document.body.clientWidth);
                    document.getElementById("sunday_cell").style.display = "none";
                     document.getElementById("sunday_7").style.display = "none";
                    document.getElementById("sunday_8").style.display = "none";
                    document.getElementById("sunday_9").style.display = "none";
                    document.getElementById("sunday_10").style.display = "none";
                    document.getElementById("sunday_11").style.display = "none";
                    document.getElementById("sunday_12").style.display = "none";
                    document.getElementById("sunday_13").style.display = "none";
                    document.getElementById("sunday_14").style.display = "none";
                    document.getElementById("sunday_15").style.display = "none";
                    document.getElementById("sunday_16").style.display = "none";
                    document.getElementById("sunday_17").style.display = "none";
                    document.getElementById("sunday_18").style.display = "none";
                    document.getElementById("sunday_19").style.display = "none";
                    
                    document.getElementById("saturday_cell").style.display = "none";
                    document.getElementById("saturday_7").style.display = "none";
                    document.getElementById("saturday_8").style.display = "none";
                    document.getElementById("saturday_9").style.display = "none";
                    document.getElementById("saturday_10").style.display = "none";
                    document.getElementById("saturday_11").style.display = "none";
                    document.getElementById("saturday_12").style.display = "none";
                    document.getElementById("saturday_13").style.display = "none";
                    document.getElementById("saturday_14").style.display = "none";
                    document.getElementById("saturday_15").style.display = "none";
                    document.getElementById("saturday_16").style.display = "none";
                    document.getElementById("saturday_17").style.display = "none";
                    document.getElementById("saturday_18").style.display = "none";
                    document.getElementById("saturday_19").style.display = "none";
                    
                    document.getElementById("friday_cell").style.display = "none";
                    document.getElementById("friday_7").style.display = "none";
                    document.getElementById("friday_8").style.display = "none";
                    document.getElementById("friday_9").style.display = "none";
                    document.getElementById("friday_10").style.display = "none";
                    document.getElementById("friday_11").style.display = "none";
                    document.getElementById("friday_12").style.display = "none";
                    document.getElementById("friday_13").style.display = "none";
                    document.getElementById("friday_14").style.display = "none";
                    document.getElementById("friday_15").style.display = "none";
                    document.getElementById("friday_16").style.display = "none";
                    document.getElementById("friday_17").style.display = "none";
                    document.getElementById("friday_18").style.display = "none";
                    document.getElementById("friday_19").style.display = "none";
                    
                    document.getElementById("thursday_cell").style.display = "none";
                    document.getElementById("thursday_7").style.display = "none";
                    document.getElementById("thursday_8").style.display = "none";
                    document.getElementById("thursday_9").style.display = "none";
                    document.getElementById("thursday_10").style.display = "none";
                    document.getElementById("thursday_11").style.display = "none";
                    document.getElementById("thursday_12").style.display = "none";
                    document.getElementById("thursday_13").style.display = "none";
                    document.getElementById("thursday_14").style.display = "none";
                    document.getElementById("thursday_15").style.display = "none";
                    document.getElementById("thursday_16").style.display = "none";
                    document.getElementById("thursday_17").style.display = "none";
                    document.getElementById("thursday_18").style.display = "none";
                    document.getElementById("thursday_19").style.display = "none";
                    
                    document.getElementById("wednesday_cell").style.display = "none";
                    document.getElementById("wednesday_7").style.display = "none";
                    document.getElementById("wednesday_8").style.display = "none";
                    document.getElementById("wednesday_9").style.display = "none";
                    document.getElementById("wednesday_10").style.display = "none";
                    document.getElementById("wednesday_11").style.display = "none";
                    document.getElementById("wednesday_12").style.display = "none";
                    document.getElementById("wednesday_13").style.display = "none";
                    document.getElementById("wednesday_14").style.display = "none";
                    document.getElementById("wednesday_15").style.display = "none";
                    document.getElementById("wednesday_16").style.display = "none";
                    document.getElementById("wednesday_17").style.display = "none";
                    document.getElementById("wednesday_18").style.display = "none";
                    document.getElementById("wednesday_19").style.display = "none";
                    
                    document.getElementById("tuesday_cell").style.display = "none";
                    document.getElementById("tuesday_7").style.display = "none";
                    document.getElementById("tuesday_8").style.display = "none";
                    document.getElementById("tuesday_9").style.display = "none";
                    document.getElementById("tuesday_10").style.display = "none";
                    document.getElementById("tuesday_11").style.display = "none";
                    document.getElementById("tuesday_12").style.display = "none";
                    document.getElementById("tuesday_13").style.display = "none";
                    document.getElementById("tuesday_14").style.display = "none";
                    document.getElementById("tuesday_15").style.display = "none";
                    document.getElementById("tuesday_16").style.display = "none";
                    document.getElementById("tuesday_17").style.display = "none";
                    document.getElementById("tuesday_18").style.display = "none";
                    document.getElementById("tuesday_19").style.display = "none";
                    
                    document.getElementById("monday_cell").style.display = "table-cell";
                    document.getElementById("monday_7").style.display = "table-cell";
                    document.getElementById("monday_8").style.display = "table-cell";
                    document.getElementById("monday_9").style.display = "table-cell";
                    document.getElementById("monday_10").style.display = "table-cell";
                    document.getElementById("monday_11").style.display = "table-cell";
                    document.getElementById("monday_12").style.display = "table-cell";
                    document.getElementById("monday_13").style.display = "table-cell";
                    document.getElementById("monday_14").style.display = "table-cell";
                    document.getElementById("monday_15").style.display = "table-cell";
                    document.getElementById("monday_16").style.display = "table-cell";
                    document.getElementById("monday_17").style.display = "table-cell";
                    document.getElementById("monday_18").style.display = "table-cell";
                    document.getElementById("monday_19").style.display = "table-cell";
                    
                    document.getElementById("arrow-left").style.display = "none";
                    
                    
           
        }


arrows();
              
}

function arrows(){
    
    var sunday = document.getElementById("sunday_cell").style.display;
    var monday = document.getElementById("monday_cell").style.display;
    
    if (sunday == "table-cell" && monday == "table-cell" ) {
    
        document.getElementById("arrow-left").style.display = "none";
        document.getElementById("arrow-right").style.display = "none";
        
    }
    
  if (sunday == "none" && monday == "table-cell"){
        document.getElementById("arrow-right").style.display = "inline";
        
        
    }
    
    
    
    
}

function moveNext(){
   
    console.log("arrow is cliked");
   
    console.log("monday disp -> "+document.getElementById('monday_cell').style.display);
    
    if(document.getElementById('monday_cell').style.display =="table-cell"){
        
                    document.getElementById('monday_cell').style.display="none";
                    document.getElementById("monday_7").style.display = "none";
                    document.getElementById("monday_8").style.display = "none";
                    document.getElementById("monday_9").style.display = "none";
                    document.getElementById("monday_10").style.display = "none";
                    document.getElementById("monday_11").style.display = "none";
                    document.getElementById("monday_12").style.display = "none";
                    document.getElementById("monday_13").style.display = "none";
                    document.getElementById("monday_14").style.display = "none";
                    document.getElementById("monday_15").style.display = "none";
                    document.getElementById("monday_16").style.display = "none";
                    document.getElementById("monday_17").style.display = "none";
                    document.getElementById("monday_18").style.display = "none";
                    document.getElementById("monday_19").style.display = "none";
                    
                    
                    document.getElementById("tuesday_cell").style.display = "table-cell";
                    document.getElementById("tuesday_7").style.display = "table-cell";
                    document.getElementById("tuesday_8").style.display = "table-cell";
                    document.getElementById("tuesday_9").style.display = "table-cell";
                    document.getElementById("tuesday_10").style.display = "table-cell";
                    document.getElementById("tuesday_11").style.display = "table-cell";
                    document.getElementById("tuesday_12").style.display = "table-cell";
                    document.getElementById("tuesday_13").style.display = "table-cell";
                    document.getElementById("tuesday_14").style.display = "table-cell";
                    document.getElementById("tuesday_15").style.display = "table-cell";
                    document.getElementById("tuesday_16").style.display = "table-cell";
                    document.getElementById("tuesday_17").style.display = "table-cell";
                    document.getElementById("tuesday_18").style.display = "table-cell";
                    document.getElementById("tuesday_19").style.display = "table-cell";
                    
                    document.getElementById("arrow-left").style.display = "inline";
    }
    
   else if(document.getElementById('tuesday_cell').style.display =="table-cell")
    {
        
        console.log("tuesday going to wedesday");
                     document.getElementById('monday_cell').style.display="none";
                     document.getElementById("monday_7").style.display = "none";
                    document.getElementById("monday_8").style.display = "none";
                    document.getElementById("monday_9").style.display = "none";
                    document.getElementById("monday_10").style.display = "none";
                    document.getElementById("monday_11").style.display = "none";
                    document.getElementById("monday_12").style.display = "none";
                    document.getElementById("monday_13").style.display = "none";
                    document.getElementById("monday_14").style.display = "none";
                    document.getElementById("monday_15").style.display = "none";
                    document.getElementById("monday_16").style.display = "none";
                    document.getElementById("monday_17").style.display = "none";
                    document.getElementById("monday_18").style.display = "none";
                    document.getElementById("monday_19").style.display = "none";
                    
                    document.getElementById("tuesday_cell").style.display = "none";
                    document.getElementById("tuesday_7").style.display = "none";
                    document.getElementById("tuesday_8").style.display = "none";
                    document.getElementById("tuesday_9").style.display = "none";
                    document.getElementById("tuesday_10").style.display = "none";
                    document.getElementById("tuesday_11").style.display = "none";
                    document.getElementById("tuesday_12").style.display = "none";
                    document.getElementById("tuesday_13").style.display = "none";
                    document.getElementById("tuesday_14").style.display = "none";
                    document.getElementById("tuesday_15").style.display = "none";
                    document.getElementById("tuesday_16").style.display = "none";
                    document.getElementById("tuesday_17").style.display = "none";
                    document.getElementById("tuesday_18").style.display = "none";
                    document.getElementById("tuesday_19").style.display = "none";
                    
                     document.getElementById("wednesday_cell").style.display = "table-cell";
                     document.getElementById("wednesday_7").style.display = "table-cell";
                    document.getElementById("wednesday_8").style.display = "table-cell";
                    document.getElementById("wednesday_9").style.display = "table-cell";
                    document.getElementById("wednesday_10").style.display = "table-cell";
                    document.getElementById("wednesday_11").style.display = "table-cell";
                    document.getElementById("wednesday_12").style.display = "table-cell";
                    document.getElementById("wednesday_13").style.display = "table-cell";
                    document.getElementById("wednesday_14").style.display = "table-cell";
                    document.getElementById("wednesday_15").style.display = "table-cell";
                    document.getElementById("wednesday_16").style.display = "table-cell";
                    document.getElementById("wednesday_17").style.display = "table-cell";
                    document.getElementById("wednesday_18").style.display = "table-cell";
                    document.getElementById("wednesday_19").style.display = "table-cell";
        
        
        
    }
    
    
    else if(document.getElementById('wednesday_cell').style.display =="table-cell"){
        
                    document.getElementById("wednesday_cell").style.display = "none";
                     document.getElementById("wednesday_7").style.display = "none";
                    document.getElementById("wednesday_8").style.display = "none";
                    document.getElementById("wednesday_9").style.display = "none";
                    document.getElementById("wednesday_10").style.display = "none";
                    document.getElementById("wednesday_11").style.display = "none";
                    document.getElementById("wednesday_12").style.display = "none";
                    document.getElementById("wednesday_13").style.display = "none";
                    document.getElementById("wednesday_14").style.display = "none";
                    document.getElementById("wednesday_15").style.display = "none";
                    document.getElementById("wednesday_16").style.display = "none";
                    document.getElementById("wednesday_17").style.display = "none";
                    document.getElementById("wednesday_18").style.display = "none";
                     document.getElementById("wednesday_19").style.display = "none";
                    
                    document.getElementById("thursday_cell").style.display = "table-cell";
                    document.getElementById("thursday_7").style.display = "table-cell";
                    document.getElementById("thursday_8").style.display = "table-cell";
                    document.getElementById("thursday_9").style.display = "table-cell";
                    document.getElementById("thursday_10").style.display = "table-cell";
                    document.getElementById("thursday_11").style.display = "table-cell";
                    document.getElementById("thursday_12").style.display = "table-cell";
                    document.getElementById("thursday_13").style.display = "table-cell";
                    document.getElementById("thursday_14").style.display = "table-cell";
                    document.getElementById("thursday_15").style.display = "table-cell";
                    document.getElementById("thursday_16").style.display = "table-cell";
                    document.getElementById("thursday_17").style.display = "table-cell";
                    document.getElementById("thursday_18").style.display = "table-cell";
                    document.getElementById("thursday_19").style.display = "table-cell";
                     
                     document.getElementById("arrow-left").style.display = "inline";
        
        
    }
    
     else if(document.getElementById('thursday_cell').style.display =="table-cell"){
         
                    document.getElementById("thursday_cell").style.display = "none";
                    document.getElementById("thursday_7").style.display = "none";
                    document.getElementById("thursday_8").style.display = "none";
                    document.getElementById("thursday_9").style.display = "none";
                    document.getElementById("thursday_10").style.display = "none";
                    document.getElementById("thursday_11").style.display = "none";
                    document.getElementById("thursday_12").style.display = "none";
                    document.getElementById("thursday_13").style.display = "none";
                    document.getElementById("thursday_14").style.display = "none";
                    document.getElementById("thursday_15").style.display = "none";
                    document.getElementById("thursday_16").style.display = "none";
                    document.getElementById("thursday_17").style.display = "none";
                    document.getElementById("thursday_18").style.display = "none";
                    document.getElementById("thursday_19").style.display = "none";
                    
                    document.getElementById("friday_cell").style.display = "table-cell";
                    document.getElementById("friday_7").style.display = "table-cell";
                    
                    document.getElementById("friday_8").style.display = "table-cell";
                    document.getElementById("friday_9").style.display = "table-cell";
                    document.getElementById("friday_10").style.display = "table-cell";
                    document.getElementById("friday_11").style.display = "table-cell";
                    document.getElementById("friday_12").style.display = "table-cell";
                    document.getElementById("friday_13").style.display = "table-cell";
                    document.getElementById("friday_14").style.display = "table-cell";
                    document.getElementById("friday_15").style.display = "table-cell";
                    document.getElementById("friday_16").style.display = "table-cell";
                    document.getElementById("friday_17").style.display = "table-cell";
                    document.getElementById("friday_18").style.display = "table-cell";
                    document.getElementById("friday_19").style.display = "table-cell";
                    
                    document.getElementById("arrow-left").style.display = "inline";
         
     }
     
     
     else if(document.getElementById('friday_cell').style.display =="table-cell"){
         
                    document.getElementById("friday_cell").style.display = "none";
                    document.getElementById("friday_7").style.display = "none";
                    document.getElementById("friday_8").style.display = "none";
                      document.getElementById("friday_9").style.display = "none";
                    document.getElementById("friday_10").style.display = "none";
                    document.getElementById("friday_11").style.display = "none";
                    document.getElementById("friday_12").style.display = "none";
                    document.getElementById("friday_13").style.display = "none";
                    document.getElementById("friday_14").style.display = "none";
                    document.getElementById("friday_15").style.display = "none";
                    document.getElementById("friday_16").style.display = "none";
                    document.getElementById("friday_17").style.display = "none";
                    document.getElementById("friday_18").style.display = "none";
                   document.getElementById("friday_19").style.display = "none";
                    
                    document.getElementById("saturday_cell").style.display = "table-cell";
                    document.getElementById("saturday_7").style.display = "table-cell";
                    document.getElementById("saturday_8").style.display = "table-cell";
                    document.getElementById("saturday_9").style.display = "table-cell";
                    document.getElementById("saturday_10").style.display = "table-cell";
                    document.getElementById("saturday_11").style.display = "table-cell";
                    document.getElementById("saturday_12").style.display = "table-cell";
                    document.getElementById("saturday_13").style.display = "table-cell";
                    document.getElementById("saturday_14").style.display = "table-cell";
                    document.getElementById("saturday_15").style.display = "table-cell";
                    document.getElementById("saturday_16").style.display = "table-cell";
                    document.getElementById("saturday_17").style.display = "table-cell";
                    document.getElementById("saturday_18").style.display = "table-cell";
                    document.getElementById("saturday_19").style.display = "table-cell";
                    
                    document.getElementById("arrow-left").style.display = "inline";
          
     }
    
    else if(document.getElementById('saturday_cell').style.display =="table-cell"){
        
                
                    
                
                    document.getElementById("sunday_cell").style.display = "table-cell";
                    document.getElementById("sunday_7").style.display = "table-cell";
                    document.getElementById("sunday_8").style.display = "table-cell";
                    document.getElementById("sunday_9").style.display = "table-cell";
                    document.getElementById("sunday_10").style.display = "table-cell";
                    document.getElementById("sunday_11").style.display = "table-cell";
                    document.getElementById("sunday_12").style.display = "table-cell";
                    document.getElementById("sunday_13").style.display = "table-cell";
                    document.getElementById("sunday_14").style.display = "table-cell";
                    document.getElementById("sunday_15").style.display = "table-cell";
                    document.getElementById("sunday_16").style.display = "table-cell";
                    document.getElementById("sunday_17").style.display = "table-cell";
                    document.getElementById("sunday_18").style.display = "table-cell";
                    document.getElementById("sunday_19").style.display = "table-cell";
                
                
                    document.getElementById("saturday_cell").style.display = "none";
                     document.getElementById("saturday_7").style.display = "none";
                    document.getElementById("saturday_8").style.display = "none";
                    document.getElementById("saturday_9").style.display = "none";
                    document.getElementById("saturday_10").style.display = "none";
                    document.getElementById("saturday_11").style.display = "none";
                    document.getElementById("saturday_12").style.display = "none";
                    document.getElementById("saturday_13").style.display = "none";
                    document.getElementById("saturday_14").style.display = "none";
                    document.getElementById("saturday_15").style.display = "none";
                    document.getElementById("saturday_16").style.display = "none";
                    document.getElementById("saturday_17").style.display = "none";
                    document.getElementById("saturday_18").style.display = "none";
                     document.getElementById("saturday_19").style.display = "none";
                    
                     document.getElementById("arrow-left").style.display = "inline";
                      document.getElementById("arrow-right").style.display = "none";
        
    }
    
}
        
function movePrev(){
    
    if(document.getElementById('tuesday_cell').style.display =="table-cell"){
        
        console.log("tuesday to monday going back....")
        
                document.getElementById("monday_cell").style.display = "table-cell";
                 document.getElementById("monday_7").style.display = "table-cell";
                 document.getElementById("monday_8").style.display = "table-cell";
                 document.getElementById("monday_9").style.display = "table-cell";
                 document.getElementById("monday_10").style.display = "table-cell";
                 document.getElementById("monday_11").style.display = "table-cell";
                 document.getElementById("monday_12").style.display = "table-cell";
                 document.getElementById("monday_13").style.display = "table-cell";
                 document.getElementById("monday_14").style.display = "table-cell";
                 document.getElementById("monday_15").style.display = "table-cell";
                 document.getElementById("monday_16").style.display = "table-cell";
                 document.getElementById("monday_17").style.display = "table-cell";
                 document.getElementById("monday_18").style.display = "table-cell";
                 document.getElementById("monday_19").style.display = "table-cell";
            
            
                    document.getElementById("tuesday_cell").style.display = "none";
                    document.getElementById("tuesday_7").style.display = "none";
                    document.getElementById("tuesday_8").style.display = "none";
                    document.getElementById("tuesday_9").style.display = "none";
                    document.getElementById("tuesday_10").style.display = "none";
                    document.getElementById("tuesday_11").style.display = "none";
                    document.getElementById("tuesday_12").style.display = "none";
                    document.getElementById("tuesday_13").style.display = "none";
                    document.getElementById("tuesday_14").style.display = "none";
                    document.getElementById("tuesday_15").style.display = "none";
                    document.getElementById("tuesday_16").style.display = "none";
                    document.getElementById("tuesday_17").style.display = "none";
                    document.getElementById("tuesday_18").style.display = "none";
                    document.getElementById("tuesday_19").style.display = "none";
                    
                    document.getElementById("wednesday_cell").style.display = "none";
                    document.getElementById("wednesday_7").style.display = "none";
                    document.getElementById("wednesday_8").style.display = "none";
                    document.getElementById("wednesday_9").style.display = "none";
                    document.getElementById("wednesday_10").style.display = "none";
                    document.getElementById("wednesday_11").style.display = "none";
                    document.getElementById("wednesday_12").style.display = "none";
                    document.getElementById("wednesday_13").style.display = "none";
                    document.getElementById("wednesday_14").style.display = "none";
                    document.getElementById("wednesday_15").style.display = "none";
                    document.getElementById("wednesday_16").style.display = "none";
                    document.getElementById("wednesday_17").style.display = "none";
                    document.getElementById("wednesday_18").style.display = "none";
                    document.getElementById("wednesday_19").style.display = "none";
                    
                     document.getElementById("arrow-left").style.display = "none";
                     document.getElementById("arrow-right").style.display = "inline";
    }
    
    else if(document.getElementById('wednesday_cell').style.display =="table-cell"){
        
                    document.getElementById("tuesday_cell").style.display = "table-cell";
                    document.getElementById("tuesday_7").style.display = "table-cell";
                    document.getElementById("tuesday_8").style.display = "table-cell";
                    document.getElementById("tuesday_9").style.display = "table-cell";
                    document.getElementById("tuesday_10").style.display = "table-cell";
                    document.getElementById("tuesday_11").style.display = "table-cell";
                    document.getElementById("tuesday_12").style.display = "table-cell";
                    document.getElementById("tuesday_13").style.display = "table-cell";
                    document.getElementById("tuesday_14").style.display = "table-cell";
                    document.getElementById("tuesday_15").style.display = "table-cell";
                    document.getElementById("tuesday_16").style.display = "table-cell";
                    document.getElementById("tuesday_17").style.display = "table-cell";
                    document.getElementById("tuesday_18").style.display = "table-cell";
                    document.getElementById("tuesday_19").style.display = "table-cell";
                    
                     document.getElementById('monday_cell').style.display="none";
                     document.getElementById("monday_7").style.display = "none";
                    document.getElementById("monday_8").style.display = "none";
                    document.getElementById("monday_9").style.display = "none";
                    document.getElementById("monday_10").style.display = "none";
                    document.getElementById("monday_11").style.display = "none";
                    document.getElementById("monday_12").style.display = "none";
                    document.getElementById("monday_13").style.display = "none";
                    document.getElementById("monday_14").style.display = "none";
                    document.getElementById("monday_15").style.display = "none";
                    document.getElementById("monday_16").style.display = "none";
                    document.getElementById("monday_17").style.display = "none";
                    document.getElementById("monday_18").style.display = "none";
                    document.getElementById("monday_19").style.display = "none";
                    
                    document.getElementById("wednesday_cell").style.display = "none";
                     document.getElementById("wednesday_7").style.display = "none";
                    document.getElementById("wednesday_8").style.display = "none";
                    document.getElementById("wednesday_9").style.display = "none";
                    document.getElementById("wednesday_10").style.display = "none";
                    document.getElementById("wednesday_11").style.display = "none";
                    document.getElementById("wednesday_12").style.display = "none";
                    document.getElementById("wednesday_13").style.display = "none";
                    document.getElementById("wednesday_14").style.display = "none";
                    document.getElementById("wednesday_15").style.display = "none";
                    document.getElementById("wednesday_16").style.display = "none";
                    document.getElementById("wednesday_17").style.display = "none";
                    document.getElementById("wednesday_18").style.display = "none";
                     document.getElementById("wednesday_19").style.display = "none";
                    
                     document.getElementById("arrow-left").style.display = "inline";
                     document.getElementById("arrow-right").style.display = "inline";
        
    }
    
     else if(document.getElementById('thursday_cell').style.display =="table-cell"){
         
                    document.getElementById("wednesday_cell").style.display = "table-cell";
                     document.getElementById("wednesday_7").style.display = "table-cell";
                    document.getElementById("wednesday_8").style.display = "table-cell";
                    document.getElementById("wednesday_9").style.display = "table-cell";
                    document.getElementById("wednesday_10").style.display = "table-cell";
                    document.getElementById("wednesday_11").style.display = "table-cell";
                    document.getElementById("wednesday_12").style.display = "table-cell";
                    document.getElementById("wednesday_13").style.display = "table-cell";
                    document.getElementById("wednesday_14").style.display = "table-cell";
                    document.getElementById("wednesday_15").style.display = "table-cell";
                    document.getElementById("wednesday_16").style.display = "table-cell";
                    document.getElementById("wednesday_17").style.display = "table-cell";
                    document.getElementById("wednesday_18").style.display = "table-cell";
                     document.getElementById("wednesday_19").style.display = "table-cell";
                    
                    document.getElementById("thursday_cell").style.display = "none";
                     document.getElementById("thursday_7").style.display = "none";
                    document.getElementById("thursday_8").style.display = "none";
                    document.getElementById("thursday_9").style.display = "none";
                    document.getElementById("thursday_10").style.display = "none";
                    document.getElementById("thursday_11").style.display = "none";
                    document.getElementById("thursday_12").style.display = "none";
                    document.getElementById("thursday_13").style.display = "none";
                    document.getElementById("thursday_14").style.display = "none";
                    document.getElementById("thursday_15").style.display = "none";
                    document.getElementById("thursday_16").style.display = "none";
                    document.getElementById("thursday_17").style.display = "none";
                    document.getElementById("thursday_18").style.display = "none";
                     document.getElementById("thursday_19").style.display = "none";
                     
                     document.getElementById("arrow-left").style.display = "inline";
                     document.getElementById("arrow-right").style.display = "inline";
         
         
     }
     
     else if(document.getElementById('friday_cell').style.display =="table-cell"){
         
                    document.getElementById("thursday_cell").style.display = "table-cell";
                     document.getElementById("thursday_7").style.display = "table-cell";
                    document.getElementById("thursday_8").style.display = "table-cell";
                    document.getElementById("thursday_9").style.display = "table-cell";
                    document.getElementById("thursday_10").style.display = "table-cell";
                    document.getElementById("thursday_11").style.display = "table-cell";
                    document.getElementById("thursday_12").style.display = "table-cell";
                    document.getElementById("thursday_13").style.display = "table-cell";
                    document.getElementById("thursday_14").style.display = "table-cell";
                    document.getElementById("thursday_15").style.display = "table-cell";
                    document.getElementById("thursday_16").style.display = "table-cell";
                    document.getElementById("thursday_17").style.display = "table-cell";
                    document.getElementById("thursday_18").style.display = "table-cell";
                    document.getElementById("thursday_19").style.display = "table-cell";
         
         
                    document.getElementById("friday_cell").style.display = "none";
                     document.getElementById("friday_7").style.display = "none";
                    document.getElementById("friday_8").style.display = "none";
                    document.getElementById("friday_9").style.display = "none";
                    document.getElementById("friday_10").style.display = "none";
                    document.getElementById("friday_11").style.display = "none";
                    document.getElementById("friday_12").style.display = "none";
                    document.getElementById("friday_13").style.display = "none";
                    document.getElementById("friday_14").style.display = "none";
                    document.getElementById("friday_15").style.display = "none";
                    document.getElementById("friday_16").style.display = "none";
                    document.getElementById("friday_17").style.display = "none";
                    document.getElementById("friday_18").style.display = "none";
                     document.getElementById("friday_19").style.display = "none";
                     
                     document.getElementById("arrow-left").style.display = "inline";
                     document.getElementById("arrow-right").style.display = "inline";
         
                      
     }
     
     else if(document.getElementById('saturday_cell').style.display =="table-cell"){
         
                    document.getElementById("friday_cell").style.display = "table-cell";
                    document.getElementById("friday_7").style.display = "table-cell";
                    document.getElementById("friday_8").style.display = "table-cell";
                    document.getElementById("friday_9").style.display = "table-cell";
                    document.getElementById("friday_10").style.display = "table-cell";
                    document.getElementById("friday_11").style.display = "table-cell";
                    document.getElementById("friday_12").style.display = "table-cell";
                    document.getElementById("friday_13").style.display = "table-cell";
                    document.getElementById("friday_14").style.display = "table-cell";
                    document.getElementById("friday_15").style.display = "table-cell";
                    document.getElementById("friday_16").style.display = "table-cell";
                    document.getElementById("friday_17").style.display = "table-cell";
                    document.getElementById("friday_18").style.display = "table-cell";
                    document.getElementById("friday_19").style.display = "table-cell";
                    
                    document.getElementById("saturday_cell").style.display = "none";
                     document.getElementById("saturday_7").style.display = "none";
                    document.getElementById("saturday_8").style.display = "none";
                    document.getElementById("saturday_9").style.display = "none";
                    document.getElementById("saturday_10").style.display = "none";
                    document.getElementById("saturday_11").style.display = "none";
                    document.getElementById("saturday_12").style.display = "none";
                    document.getElementById("saturday_13").style.display = "none";
                    document.getElementById("saturday_14").style.display = "none";
                    document.getElementById("saturday_15").style.display = "none";
                    document.getElementById("saturday_16").style.display = "none";
                    document.getElementById("saturday_17").style.display = "none";
                    document.getElementById("saturday_18").style.display = "none";
                     document.getElementById("saturday_19").style.display = "none";
                     
                     
                     document.getElementById("arrow-left").style.display = "inline";
                     document.getElementById("arrow-right").style.display = "inline";
         
                    
         
     }
     
      else if(document.getElementById('sunday_cell').style.display =="table-cell"){
          
                    document.getElementById("sunday_cell").style.display = "none";
                    document.getElementById("sunday_7").style.display = "none";
                    document.getElementById("sunday_8").style.display = "none";
                    document.getElementById("sunday_9").style.display = "none";
                    document.getElementById("sunday_10").style.display = "none";
                    document.getElementById("sunday_11").style.display = "none";
                    document.getElementById("sunday_12").style.display = "none";
                    document.getElementById("sunday_13").style.display = "none";
                    document.getElementById("sunday_14").style.display = "none";
                    document.getElementById("sunday_15").style.display = "none";
                    document.getElementById("sunday_16").style.display = "none";
                    document.getElementById("sunday_17").style.display = "none";
                    document.getElementById("sunday_18").style.display = "none";
                    document.getElementById("sunday_19").style.display = "none";
                    
                    
                    document.getElementById("saturday_cell").style.display = "table-cell";
                     document.getElementById("saturday_7").style.display = "table-cell";
                    document.getElementById("saturday_8").style.display = "table-cell";
                    document.getElementById("saturday_9").style.display = "table-cell";
                    document.getElementById("saturday_10").style.display = "table-cell";
                    document.getElementById("saturday_11").style.display = "table-cell";
                    document.getElementById("saturday_12").style.display = "table-cell";
                    document.getElementById("saturday_13").style.display = "table-cell";
                    document.getElementById("saturday_14").style.display = "table-cell";
                    document.getElementById("saturday_15").style.display = "table-cell";
                    document.getElementById("saturday_16").style.display = "table-cell";
                    document.getElementById("saturday_17").style.display = "table-cell";
                    document.getElementById("saturday_18").style.display = "table-cell";
                     document.getElementById("saturday_19").style.display = "table-cell";
                    
                    
                    
                    document.getElementById("arrow-left").style.display = "inline";
                     document.getElementById("arrow-right").style.display = "inline";
          
          
          
      }

    
    
}
        
        
        window.onload =processData;
        
       
       