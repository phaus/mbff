<?php

require("./include/base_functions.php");
require("./session.php");
require("./include/login_functions.php");

$user_id = is_login($username, $password);
if($user_id != 0){
	$login = true;
	header("Location: index.php?sid=".$sid);
}else{
	$login = false;
	$hp[error] = "Login ist fehlgeschlagen !<br />Benutzername und Passwort wurden nicht gefunden oder waren nicht richtig !";
	eval("\$hp['content']  = \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
	eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
	echo $index;
}

?>