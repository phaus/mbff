<?php
$filename="statistic.php";

require("./global.php");
if($wbbuserdata['canviewprofile']==0) access_error();
require("./acp/lib/class_parse.php");

function array_max($array){
	foreach($array as $part)
		if($part > $temp)
			$temp = $part;
return $temp;
}

function file_top_list($array, $max, $names, $posts){
	global $sid;
	$out = "<table width=\"90%\">";
	foreach($array as $key => $part){
		if($part)
			$pro = round(intval($part)/$max * 100)-10;
		else
			$pro = 1;		
		$out .= "<tr><td nowrap ><a title=\"gehe zum Beitrag\" href=\"thread.php?postid=".$posts[$key]."&sid=".$sid."#".$posts[$key]."\">".$names[$key]."</a></td><td nowrap valign=\"middle\"><img  title=\"".$pro."%\" alt=\"".$pro."%\" src=\"images/dynspacer.php?h=10&w=".$pro."\"  />  ".$part."</td></tr>";
	}
	$out .= "</table>";
	return $out;
}

function file_list($array, $max){
	$out = "<table width=\"90%\">";
	foreach($array as $key => $part){
		if($part)
			$pro = round(intval($part)/$max * 100)-10;
		else
			$pro = 1;		
		$out .= "<tr><td><img height=\"20\" border=\"0\" src=\"images/file_icons/".$key.".gif\" />.".$key." File</td><td valign=\"middle\"><img  title=\"".$pro."%\" alt=\"".$pro."%\" src=\"images/dynspacer.php?h=10&w=".$pro."\"  />  ".$part."</td></tr>";
	}
	$out .= "</table>";
	return $out;
}

function build_table($count = 12, $array, $max){
	$out= "<table border = \"0\"><tr>";
		if($count == 24){ 
			$i = 0;
			$count = 23;
		}else
			$i = 1;
	for(; $i <= $count;){
		if($array[$i])
			$pro = round(intval($array[$i])/$max * 100)-10;
		else
		$pro = 1;
		$rest = 100 - $pro;
		$out .= "<td width=\"20\" valign=\"bottom\" align = \"center\">\n
				".$array[$i]."<img title=\"".$pro."%\" alt=\"".$pro."%\" src=\"images/dynspacer.php?h=".$pro."\">
				</td>\n";
		$footer .= "<td align=\"center\">".$i++."</td>\n";
	}
	$out.="</tr><tr>".$footer;
	$out .= "</tr></table>";	
	return $out;
}

if(!$wbbuserdata['userid']) eval("error(\"".$tpl->get("error_falselink")."\");");
else{
	$used_storage = 0;
	$filecount = 0;
	$downloads = 0;
	$fileupusercount = array();
	$fileupdate = array();

	$filedownusercount = array();	
	$posttime = $postdate = array();
	$fileext = array();
	$filenames = $fileposts = $filedowncount = $filedowndate = $filetraffic = array();
	$activitydate = array();
	$sql = "SELECT file_id, file_name, post_id, file_size, file_ext, file_date, user_id FROM `bb".$n."_file_db`";
	$result = $db->query($sql);
	while($file = $db->fetch_array($result)) {
		$filecount++;
		$used_storage += intval($file['file_size']);
		$filesizes[$file['file_id']] = $file['file_size'];
		$fileposts[$file['file_id']] = $file['post_id'];
		$filenames[$file['file_id']] = $file['file_name'];
		$fileext[$file['file_ext']] += 1;
		$fileuserupcount[$file['user_id']] += 1;
		$fileupdate[date("n", $file['file_date'])] += 1;
	}
		
	$sql = "SELECT file_id, user_id, downloads, date FROM `bb".$n."_file_db_stats`";
	$result = $db->query($sql);
	while($file = $db->fetch_array($result)) {
		$downloads+= intval($file['downloads']);
		$filetraffic[date("n", $file['date'])] += round(intval($file['downloads'])*$filesizes[$file['file_id']]/(1024*1024),2);
		$filedowncount[$file['file_id']] += intval($file['downloads']);
		$filedownusercount[$file['user_id']] += intval($file['downloads']);		
		$filedowndate[date("n", $file['date'])] += intval($file['downloads']);
	}

	$sql = "SELECT userid, username, regdate, lastactivity, userposts FROM `bb".$n."_users`";
	$result = $db->query($sql);
	while($usr = $db->fetch_array($result)) {
		$usernames[$usr['userid']] = $usr['username'];
		$userposts[$usr['userid']] = $usr['userposts'];
		$activitydate[date("G", $usr['lastactivity'])] += 1;
		$regdate[date("n", $usr['regdate'])] += 1;		
	}

	$sql = "SELECT userid, posttime FROM `bb".$n."_posts`";
	$result = $db->query($sql);
	while($post = $db->fetch_array($result)) {
		$postdate[date("n", $post['posttime'])] += 1;		
		$posttime[date("G", $post['posttime'])] += 1;		
	}

	arsort($fileext);
	$extmax = array_max($fileext);
	arsort($fileupdate);
	$upmax = array_max($fileupdate);
	arsort($filedowndate);
	$downmax = array_max($filedowndate);
	arsort($regdate);
	$regmax = array_max($regdate);
	
	arsort($activitydate);
	$activitydatemax = array_max($activitydate);
	
	arsort($posttime);
	$posttimemax = array_max($posttime);
	
	arsort($postdate);
	$postdatemax = array_max($postdate);
	
	arsort($filedowncount);
	$filedownmax = array_max($filedowncount);

	arsort($filetraffic);
	$filetrafficmax = array_max($filetraffic);
	
//	arsort($filedownusercount);
//	$userdownmax = array_max($filedownusercount);	
//	arsort($fileuserupcount);
//	$userupmax = array_max($fileuserupcount);
	/*------------------------------*/
	
	$used_storage = round($used_storage/(1024*1024),2);
	$dtime = date("j.m.Y", $rekordtime);
	$upstat = build_table(12, $fileupdate, $upmax);
	$downstat = build_table(12, $filedowndate, $downmax);
	$filetraffic = build_table(12, $filetraffic, $filetrafficmax);
	$userreg = build_table(12, $regdate, $regmax);	
	$postdate = build_table(12, $postdate, $postdatemax);	
	$activitydate = build_table(24, $activitydate, $activitydatemax);	
	$posttime = build_table(24, $posttime, $posttimemax);
	$files_top = file_top_list($filedowncount, $filedownmax, $filenames, $fileposts);
//	$userup = file_list($fileuousercount, $userupmax);
//	$userdown = file_list($filedownusercount, $userdownmax);
	$filelist = file_list($fileext, $extmax);
	eval("\$tpl->output(\"".$tpl->get("statistic")."\");");
}
?>