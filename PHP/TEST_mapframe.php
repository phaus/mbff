<?php
##################################################################################
$modules = array("user", "map_fw");
$request = array();
$post = array();
##################################################################################
require("./session.php");
	$map = new c_map_fw();
	//$map->build();
	$map->show();
	
	//$map->print_matrix();
?>