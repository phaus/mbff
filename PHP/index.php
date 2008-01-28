<?php
##################################################################################
$modules = array("user", "system", "system_list", "caching");
$funcs = array("image");
$get = array("s_lang");
$request = array("s_lang");
$post = array();
##################################################################################
require("./session.php");

if($user_id > 0){
	$output = new c_caching("game_galaxy-U".$user_id."-".$sys_conf['lang']);
	$hp['galaxylayer'] = get_galaxy_layer(1024);
	if(!$output->is_exist()){
		$sys_list = new c_system_list("*");
		$sys_list->get_all_nodes(array('system_name', 'system_location'));
		$sys_arr = $sys_list->return_data_array();
		foreach($sys_arr as $sys){
			$koords = unserialize($sys['system_location']);
//			print_r($koords);
			$sys['x'] = $koords[0]+512;
			$sys['y'] = $koords[1]+512;
			eval("\$hp['systems']  .= \"".hp_gettemplate("game_galaxy_bit", $sys_conf['lang'])."\";");
		}
		eval("\$hp['content']  = \"".hp_gettemplate("game_galaxy", $sys_conf['lang'])."\";");
		$output->build_caf("game_galaxy_".$sys_conf['lang'], $hp['content']);
	}
	eval("\$hp['content']  = \"".$output->get_content()."\";");

	eval("\$hp['menu_main']  = \"".hp_gettemplate("main_links", $sys_conf['lang'])."\";");		
	eval("\$hp['nav']  = \"".hp_gettemplate("menu_main", $sys_conf['lang'])."\";");	
}else{
	$hp['style'] = "background-image: url(images/t.space.gif);";
	eval("\$hp['content']  = \"".hp_gettemplate("login", $sys_conf['lang'])."\";");
}
///////////////////////////////////////////

eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
echo $index;
?>
