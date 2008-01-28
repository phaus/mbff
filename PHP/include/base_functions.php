<?php
require("class/class_db.php");
require("base_config.php");
require("class/base/class_data.php");
require("class/base/class_data_list.php");
require("class/base/class_data_tree.php");
require("session_functions.php");

//require("class/class_user.php");
//require("class/class_system.php");
//require("class/class_caching.php");


function getnewsid(){
	return md5(uniqid(""));
}

function get_db_count($db, $table, $field, $value){
	global $_debug;
	$sql = "SELECT ".$field." 
			FROM `".$table."` 
			WHERE ".$value." ";
	if(_debug)
		$_debug->add("<b>get_db_count</b>:<i> ".__LINE__."</i>: ".$sql);
	$result = $db->unbuffered_query($sql);	
	return $db->num_rows($result);
	$db->free_result($result);
}

function get_db_connect($db_level = 'db_level1'){
global $sys_conf;
	return new db($sys_conf[$db_level]['host'], $sys_conf[$db_level]['user'], $sys_conf[$db_level]['pass'], $sys_conf[$db_level]['name'],$phpversion);
}

//gibt die höchste gültige ID eines DB Eintrages aus
function getnewid($db, $table, $field, $where = ""){
	global $_debug;
	$sql = "SELECT ".$field." 
			FROM `".$table."`
			".$where." 
			ORDER BY ".$field." DESC
			LIMIT 0,1";
	if(_debug)
		$_debug->add("<b>get_new_id</b>:<i> ".__LINE__."</i>: ".$sql);

	$result = $db->unbuffered_query($sql);			
	if($row = $db->fetch_array($result))
		$out = intval($row[$field]) + 1; 
	elseif($db->num_rows($result) == 0)
		$out = 1;
	else
		$out = false;

	$db->free_result($result);
	return $out;
}

//Funktion um html Template auszugeben...
function hp_gettemplate($template, $lang = "de")
{
global $sys_conf;
	if(_debug && substr($template,-3) != "bit"){
		global $_debug;
		$_debug->add("<b>TEMPLATE: </b>".$template.", ".$lang);
	}
	$templatefolder = "templates/";
	return str_replace("\"","\\\"",implode("",file("templates/".$lang."/".$template.".tpl")));
}

//compressed output
function hp_compressed_output()
{
	$encoding = getEnv("HTTP_ACCEPT_ENCODING");
	$useragent = getEnv("HTTP_USER_AGENT");
	$method = trim(getEnv("REQUEST_METHOD"));
	$msie = preg_match("=msie=i", $useragent);
	$gzip = preg_match("=gzip=i", $encoding);
	if ($gzip && ($method != "POST" or !$msie))
	{
		ob_start("ob_gzhandler");
		if(_debug){
			global $_debug;
			$_debug->add("<b>OUTPUT: </b>compressed !");
		}
		return "<small style=\"background: #000000;color: #FFFF93;\">gzip</small>";
	}
	else
	{
		ob_start();
		if(_debug){
			global $_debug;
			$_debug->add("<b>OUTPUT: </b>normal !");
		}
		return "-|-";
	}
}

?>