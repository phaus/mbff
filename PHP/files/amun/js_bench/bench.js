var ext = "png";
var tStart = 0;
var ids = 0;
var loop = 0;
var fps = 0;
var cid = new Array();
       function bench(){
            var jetzt = new Date();
            cid[0] = 0;
            cid[1] = 0;
            cid[2] = 0;
            cid[3] = 0;
            tStart = jetzt.getTime()/1000;
            document.getElementById("Status").appendChild(document.createElement("li"));
            document.getElementsByTagName("li")[0].appendChild(document.createTextNode("Sprites: "));
            document.getElementsByTagName("li")[0].setAttribute("id","SpritStat");

            document.getElementById("Status").appendChild(document.createElement("li"));
            document.getElementsByTagName("li")[1].appendChild(document.createTextNode("Move: "));
            document.getElementsByTagName("li")[1].setAttribute("id","MoveStat");

            document.getElementById("Status").appendChild(document.createElement("li"));
            document.getElementsByTagName("li")[2].appendChild(document.createTextNode("fps: "));
            document.getElementsByTagName("li")[2].setAttribute("id","FPS");
            
            makeStats();
            
            for(i = 0; i < 200; i++)
                setTimeout ('add()',5000);
       }
        function makeStats(){
            document.getElementById("FPS").firstChild.data = "fps: "+Math.floor(fps)+ " frames per seconds";
            document.getElementById("MoveStat").firstChild.data = "Move: " + cid[0] + " " + cid[1] + ", " + cid[2] + ", "+cid[3];

            setTimeout ('makeStats()', 1000);
        }
        function add(){
            var loc = Math.random();
            var locx = loc * 630;
            loc = Math.random();
            var locy = loc * 385;
            
            var newDiv = document.createElement("div");
            var newNode = document.createTextNode("");
            var newImg = document.createElement("img");
            newImg.src = "images/png/cruiser.png";
            newImg.style.height = 35;
            newImg.style.width = 70;
            
            var node = document.getElementById("GF");
            
            node.appendChild(newDiv);
            node.getElementsByTagName("div")[ids];
            node.getElementsByTagName("div")[ids].appendChild(newImg);

            node.getElementsByTagName("div")[ids].className = "cruiser";
            node.getElementsByTagName("div")[ids].setAttribute("id",ids);
            

            node.getElementsByTagName("div")[ids].style.top = locy+"px";
            node.getElementsByTagName("div")[ids].style.left = locx+"px";
            move(ids);
            ids++;
            document.getElementById("SpritStat").firstChild.data = "Sprites: "+ids;
        }
    
        function move(id){
            var loc = Math.random();
            if(id == 1){ 
                loop++;
            }
            cid[0] = id;
            var jetzt = new Date();
            var tNow = jetzt.getTime()/1000;
            var cur = tNow - tStart;
            fps = Math.round(loop/cur);
       
            
            mx = (loc) * 630;
            loc = Math.random();
            my = (loc) * 385;

            loc = Math.random();
            mz = (loc) * 19;
            
            h = my;
            w = mx;
            var node = document.getElementById("GF").getElementsByTagName("div")[id];
 
            node.firstChild.style.height = mz*3.5;
            node.firstChild.style.width = mz*7;
            
            node.style.top = h+"px";
            node.style.left = w+"px";
            node.zIndex = mz;
            cid[1] = mx;
            cid[2] = my;
            cid[3] = mz;
            setTimeout ('move('+id+')', 100);
        }