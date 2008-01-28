<?php
function is_login($username, $password){
	$out = $activ = false;
	global $sys_conf, $sid;
	if(_debug)
		global $_debug;
	$l_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "SELECT user_id 
			FROM `".$sys_conf['db_level1']['usr_pre']."table` 
			WHERE value = '".addslashes(htmlspecialchars($_POST['l_username']))."' 
			AND category = 'user_name' ";
	$row = $l_db->query_first($sql);
	$l_db->free_result($result);

	if($l_user = new c_user($row['user_id'])){
		$row = $l_user->return_data_array();
		if($row['activ'] == 0)
			$activ = true;
		else{
			if(_debug)
				$_debug->add("LOGIN: ".$username."... ACCOUNT NOT ACTIV");
			$out = false; //Account nicht aktiv
		}	
		
		if($activ)
			if($row['password'] == md5($_POST['l_password'])){
				if(_debug)
					$_debug->add("LOGIN: ".$username."... DONE");
				add_session($sid, $row['user_id']);
				$out = $row['user_id'];
			}else{ 
				if(_debug)
					$_debug->add("LOGIN: ".$username."... WRONG PASS");
				$out = false; //Password falsch
			}
	}else{
		if(_debug)
			$_debug->add("LOGIN: ".$username."... USER NOT FOUND");
		$out = false; //Benutzername nicht gefunden
	}
return $out;
}
?>