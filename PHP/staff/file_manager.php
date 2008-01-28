<?php
$filename="file_manager.php";
require("./global.php");
require("file_manager_functions.php");
/*
MAIN
*/
if(isset($post_id) && isset($wbbuserdata['userid']) && $wbbuserdata['userid'] != 0){
	$post_data = get_postdata($post_id);
	switch($action){
		case"deletefile":
			delete_file($file_id);
			header("Location: file_manager.php?sid=".$session['hash']."&post_id=".$post_data['postid']."");
			break;

		case"infofile":
			$statliste = make_file_info($post_id, $file_id);
			eval("\$tpl->output(\"".$tpl->get("file_manager_filestat")."\");");
			break;
		
		case"upload":
			upload_file();
			header("Location: file_manager.php?sid=".$session['hash']."&post_id=".$post_data['postid']."");
			break;

		case"linkadd":
			break;

		case"linkaddform":
			break;
		
		case"uploadform":
			eval("\$tpl->output(\"".$tpl->get("file_manager_upload_form")."\");");
			break;

		case"download":
			if($file_id) $file_id = "?sid=".$sid."&file_id=".$file_id."&post_id=".$post_data['postid'];
			$download = "download.php";
			if($wbbuserdata['userid'] == $post_data['userid'] || $wbbuserdata['issupermod'] == 1)
				eval ("\$file_add = \"".$tpl->get("file_manager_add")."\";");
			else
				$file_add = "";
				
			if(check_perm(get_board_id($post_data['threadid'])))
				$file_list = make_file_list($post_id, $wbbuserdata['userid']);
				
			eval("\$tpl->output(\"".$tpl->get("file_manager_list")."\");");				
			break;
		default://zeige Dateiliste
			if($wbbuserdata['userid'] == $post_data['userid'] || $wbbuserdata['issupermod'] == 1)
				eval ("\$file_add = \"".$tpl->get("file_manager_add")."\";");
			else
				$file_add = "";
				
			if(check_perm(get_board_id($post_data['threadid'])))
				$file_list =  make_file_list($post_id, $wbbuserdata['userid']);
				
			eval("\$tpl->output(\"".$tpl->get("file_manager_list")."\");");		
	}
}else{
	echo "<small>Sie müssen sich anmelden um Anhänge zu sehen !</small>";
}
?>
