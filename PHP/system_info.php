<?php
##################################################################################
$modules = array();
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");
$hp['style'] = "background-image: url(images/t.space.gif);";

if($user_id > 0){
	$db_obj = get_db_connect('db_level1');
	$user_count 		= getnewid($db_obj, $sys_conf['db_level1']['usr_pre']."table", "user_id") - 1;
	$user_online_count 	= get_db_count($db_obj, $sys_conf['db_level1']['s_db'], "session_start", "session_start + 300 > ".time());
	$user_activ_count 	= get_db_count($db_obj, $sys_conf['db_level1']['usr_pre']."table", "user_id", "category = 'activ' AND value = '0'");
	$system_count 		= get_db_count($db_obj, $sys_conf['db_level1']['sys_pre']."table", "system_id", "category = 'activ' AND value = '0'");
	$db_obj = get_db_connect('db_level2');
	//$planet_count 		= get_db_count($db_obj, "star_index", "star_id", "1");

	eval("\$hp['content']  = \"".hp_gettemplate("system_info", $sys_conf['lang'])."\";");
	eval("\$hp['menu_main']  = \"".hp_gettemplate("main_links", $sys_conf['lang'])."\";");		
	eval("\$hp['nav']  = \"".hp_gettemplate("menu_main", $sys_conf['lang'])."\";");	
}else{
	eval("\$hp['content']  = \"".hp_gettemplate("login", $sys_conf['lang'])."\";");
}
eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
echo $index;
?>
