<?php
require("./include/base_functions.php");
if(_debug){
	require("./include/class/class_debug.php");
	$_debug = new c_debug();
	$header = $_debug->show_name();
	if(!$_POST['count']) $count = 20; else $count = $_POST['count'];
	$footer = "<form method=\"post\"><input size=\"3\" type=\"text\" name=\"count\" value=\"".$count."\"/><input type=\"submit\" value=\"Zeilen anzeigen\" /></form>";
	$_debug->show($count, $header, $footer);
}
?>