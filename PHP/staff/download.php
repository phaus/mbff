<?
$filename="download.php";
require ("./global.php");
require("file_manager_functions.php");
/*
MAIN
*/
if(isset($wbbuserdata['userid']) && $wbbuserdata['userid'] != 0){
	$post_data = get_postdata($post_id);
	if(check_perm(get_board_id($post_data['threadid'])))
		$file = get_filedata($file_id);
		update_file_stat($file_id, $wbbuserdata['userid']);
	if($file['file_ext']=="gif")
		$mime_type = 'image/gif';
	elseif($file['file_ext']=="jpg" || $file['file_ext']=="jpeg")
		$mime_type = 'image/jpeg';
	elseif($file['file_ext']=="png")
		$mime_type = 'image/png';
	else {
		$mime_type = (USR_BROWSER_AGENT == 'IE' || USR_BROWSER_AGENT == 'OPERA') ? 'application/octetstream' : 'application/octet-stream';
		$content_disp = (USR_BROWSER_AGENT == 'IE') ? 'inline; ' : 'attachment; ';
	}
	header('Content-Type: '.$mime_type);
	//header('Content-disposition: '.$content_disp.'filename="'.$file['file_name'].'.'.$file['file_ext'].'"');
	header("Content-Disposition: attachment; filename=".$file['file_name']."");
	header('Pragma: no-cache');
	header('Expires: 0');
	readfile("attachments/attachment-".$file['file_id'].".".$file['file_ext']);
}else{
    $msg = "Sie müssen sich anmelden um Anhänge herunterladen zu können !";
    echo "<script language=\"JavaScript\">window.alert('".$msg."');</script>";
}
?>
