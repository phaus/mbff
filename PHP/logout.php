<?php
##################################################################################
$modules = array();
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");

if($user_id != 0){
		rem_session($user_id);
		if(_debug)
			$_debug->add("<b>LOGOUT<b> USER ID ".$user_id);
		header("Location: index.php");		
}else{
	$login = false;
	$hp[error] = "Logout ist fehlgeschlagen !<br />Benutzer  wurde nicht gefunden  !";
	eval("\$hp['content']  = \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
	eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
	echo $index;
}
?>