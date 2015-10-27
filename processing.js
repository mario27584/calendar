    var size = 100;
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
      
        var imgX = document.createElement("IMG");
        imgX.setAttribute("src", "x.jpg");
        imgX.setAttribute("id","deleteDiv");
        imgX.setAttribute("width", "10");
        imgX.setAttribute("height", "10");
        imgX.setAttribute("alt", "delete");
        imgX.onclick = function () {
                                    var mainParent = this.parentNode.parentNode;
                                    console.log(this.parentNode.parentNode);
                                    var childremove = this.parentNode;
                                    console.log(childremove);
                                    //parent contains day_time
                                    var day_time = mainParent.id;
                                    console.log("day and time: -->"+day_time);
                                    //child contains name_id
                                    var name_id = childremove.id;
                                    console.log("name and id -->"+name_id);
                                    var split_IdName = name_id.split('_');
                                    var name = split_IdName[0];
                                    var i_d=  split_IdName[1];
                                    var deleteOrMove = "delete";
                                    mainParent.removeChild(childremove);
                                    secondResize();
                                    loadXMLDoc(name,day_time,i_d,deleteOrMove);
        }
        newDiv.style.zIndex="-1"
        newDiv.textContent = name;
        newDiv.contenteditable="true";
        newDiv.style.backgroundColor = color;
        newDiv.style.display = "block"; //horizontal
        //newDiv.style.display = "inline-block"; // vertical 
        newDiv.id = name+"_"+id;
        newDiv.name = name;
        newDiv.style.height = "50px";
        newDiv.draggable="true";
        newDiv.ondragstart=drag; 
        newDiv.appendChild(imgX);
        element.appendChild(newDiv);
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
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    
    }
  }
  var str = "updateDb.php?name="+name+"&daytime="+daytime+"&id="+id+"&deleteOrMove="+deleteOrMove;
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
    
