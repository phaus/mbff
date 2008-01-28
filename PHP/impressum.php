<?php
##################################################################################
$modules = array();
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");
//if($user_id > 0){
	$hp['style'] = "background-image: url(images/t.space.gif);";
	eval("\$hp['menu_main']  = \"".hp_gettemplate("main_links", $sys_conf['lang'])."\";");		
	eval("\$hp['nav']  = \"".hp_gettemplate("menu_main", $sys_conf['lang'])."\";");	
	eval("\$hp['content']  = \"".hp_gettemplate("impressum", $sys_conf['lang'])."\";");
/*
}else{
	$hp['style'] = "background-image: url(images/t.space.gif);";
	eval("\$hp['content']  = \"".hp_gettemplate("login", $sys_conf['lang'])."\";");
}
*/
eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
echo $index;
?>
