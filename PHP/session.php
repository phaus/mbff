<?php

require("./include/base_functions.php");

if(_debug){
	global $_debug;
	require("./include/class/class_debug.php");
	$_debug = new c_debug();
}	

//User Klasse immer laden
if(!in_array("user", $modules))
	$modules[] = "user";


//SID immer erst als Request abfragen immer laden
if(!in_array("sid", $request))
	$request[] = "sid";
	
//Lade Module (Klassen)
if(is_array($modules))
	foreach($modules as $module){
		require_once("./include/class/class_".$module.".php");
		if(_debug) $_debug->add("<b>Lade Modul</b> ".$module."\n");	
	}

//Lade Funktion (Funktionen)
if(is_array($funcs))
	foreach($funcs as $func){
		require_once("./include/".$func."_functions.php");
		if(_debug) $_debug->add("<b>Lade Funktion</b> ".$func."\n");	
	}
	
//Lade REQUEST VARS
if(is_array($request) && sizeof($_REQUEST) > 0)
	foreach($request as $var)
		if($_REQUEST[$var]){
			$$var = $_REQUEST[$var];
			if(_debug) $_debug->add("\$".$var." = ".$_REQUEST[$var]." <i>als REQUEST</i>\n");
		}

//Lade GET VARS
if(is_array($get) && sizeof($_GET) > 0)
	foreach($get as $var)
		if($_GET[$var]){
			$$var = $_GET[$var];
			if(_debug) $_debug->add("\$".$var." = ".$_GET[$var]." <i>als GET</i>\n");
		}

//Lade POST VARS
if(is_array($post) && sizeof($_POST) > 0)
	foreach($post as $var)
		if($_POST[$var]){ 
			$$var = $_POST[$var];
			if(_debug) $_debug->add("\$".$var." = ".$_POST[$var]." <i>als POST</i>\n");
		}

//Wenn Session gesetzt, lade SID aus Session
if($HTTP_COOKIE_VARS[$sys_conf['string']])
	$sid = $HTTP_COOKIE_VARS[$sys_conf['string']];

//INIT
$hp['user'] = "Gast";
$sys_conf['lang'] = "de";
$sys_conf['js_menu'] = true;
$sys_conf['usr_lvl'] = "user";

	if($user_id)
		$sid = getnewsid();		
	elseif($sid && $user_id = is_sid_activ($sid)){
		$c_user = new c_user($user_id);
		//$c_user->get_data();
		$user = $c_user->return_data_array();
		update_session($sid, $user_id);
		$hp['user'] = $user['user_name'];
	}elseif($sid){
		$user_id = -2;
	}else{
		$user_id = -1;
		$sid = getnewsid();
	}
	$hp[title] = $hp['user']."@";

//Lade on_startup Einstellungen 
require("./include/onstartup.php");

if(_debug){
	$_debug->setUID($user_id);
	$_debug->add("<b>SESSION:</b> ".$sid.", <b>User:</b> ".$hp['user']."[".$user_id."],  <b>Lang:</b> ".$sys_conf['lang']);
}
?>