<?php
require ("./global.php");
isAdmin();

if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
else $action="view";

// How much Avatars per page?
$avatarsperpage = "15";

if($action == "view") {
 $count="";
 $sel_sortby['0'] = "";
 $sel_sortby['1'] = "";
 $sel_orderby['ASC'] = "";
 $sel_orderby['DESC'] = "";
 if(!isset($_REQUEST['sortby'])) $_REQUEST['sortby'] = "";
 if(!isset($_REQUEST['orderby'])) $_REQUEST['orderby'] = "";

 switch($_REQUEST['sortby']){
  CASE "0": $where = "WHERE a.userid = 0"; break;
  CASE "1": $where = "WHERE a.userid <> 0"; break;
  DEFAULT:
   $where = "WHERE a.userid = 0";
   $_REQUEST['sortby'] = "0";
  break;
 }

 switch($_REQUEST['orderby']){ 
  CASE "ASC": break;
  CASE "DESC": break;
  DEFAULT: $_REQUEST['orderby'] = "DESC"; break;
 }

 $sel_sortby[$_REQUEST['sortby']] = " SELECTED";
 $sel_orderby[$_REQUEST['orderby']] = " SELECTED";	
	
 if($_REQUEST['sortby'] == "1") list($avatarcount) = $db->query_first("SELECT count(avatarid) FROM bb".$n."_avatars WHERE userid <> 0");
 else list($avatarcount) = $db->query_first("SELECT count(avatarid) FROM bb".$n."_avatars WHERE userid = 0");
 if(isset($_REQUEST['page'])){
  $page = intval($_REQUEST['page']);
  if($page == "0") $page = "1";
 }
 else $page = "1";
 
 $pages = ceil($avatarcount / $avatarsperpage);
 if($_REQUEST['sortby'] == "1"){
  $result = $db->query("SELECT a.*, g.title, u.username FROM bb".$n."_avatars a LEFT JOIN bb".$n."_groups g USING(groupid) LEFT JOIN bb".$n."_users u ON (a.userid = u.userid) ".$where." ORDER BY a.needposts $_REQUEST[orderby], a.avatarid $_REQUEST[orderby]",$avatarsperpage,$avatarsperpage*($page-1));
  while($row = $db->fetch_array($result)) {
   if($row['title'] == "") eval ("\$row['title'] = \"".gettemplate("avatar_allgroups")."\";");
   $avatarname = "../images/avatars/avatar-$row[avatarid].$row[avatarextension]";
   $width = $row['width'];
   $height = $row['height'];
   if($row['avatarextension'] == "swf") eval ("\$avatarchoice = \"".gettemplate("avatar_flash")."\";"); 
   else eval ("\$avatarchoice = \"".gettemplate("avatar_image")."\";"); 
   $rowclass = getone($count, "firstrow", "secondrow");
   $row['avatarname'] = stripslashes($row['avatarname']);
   eval ("\$avatar_viewbit .= \"".gettemplate("avatar_viewbit2")."\";"); 
   $count++;
  }
 }
 else {
  $result = $db->query("SELECT a.*, g.title FROM bb".$n."_avatars a LEFT JOIN bb".$n."_groups g USING(groupid) ".$where." ORDER BY a.needposts $_REQUEST[orderby], a.avatarid $_REQUEST[orderby]",$avatarsperpage,$avatarsperpage*($page-1));
  while($row = $db->fetch_array($result)){
   if($row['title'] == "") eval ("\$row['title'] = \"".gettemplate("avatar_allgroups")."\";");
   $avatarname = "../images/avatars/avatar-$row[avatarid].$row[avatarextension]";
   $width = $row['width'];
   $height = $row['height'];
   if($row['avatarextension'] == "swf") eval ("\$avatarchoice = \"".gettemplate("avatar_flash")."\";"); 
   else eval ("\$avatarchoice = \"".gettemplate("avatar_image")."\";"); 
   $rowclass = getone($count, "firstrow", "secondrow");
   $row['avatarname'] = stripslashes($row['avatarname']);
   eval ("\$avatar_viewbit .= \"".gettemplate("avatar_viewbit")."\";"); 
   $count++;
  }
 }
 
 if($avatarcount) $countfrom = 1+$avatarsperpage*($page-1);
 else $countfrom=0;
 $countto = $avatarsperpage*$page;
 if($countto > $avatarcount) $countto = $avatarcount;
 if($pages > 1) $pagelink = makeadminpagelink("avatar.php?action=view&sid=$session[hash]&sortby=$_REQUEST[sortby]&orderby=$_REQUEST[orderby]",$page,$pages,2);
 if($_REQUEST['sortby'] == "1") eval("print(\"".gettemplate("avatar_view2")."\");");
 else eval("print(\"".gettemplate("avatar_view")."\");");
}

if($action == "add"){
 if(isset($_POST['send'])) {
  if($_FILES['avatar_file']['tmp_name'] == "none") eval ("\$avatar_error = \"".gettemplate("avatar_error")."\";");
  else {
   $avatar_extension = strtolower(substr(strrchr($_FILES['avatar_file']['name'],"."),1));
   $avatar_name =  substr($_FILES['avatar_file']['name'],0,(intval(strlen($avatar_extension))+1)*-1);
   
   $db->query("INSERT INTO bb".$n."_avatars (avatarid,avatarname,avatarextension,groupid,needposts,userid) VALUES (NULL,'".addslashes($avatar_name)."', '".addslashes($avatar_extension)."','".$_POST['groupid']."', '".$_POST['needposts']."', '0')");
   $avatarid = $db->insert_id();
   if(move_uploaded_file($_FILES['avatar_file']['tmp_name'], "../images/avatars/avatar-".$avatarid.".".$avatar_extension."")){
    chmod("../images/avatars/avatar-".$avatarid.".".$avatar_extension,0777);
    
    $imagesize = @getimagesize("../images/avatars/avatar-".$avatarid.".".$avatar_extension);
    $width = $imagesize[0];
    $height = $imagesize[1];
    
    $db->unbuffered_query("UPDATE bb".$n."_avatars SET width='$width', height='$height' WHERE avatarid='$avatarid'",1);
    
    header("Location: avatar.php?action=view&sid=$session[hash]");
    exit();
   }
   else {
    $db->query("DELETE FROM bb".$n."_avatars WHERE avatarid = '".$avatarid."'");
    eval ("\$avatar_error = \"".gettemplate("avatar_error")."\";");
   }
  }
 }
 
 $result = $db->query("SELECT groupid, title, canuseavatar, allowedavatarextensions, maxavatarwidth, maxavatarheight, maxavatarsize FROM bb".$n."_groups WHERE default_group <> 1");
 while($row = $db->fetch_array($result)) $avatar_groupsbit .= makeoption($row['groupid'],$row['title'],"",0);
 eval("print(\"".gettemplate("avatar_add")."\");");
}

if($action == "edit"){
 if(isset($_POST['send'])) {
  $db->query("UPDATE bb".$n."_avatars SET groupid = '".$_POST['groupid']."', needposts = '".$_POST['needposts']."' WHERE avatarid = '".$_POST['avatarid']."'");
  header("Location: avatar.php?action=view&sid=$session[hash]");
  exit();
 }
	
 $row2 = $db->query_first("SELECT avatarid, avatarname, avatarextension, width, height, groupid, needposts FROM bb".$n."_avatars WHERE avatarid = '".$_REQUEST['avatarid']."'");
 $result = $db->query("SELECT groupid, title FROM bb".$n."_groups WHERE default_group <> 1");
 while($row = $db->fetch_array($result)) $avatar_groupsbit .= makeoption($row['groupid'],$row['title'],$row2['groupid'],1);
 $avatarname = "../images/avatars/avatar-$row2[avatarid].$row2[avatarextension]";
 $width = $row2['width'];
 $height = $row2['height'];
 if($row2['avatarextension'] == "swf") eval ("\$avatarimage = \"".gettemplate("avatar_flash")."\";"); 
 else eval ("\$avatarimage = \"".gettemplate("avatar_image")."\";"); 
 $row2['avatarname'] = stripslashes($row2['avatarname']);
 eval("print(\"".gettemplate("avatar_edit")."\");");
}

if($action == "del"){
 $row = $db->query_first("SELECT avatarid, avatarname, avatarextension, width, height FROM bb".$n."_avatars WHERE avatarid = '".$_REQUEST['avatarid']."'");
 if(isset($_POST['send'])) {
  $db->query("DELETE FROM bb".$n."_avatars WHERE avatarid = '".$_POST['avatarid']."'");
  $db->query("UPDATE bb".$n."_users SET avatarid = '0' WHERE avatarid = '".$_POST['avatarid']."'");
  @unlink("../images/avatars/avatar-$row[avatarid].$row[avatarextension]");
  header("Location: avatar.php?action=view&sid=$session[hash]");
  exit();
 }
	
 $avatarname = "../images/avatars/avatar-$row[avatarid].$row[avatarextension]";
 $width = $row['width'];
 $height = $row['height'];
 if($row['avatarextension'] == "swf") eval ("\$avatarimage = \"".gettemplate("avatar_flash")."\";"); 
 else eval ("\$avatarimage = \"".gettemplate("avatar_image")."\";"); 
 $row['avatarname'] = stripslashes($row['avatarname']);	
 eval("print(\"".gettemplate("avatar_del_confirm")."\");");
}

if($action=="readfolder") {
 if(isset($_POST['send'])) {
  $avatarfolder="../".$_POST['avatarfolder'];
  if(is_dir($avatarfolder) && $avatarfolder!="../images/avatars" && $avatarfolder!="../images/avatars/" && $avatarfolder!="..//images/avatars" && $avatarfolder!="..//images/avatars/") {
   
   $totalcount=0;
   $goodcount=0;
   $handle=@opendir($avatarfolder);
   while($file=readdir($handle)) {	
    if($file==".." || $file=="." || !strstr($file,".")) continue;
    
    $avatar_extension = strtolower(substr(strrchr($file,"."),1));
    $avatar_name = substr($file,0,(intval(strlen($avatar_extension))+1)*-1);
    $imagesize = @getimagesize("$avatarfolder/$file");
    $width = $imagesize[0];
    $height = $imagesize[1];
    
    $db->query("INSERT INTO bb".$n."_avatars (avatarid,avatarname,avatarextension,width,height,groupid,needposts) VALUES (NULL,'".addslashes($avatar_name)."', '".addslashes($avatar_extension)."','$width','$height','".$_POST['groupid']."', '".$_POST['needposts']."')");
    $avatarid = $db->insert_id();
   
    if(copy("$avatarfolder/$file", "../images/avatars/avatar-".$avatarid.".".$avatar_extension)){
     chmod("../images/avatars/avatar-".$avatarid.".".$avatar_extension,0777);
     $goodcount++;
    }
    else $db->query("DELETE FROM bb".$n."_avatars WHERE avatarid = '".$avatarid."'");
    $totalcount++;
   }
  
   eval("print(\"".gettemplate("avatar_readfolder_done")."\");");
  }
  else eval("acp_error(\"".gettemplate("error_avatar_readfolder")."\");");
  exit();
 }
 
 $result = $db->query("SELECT groupid, title, canuseavatar, allowedavatarextensions, maxavatarwidth, maxavatarheight, maxavatarsize FROM bb".$n."_groups WHERE default_group <> 1");
 while($row = $db->fetch_array($result)) $avatar_groupsbit .= makeoption($row['groupid'],$row['title'],"",0);
 eval("print(\"".gettemplate("avatar_readfolder")."\");");
}
?>