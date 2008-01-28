<script language="javaScript">

var nav_objecsX = new Array(3);
var nav_objecsY = new Array(3);

nav_objecsX["object1"] = 10
nav_objecsY["object1"] = 10

nav_objecsX["object2"] = 130
nav_objecsY["object2"] = 10

nav_objecsX["object3"] = 10
nav_objecsY["object3"] = 130

function setVariables(){
	y1=-50;
	ob=1;
	max=10; // this max sets the distance from the top of the page

	if (navigator.appName == "Netscape") {
		v=".top=";h=".left=";dS="document.";sD="";
		y="window.pageYOffset";x="window.pageXOffset";iW="window.innerWidth";iH="window.innerHeight"
	}else {
		h=".pixelLeft=";v=".pixelTop=";dS="";sD=".style";
		y="document.body.scrollTop";x="document.body.scrollLeft";iW="document.body.clientWidth";iH="document.body.clientHeight"
	}
	
	
	object="object1";
	checkLocationA()
}

movex=0,movey=0,xdiff=0,ydiff=0,ystart=0,xstart=0


function checkLocation(){
	
	if (document.layers){
		innerY-=10;innerX-=10
	}
	
	yy=eval(y);
	xx=eval(x);
	ydiff=ystart-yy;
	xdiff=xstart-xx;
	if ((ydiff<(-0.01))||(ydiff>(0.01))) movey=Math.round(ydiff/10),ystart-=movey
	if ((xdiff<(-0.01))||(xdiff>(0.01))) movex=Math.round(xdiff/10),xstart-=movex


	N=(document.layers)?1:0
	V=(N) ? 4:5

	if (V==4){
		object="object1"
		eval(dS+object+sD+v+(ystart+nav_objecsX["object1"]+10));
		eval(dS+object+sD+h+(xstart+nav_objecsX["object1"]+10));
		
		object="object2"
		eval(dS+object+sD+v+(ystart+nav_objecsX["object2"]+10));
		eval(dS+object+sD+h+(xstart+nav_objecsX["object2"]+10));
		
		object="object3"
		eval(dS+object+sD+v+(ystart+nav_objecsX["object3"]+10));
		eval(dS+object+sD+h+(xstart+nav_objecsX["object3"]+10));
		
	}else{
		object=document.getElementById('object1')
		object.style.top=ystart+nav_objecsY["object1"]
		object.style.left=xstart+nav_objecsX["object1"]
				
		object=document.getElementById('object2')
		object.style.top=ystart+nav_objecsY["object2"]
		object.style.left=xstart+nav_objecsX["object2"]
		
		object=document.getElementById('object3')
		object.style.top=ystart+nav_objecsY["object3"]
		object.style.left=xstart+nav_objecsX["object3"]
		
	}
	setTimeout("checkLocation()",10)
}

function checkLocationA(){
	ystart=eval(y)+5;
	xstart=eval(x)+5;
}
spread=40

function scrollOn(){
	items=3
	if (ob<=items){
		objectX="object"+ob;
		y1+=10;
	
		N=(document.layers)?1:0
		V=(N) ? 4:5
		if (V==4){
			eval(dS + objectX + sD + v + y1);
		}else{
			object=document.getElementById(objectX)
			object.style.top=y1
		}
		//eval(dS + objectX + sD + v + y);
		if (y1<max) xx=setTimeout ("scrollOn()",20)
		else y1=-50, max+=spread, ob+=1, xx=setTimeout("scrollOn()",20) // this max sets the spacing
	}
	 
	if (ob>items){
		clearTimeout(xx);checkLocation();
	}
}



</script>