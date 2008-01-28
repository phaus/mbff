<?php

//Spracheeinstellungen
if($user_id > 0){
	if($s_lang){
		set_session_var("lang", $s_lang);
		$sys_conf['lang'] = $s_lang;
		$c_user->set_entry("lang", $s_lang);
		$c_user->save_data();
	}else{
		if($user['lang'])
			$sys_conf['lang'] =  $user['lang'];
		else{
			if($lang = get_session_var("lang"))
				$sys_conf['lang'] = $lang;
			$c_user = new c_user($user_id);
			$c_user->set_entry("lang", $sys_conf['lang']);
			$c_user->save_data();
		}
		if($user['js_menu'])
			$sys_conf['js_menu'] = $user['js_menu'];
	}
}else{
	if($s_lang){
		if($sid)
			set_session_var("lang", $s_lang);
		$sys_conf['lang'] = $s_lang;
	}elseif($sid && $lang = get_session_var("lang"))
			$sys_conf['lang'] = $lang;
}

$hp['footer'] = hp_compressed_output();
$hp['flag_path'] = $sys_conf['img_path_root']."/".$sys_conf['img_path_flags'];
eval("\$hp['set_lang'] = \"".hp_gettemplate("set_lang", $sys_conf['lang'])."\";");
?>