<?php
define('_register_email', true);
define("_debug",true);



$hp['style_dir'] 	= "styles/main";
$hp['style_file'] 	= $hp['style_dir']."/style.css";
//================================================================================//

$sys_conf['path_tmp'] = "./tmp";
$sys_conf['cache_folder'] = "./cache";
$sys_conf['img_path_upload'] = "./world";
$sys_conf['img_path_root'] = "./world";
$sys_conf['img_path_avatars'] = "avatars";
$sys_conf['img_path_units'] = "units";
$sys_conf['img_path_flags'] = "system/flags";
$sys_conf['img_path_fields'] = "system/fields";

$sys_conf['img_path_symbols'] = "symbols";

$sys_conf['img_upload_maxx'] = 100; 
$sys_conf['img_upload_maxy'] = 100;

$sys_conf['cache_folder'] = "./cache";

$sys_conf['s_timeout'] = 24 * 60 * 60;
$sys_conf['url'] = "http://mbff.hausswolff.de/";
$sys_conf['email'] = "mbff@hausswolff.de";

$sys_conf['internet_time'] = date("d.m.Y:B")."@";

$sys_conf['title'] = "mbff System";
$sys_conf['version'] = "0.0.1.0";

$sys_conf['img_sys'] = "world/system";

$sys_conf['db_level1']['name'] = "usr_web11_1";
$sys_conf['db_level1']['host'] = "localhost";
$sys_conf['db_level1']['user'] = "web11";
$sys_conf['db_level1']['pass'] = "22fxEaRL";

$sys_conf['db_level1']['s_db'] = "sessions";
$sys_conf['db_level1']['s_v_db'] = "sessions_value";
$sys_conf['db_level1']['usr_pre'] = "user_";
$sys_conf['db_level1']['sys_pre'] = "system_";


$sys_conf['db_level2']['name'] = "usr_web11_2";
$sys_conf['db_level2']['host'] = "localhost";
$sys_conf['db_level2']['user'] = "web11";
$sys_conf['db_level2']['pass'] = "22fxEaRL";

$sys_conf['db_level3']['name'] = "usr_web11_3";
$sys_conf['db_level3']['host'] = "localhost";
$sys_conf['db_level3']['user'] = "web11";
$sys_conf['db_level3']['pass'] = "22fxEaRL";

$sys_conf_color['planets']['ground_color'] = array(
											"Sonne" => "d2ff00",
											"A" => "637083", 
											"M" => "2775ea", 
											"G" => "cddb5b", 
											"T" => "ab285f", 
											"X" => "414423", 
											"C" => "aebca5", 
											"I" => "00d7ea", 
											"B" => "3e8e0e",
											"D" => "94e861", 
											"H" => "140683");
$sys_conf_color['planets']['font_color'] = array(
											"Sonne" => "000000",
											"A" => "ffffff", 
											"M" => "ffffff", 
											"G" => "000000", 
											"T" => "ffffff", 
											"X" => "ffffff", 
											"C" => "000000", 
											"I" => "000000", 
											"B" => "ffffff",
											"D" => "000000", 
											"H" => "ffffff");
?>
