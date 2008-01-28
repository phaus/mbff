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
	//Lese Einstellungen aus und überprüfe den Zustand
	for($i=0; $i < sizeof($config_name); $i++){
		$hp[settings_name] = $config_name[$i];
		$hp[settings_desc] = $config_desc[$i];
		switch($config_typ[$i]){
			case"bool":
					$url = $PHP_SELF."?sid=$sid";
					if($user->data['set_'.$config_string[$i]])
						$hp[setting_typ] = $user->data['set_'.$config_string[$i]];
					else
						$hp[setting_typ] = false;
					
					if($hp[setting_typ] == false)
						eval("\$hp['settings_status']  = \"".hp_gettemplate("settings_switch_off", $sys_conf['lang'])."\";");		
					else
						eval("\$hp['settings_status']  = \"".hp_gettemplate("settings_switch_on", $sys_conf['lang'])."\";");		
				break;
		}
		eval("\$hp['settings']  .= \"".hp_gettemplate("settings_row", $sys_conf['lang'])."\";");		
	}
	eval("\$hp['menu_main']  = \"".hp_gettemplate("main_links", $sys_conf['lang'])."\";");		
	eval("\$hp['nav']  = \"".hp_gettemplate("menu_main", $sys_conf['lang'])."\";");	
	eval("\$hp['content']  = \"".hp_gettemplate("account_settings", $sys_conf['lang'])."\";");

}else{
	eval("\$hp['content']  = \"".hp_gettemplate("login", $sys_conf['lang'])."\";");
}
///////////////////////////////////////////
eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
echo $index;
?>
