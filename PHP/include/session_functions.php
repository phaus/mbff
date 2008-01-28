<?php
function is_sid_activ($sid){
	global $sys_conf;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "SELECT user_id 
			FROM `".$sys_conf['db_level1']['s_db']."` 
			WHERE sid = '".$sid."' 
			AND ip = '".$_SERVER['REMOTE_ADDR']."'
			AND session_start  + ".$sys_conf['s_timeout']." > ".time()." ";
	$result = $s_db->unbuffered_query($sql);	
	if($row = $s_db->fetch_array($result))
		if($row['user_id'] >0)
			return $row['user_id']; 
		else
			return -1;		
}


function update_session($sid, $user_id){
	global $sys_conf;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "UPDATE `".$sys_conf['db_level1']['s_db']."`
			SET user_id = '".$user_id."', session_start = '".time()."' 
			WHERE sid = '".$sid."' ";
	$s_db->unbuffered_query($sql);
}

function get_session_var($var_name, $array = false){
	global $sys_conf, $sid;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "SELECT session_value
			FROM `".$sys_conf['db_level1']['s_v_db']."`
			WHERE sid = '".$sid."' 
			AND session_value_name = '".$var_name."' ";
	$result = $s_db->query($sql);
	if($row = $s_db->fetch_array($result))
		$out = $row['session_value'];

	if($array)
		return unserialize($out);
	else
		return $out;
}

function set_session_var($var_name, $var_value, $array = false){
	global $sys_conf, $sid;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	if($array)
		$var_value = serialize($var_value);

	$sql = "SELECT session_value_name 
			FROM `".$sys_conf['db_level1']['s_v_db']."`
			WHERE sid = '".$sid."' 
			AND session_value_name = '".$var_name."' ";

	$result = $s_db->query($sql);	
	if($s_db -> num_rows($result) > 0)
		$sql = "UPDATE `".$sys_conf['db_level1']['s_v_db']."` 
				SET 
				session_value_name = '".$var_name."', 
				session_value = '".$var_value."'
				WHERE sid = '".$sid."' ";	
	else
		$sql = "INSERT INTO `".$sys_conf['db_level1']['s_v_db']."`
				(sid, session_value_name, session_value)
				VALUES
				('".$sid."', '".$var_name."', '".$var_value."') ";
	$s_db->unbuffered_query($sql);	
	$s_db->free_result($result);
}

function del_session_var($var_name){
	global $sys_conf, $sid;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "DELETE FROM `".$sys_conf['db_level1']['s_v_db']."`
			WHERE sid = '".$sid."' 
			AND session_value_name = '".$var_name."' ";
	$s_db->unbuffered_query($sql);	
	$s_db->free_result($result);
}

function add_session($sid, $user_id){
	global $sys_conf;
	rem_session($user_id);
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "INSERT INTO `".$sys_conf['db_level1']['s_db']."`
			(sid, ip, user_id, session_start)
			VALUES
			('".$sid."', '".$_SERVER['REMOTE_ADDR']."', '".$user_id."', '".time()."') ";
	$s_db->unbuffered_query($sql);	
	$s_db->free_result($result);
}

function rem_session($user_id){
	global $sys_conf;
	$s_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);	
	$sql = "SELECT sid FROM `".$sys_conf['db_level1']['s_db']."`
			WHERE user_id = '".$user_id."' ";
	$temp = $s_db->query_first($sql);
	
	$sql = "DELETE FROM `".$sys_conf['db_level1']['s_v_db']."`
			WHERE sid = '".$temp['sid']."' ";
	$s_db->unbuffered_query($sql);	
	
	$sql = "DELETE FROM `".$sys_conf['db_level1']['s_db']."`
			WHERE user_id = '".$user_id."' ";
	$s_db->unbuffered_query($sql);	
	$s_db->free_result($result);
}
?>