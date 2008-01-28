<script language="javascript" type="text/javascript">
	function init()
	{
		object1="navigation";
		if (document.layers)
		{
			v=".top=";
			dS="document.";
			sD="";
			y="window.pageYOffset+10";
			h="window.outerHeight";
			w="window.innerWidth";
		}
		else if (document.all)
		{
			v=".pixelTop=";
			dS="";
			sD=".style";
			y="document.body.scrollTop+10";
			h="document.body.clientHeight";
			w="document.body.clientWidth";
		}
		else if (document.getElementById){
			y="window.pageYOffset+10";
			h="window.outerHeight";
		}
	}
	
	function move()
	{
		yy=eval(y);
		if (document.getElementById){
			document.getElementById("navigation").style.top=yy;
		}else{
			eval(dS+object1+sD+v+yy);
		}
		setTimeout("move()",250);
	}
</script>