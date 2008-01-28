<?php
if($debug!="aus")
{
	echo "<!--DEBUG AN-->\n";
	$debug = true;
}else{
	echo "<!--DEBUG AUS-->\n";
	$debug = false;
}
if($frame_main == "rows")
{
	$frame_nav = "cols";
}else{
	$frame_main = "cols";
	$frame_nav = "rows";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Interface :: TEST :: I</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
if($debug == true)
	echo "<frameset rows=\"*,100\" frameborder=\"yes\" border=\"1\" framespacing=\"0\">\n";
	
	echo"\t<frameset ".$frame_main."=\"150,*\" frameborder=\"no\" border=\"1\" framespacing=\"0\">\n";
	echo "\t\t<frame src=\"nav.php?frame_nav=".$frame_nav."\" name=\"nav\" scrolling=\"no\" noresize>\n";
?>
  <frame src="static/solarsystem.html" name="main">
</frameset>

<?php
if($debug == true)
	echo "
	<frame src=\"debug.php\" name=\"debug\">\n
	</frameset>\n";
?>
<noframes>
<body>
</body>
</noframes>
</html>
