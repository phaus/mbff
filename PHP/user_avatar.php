<?php
require("./include/base_functions.php");
require("./include/class/class_avatar.php");
require("./session.php");
$hp['style'] = "background-image: url(images/t.space.gif);";
//$hp['footer'] = hp_compressed_output();
if($user_id <= 0){
	eval("\$hp['content']  = \"".hp_gettemplate("login")."\";");
	eval("\$index = \"".hp_gettemplate("index")."\";");
	echo $index;
	exit;
}

if($_POST['action']){
	$action = $_POST['action'];
}else{
	$action = $_GET['action'];
}

switch($action){
	case "avatar_new_set":
		$avatar = new c_avatar();
		$avatar->set_entry("user_id", $user_id);
		$avatar->set_entry("avatar_name", $name);
		$avatar->set_entry("date", time());
		$avatar->set_entry("strength", $str);
		$avatar->set_entry("authority", $aut);
		$avatar->set_entry("intelligence", $int);
		$avatar->set_entry("title", $title);
		$avatar->set_entry("profession", $prof);
		if(!$avatar->new_avatar()){
			break;
		}
	case "avatar_new":
		eval("\$hp['menu_main'] = \"" . hp_gettemplate("main_links") . "\";");
		eval("\$hp['nav'] = \"" . hp_gettemplate("menu_main") . "\";");
		eval("\$hp['content'] = \"" . hp_gettemplate("avatar_set") . "\";");
		break;
	case "avatar_image_set":
		$avatar = new c_avatar($_POST['avatar_id']);
		if($avatar->upload_image("image")){
			$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars'].$img_url;
		}else{
			$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars']."no_ava.jpg";
		}
		$avatar_id = $avatar->data_id;
		eval("\$hp['menu_main'] = \"" . hp_gettemplate("main_links") . "\";");
		eval("\$hp['nav'] = \"" . hp_gettemplate("menu_main") . "\";");
		eval("\$hp['content'] = \"" . hp_gettemplate("avatar_image") . "\";");
		break;
	case "avatar_image":
		$avatar = new c_avatar($_POST['avatar_id']);
		if($avatar->data_status['image']){
			$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars'].$avatar->data['image'];
		}else{
			$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars']."no_ava.jpg";
		}
		eval("\$hp['menu_main'] = \"" . hp_gettemplate("main_links") . "\";");
		eval("\$hp['nav'] = \"" . hp_gettemplate("menu_main") . "\";");
		eval("\$hp['content'] = \"" . hp_gettemplate("avatar_image") . "\";");
		break;
	default:
		$list = array();
		$avatar = new c_avatar();
		$avatar->set_entry("user_id", $user_id);
		if(!$list = $avatar->list_avatars()){
			$hp['content'] = "Keine Avatare gefunden";
		}
		unset($avatar);
		unset($hp['avatar_rows']);
		foreach($list as $value){
			$avatar = new c_avatar($value);
			$avatar_id = $avatar->data_id;
			if($avatar->data_status['image']){
				$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars'].$avatar->data['image'];
			}else{
				$img_url = $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars']."no_ava.jpg";
			}
			$avatar_name = $avatar->data['avatar_name'];
			$location = $avatar->data['location'];
			if($avatar->data['activ'] == 0){
				$activ = "aktiviert";
			}else{
				$activ = "inaktiv";
			}
			eval("\$hp['avatar_rows'] .= \"" . hp_gettemplate("avatar_list_row") . "\";");
		}
		eval("\$hp['menu_main'] = \"" . hp_gettemplate("main_links") . "\";");
		eval("\$hp['nav'] = \"" . hp_gettemplate("menu_main") . "\";");
		eval("\$hp['content'] = \"" . hp_gettemplate("avatar_list") . "\";");
}

eval("\$output = \"" . hp_gettemplate("index") . "\";");
echo $output;
?>