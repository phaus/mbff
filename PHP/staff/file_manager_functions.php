<?php
$filename="file_manager_functions.php";
####################################################################################################################################
$newy = 100;
####################################################################################################################################

function update_file_stat($file_id, $user_id){
	global $db, $n;
	$sql = "SELECT * FROM bb".$n."_file_db_stats 
			WHERE file_id = '$file_id' 
			AND user_id = '$user_id'";
	$result = $db->unbuffered_query($sql);
	if($db -> num_rows($result) > 0){
		$sql = "UPDATE bb".$n."_file_db_stats 
				SET downloads = downloads + 1, date = ".time()."
				WHERE file_id = '$file_id' 
				AND user_id = '$user_id'";
	}else{
		$sql = "INSERT INTO bb".$n."_file_db_stats 
				(file_id, user_id, downloads, date)
				VALUES
				(".$file_id.", ".$user_id." , 1, ".time().")";	
	}	
	$db->unbuffered_query($sql);
}


function build_thumb($file_name, $file_ext, $folder_name, $newy = 100){
	$imgsrcsz = getimagesize($folder_name.$file_name.".".$file_ext);
	$multi = $imgsrcsz[1]/$newy;
	$newx = $imgsrcsz[0]/$multi;
	$thumb = imagecreatetruecolor($newx, $newy);
	switch($imgsrcsz[2]){
		case"1":
			$imgsrc = imagecreatefromgif($folder_name.$file_name.".".$file_ext);
			break;
		case"2":
			$imgsrc = imagecreatefromjpeg($folder_name.$file_name.".".$file_ext);
			break;
		case"3":
			$imgsrc = imagecreatefrompng($folder_name.$file_name.".".$file_ext);
			break;
		default:
			exit;
			}
	imagecopyresampled($thumb,$imgsrc,0,0,0,0,$newx,$newy,$imgsrcsz[0],$imgsrcsz[1]);
	imageinterlace($thumb,1);		 
	imagepng($thumb, $folder_name."thumbs/".$file_name."_".$newy.".png", 100);
	imagedestroy($thumb);	
}

//gibt die höchste gültige ID eines DB Eintrages aus
function getnewid($db, $table, $field){
global $funccount;
	$funccount++;	
	$sql = "SELECT ".$field." 
			FROM `".$table."` 
			ORDER BY ".$field." DESC
			LIMIT 0,1";
	$result = $db->unbuffered_query($sql);			
	if($row = $db->fetch_array($result))
		$out = intval($row[$field]) + 1; 
	elseif($db -> num_rows($result) == 0)
		$out = 1;
	else
		$out = false;
	
	return $out;
	$db -> free_result($result);
}

function replace_string($string){
	$string = strtolower($string);

	$string = str_replace("ß", "ss", $string);
	$string = str_replace("ö", "oe", $string);
	$string = str_replace("ü", "ue", $string);	
	$string = str_replace("ä", "ae", $string);	

	$string = str_replace(" ", "_", $string);
	//$string = str_replace(".", "_", $string);
	$string = str_replace(",", "_", $string);	

	return ucwords($string);
}

function get_file_list($post_id){
	global $db, $n;
	$files = array();

 	$sql = "SELECT * FROM bb".$n."_file_db 
			WHERE post_id = $post_id
			ORDER BY file_date DESC";
	$result = $db->query($sql);
	while($file = $db->fetch_array($result))
		$files[] = $file;
	return $files;
}
function make_file_info($post_id, $file_id){
	global $db, $tpl, $n; 
	$i = 0;
	$usernames = $downlads = $date = array(); 
	$sql = "SELECT user_id, downloads, date, username
			FROM `bb".$n."_file_db_stats`fs, `bb".$n."_users` u
			WHERE fs.file_id = '".$file_id."' AND u.userid = fs.user_id";
	$result = $db->query($sql);
	while($file = $db->fetch_array($result)) {
		$usernames[$file['user_id']] = $file['username'];
		$downlads[$file['user_id']] += intval($file['downloads']);
		$date[$file['user_id']] = date("j.m.Y, H:i", $file['date']);
	}
	arsort($downlads);
	foreach($downlads as $key => $part){
		if($i%2 == 0)
		$style = 'bgcolor="{tablecolora}" id="tablea"';
		else
		$style = 'bgcolor="{tablecolorb}" id="tableb"';
		$out .= "<tr ".$style."><td align=\"center\">".$usernames[$key]."</td><td align=\"center\">".$downlads[$key]."</td><td align=\"center\"><small>".$date[$key]."</small></td></tr>\n";
		$i++;
	}
return $out;
}
function make_file_list($post_id, $user_id){
	global $db, $tpl, $n, $newy;
	
	$folder_name = "attachments/";
	$files = get_file_list($post_id);
	foreach($files as $file){
		$file['file_size'] = round($file['file_size']/1024);
		if($file['file_ext'] == "gif" || $file['file_ext'] == "png" || $file['file_ext'] == "jpg" || $file['file_ext'] == "jpeg"){
			if(!file_exists($folder_name.'thumbs/'.$file['file_name']."_".$newy.".png"))
				build_thumb("attachment-".$file['file_id'], $file['file_ext'], $folder_name, $newy);
			$icon = "view.php?file_id=".$file['file_id']."&img=thumb"; 	
		}else{
			$icon = "images/file_icons/".$file[file_ext].".gif";
		}
		if($file['user_id'] == $user_id)
			eval ("\$out .= \"".$tpl->get("file_manager_list_bit_edit")."\";");
		else
			eval ("\$out .= \"".$tpl->get("file_manager_list_bit")."\";");
	}
return $out;
}

//gibt alle Daten des Posts zurück
function get_postdata($post_id){
	global $db, $n;
	$sql = "SELECT * FROM bb".$n."_posts WHERE postid = '$post_id' ";
return $db->query_first($sql);
}

function get_board_id($thread_id){
	global $db, $n;
	$sql = "SELECT boardid FROM bb".$n."_threads 
			WHERE threadid = '$thread_id' ";
	$thread = $db->query_first($sql);
	return $thread['boardid'];
}

function check_perm($board_id){
	global $db, $n, $wbbuserdata;
	$sql = "SELECT boardpermission FROM bb".$n."_permissions 
			WHERE boardid = $board_id AND groupid = ".$wbbuserdata['groupid']." ";
	$perm = $db->query_first($sql);
	if($perm['boardpermission'] == 1)
		return true;
	else
		return false;
}

function get_filedata($file_id){
	global $db, $n;
	$sql = "SELECT * FROM bb".$n."_file_db WHERE file_id = '$file_id' ";
return $db->query_first($sql);
}

function delete_file($file_id){
	global $db, $n, $newy;
	$file = get_filedata($file_id);
	if(	unlink("attachments/attachment-".$file['file_id'].".".$file['file_ext'])){		
		if($file['file_ext'] == "gif" || $file['file_ext'] == "png" || $file['file_ext'] == "jpg" || $file['file_ext'] == "jpeg")
			unlink("attachments/thumbs/attachment-".$file['file_id']."_".$newy.".png");
		$sql = "DELETE FROM bb".$n."_file_db
				WHERE file_id = ".$file_id." ";
		$db->unbuffered_query($sql);
		$sql = "DELETE FROM bb".$n."_file_db_stats
				WHERE file_id = ".$file_id." ";
		$db->unbuffered_query($sql);
		return true;
	}else{
		return false;
	}
}

function upload_file(){
	global $db, $n, $wbbuserdata, $post_data;
	if($_FILES['upload']['name']){
		$file_name = replace_string($_FILES['upload']['name']);
		$ext = explode(".", $file_name);
		$file_ext = $ext[sizeof($ext)-1];
		$file_size = $_FILES['upload']['size'];
		$file_id = getnewid($db, "bb".$n."_file_db", "file_id");
		$post_id = $post_data['postid'];
		$thread_id = $post_data['threadid'];
		$user_id = $wbbuserdata['userid'];
			
		$new_name = "attachment-".$file_id.".".$file_ext;
		if(move_uploaded_file($_FILES['upload']['tmp_name'], "./attachments/".$new_name)){
			$sql = "INSERT INTO bb".$n."_file_db
					(file_id, file_name, file_ext, file_size, user_id, post_id, thread_id, file_date) 
					VALUES 
					(".$file_id.", '".$file_name."', '".$file_ext."', ".$file_size.", ".$user_id.", ".$post_id.", ".$thread_id.", ".time().")";
			$db->unbuffered_query($sql);
		}
	}
}

?>