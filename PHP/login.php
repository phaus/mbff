<?php
##################################################################################
$modules = array("user", "system", "caching");
$funcs = array("login");
$request = array();
$post = array("l_username", "l_password");
##################################################################################
require("./session.php");

$user_id = is_login($l_username, $l_password);

if($user_id != false){
	$login = true;
	header("Location: index.php?sid=".$sid);
}else{
	$login = false;
	$hp[error] = "Login ist fehlgeschlagen !
				<ul>
				<li>Benutzername und Passwort wurden nicht gefunden oder waren nicht richtig.</li>
				<li>Oder Ihr Account ist noch nicht aktiv.</li>
				</ul>";
	eval("\$hp['content']  = \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
	eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
	echo $index;
}
?>