<?php
$filename="view.php";
require("./global.php");
require("file_manager_functions.php");
if(isset($wbbuserdata['userid']) && $wbbuserdata['userid'] != 0){
	$file = get_filedata($_REQUEST['file_id']);
	if(check_perm(get_board_id($file['thread_id']))){
		
		if($_REQUEST['img'] == "thumb"){
			$folder_name = "attachments/thumbs/";
			$file_name = $folder_name."attachment-".$file['file_id']."_".$newy.".png";
		}else{
			$folder_name = "attachments/";
			$file_name = $folder_name."attachment-".$file['file_id'].".".$file['file_ext'];
		}
	
		$imgsrcsz = getimagesize($file_name);
		switch($imgsrcsz[2]){
			case"1":
				$img = imagecreatefromgif($file_name);
				break;
			case"3":
				$img = imagecreatefrompng($file_name);
				break;
			case"2":
				$img = imagecreatefromjpeg($file_name);
				break;
			default:
				$img = imagecreatefromgif("images/file_icons/".$file['file_ext'].".gif");
				}

	}else{

		$img = imagecreatefromgif("images/file_icons/else.gif");
	}
}else{
	
	$img = imagecreatefromgif("images/file_icons/else.gif");
}

header("Content-Type: image/png");
imageinterlace($img,1);	
imagepng($img, "",100);
imagedestroy($img);	

?>
