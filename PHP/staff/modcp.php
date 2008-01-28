<?php
$filename="modcp.php";

require ("./global.php");


$ismod=0;
$isuser=0;
if(isset($threadid)) {
 if($wbbuserdata['issupermod']==1 || $modpermissions['userid']) $ismod=1;
 elseif($wbbuserdata['userid'] && $wbbuserdata['userid']==$thread['starterid'] && ($wbbuserdata['cancloseowntopic']==1 || $wbbuserdata['candelowntopic']==1 || $wbbuserdata['caneditowntopic']==1)) $isuser=1;
}

if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
else $action="";

if($action=="" || $action==-1) eval("error(\"".$tpl->get("error_falselink")."\");");

if($action=="thread_close") {
 if(!$ismod && (!$isuser || $wbbuserdata['cancloseowntopic']==0)) access_error();
 $db->query("UPDATE bb".$n."_threads SET closed=1-'$thread[closed]' WHERE threadid='$threadid'");
 header("Location: thread.php?threadid=$threadid&sid=$session[hash]");
 exit();
}

if($action=="thread_top") {
 if(!$ismod) access_error();
 if($thread['important']==2) {
  $db->query("DELETE FROM bb".$n."_announcements WHERE threadid='$threadid'");
  $thread['important']=1;
 }
 $db->query("UPDATE bb".$n."_threads SET important=1-'$thread[important]' WHERE threadid='$threadid'");
 header("Location: thread.php?threadid=$threadid&sid=$session[hash]");
 exit();
}

if($action=="thread_del") {
 if(!$ismod && (!$isuser || $wbbuserdata['candelowntopic']==0)) access_error();
 if(isset($_POST['send'])) {
##FM - START##
 	require("file_manager_functions.php");
	$sql = "SELECT postid 
  			FROM bb".$n."_posts 
			WHERE threadid = ".$threadid." ";
	$result = $db->query($sql);
	while($row = $db->fetch_array($result)){
		$files = get_file_list($row['postid']);
		foreach($files as $file)
			delete_file($file['file_id']);
	}
##FM - ENDE##
  deletethread($threadid);
  header("Location: board.php?boardid=$boardid&sid=$session[hash]");
  exit();
 }
 else {
  $navbar=getNavbar($board['parentlist']);
  eval ("\$navbar .= \"".$tpl->get("navbar_board")."\";");
  eval("\$tpl->output(\"".$tpl->get("modcp_thread_del")."\");");
 }
}

if($action=="thread_move") {
 if(!$ismod) access_error();
 if($_POST['send']=="send") {
  $newboardid=intval($_POST['newboardid']);
  $mode=$_POST['mode'];
  if(!$newboardid || $newboardid==-1 || $newboardid==$boardid) eval("error(\"".$tpl->get("error_cantmove")."\");");
  $newboard = $db->query_first("SELECT
   b.*,".ifelse($useuseraccess==1 && $wbbuserdata[userid],"
   IF(a.boardid=$newboardid,a.boardpermission,p.boardpermission) AS boardpermission,
   IF(a.boardid=$newboardid,a.startpermission,p.startpermission) AS startpermission,
   IF(a.boardid=$newboardid,a.replypermission,p.replypermission) AS replypermission
   ","p.*")."
   FROM bb".$n."_boards b
   LEFT JOIN bb".$n."_permissions p ON (p.boardid='$newboardid' AND p.groupid='$wbbuserdata[groupid]')
   ".ifelse($useuseraccess==1 && $wbbuserdata[userid],"LEFT JOIN bb".$n."_access a ON (a.boardid='$newboardid' AND a.userid='$wbbuserdata[userid]')")."
   WHERE b.boardid = '$newboardid'");

  if(!$newboard['boardpermission'] || $newboard['isboard']==0) eval("error(\"".$tpl->get("error_cantmove")."\");");

  movethread($threadid,$mode,$newboardid);

  header("Location: thread.php?threadid=$threadid&sid=$session[hash]");
  exit();
 }
 else {
  $navbar=getNavbar($board['parentlist']);
  eval ("\$navbar .= \"".$tpl->get("navbar_board")."\";");

  $result = $db->query("SELECT boardid, parentid, boardorder, IF(isboard=1,title,CONCAT(title,' *')) AS title, invisible, isboard FROM bb".$n."_boards ORDER by parentid ASC, boardorder ASC");
  while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;

  $result = $db->query("SELECT * FROM bb".$n."_permissions WHERE groupid = '$wbbuserdata[groupid]'");
  while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;
  if($wbbuserdata[userid] && $useuseraccess==1) {
   $result = $db->query("SELECT * FROM bb".$n."_access WHERE userid = '$wbbuserdata[userid]'");
   while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;
  }

  $newboard_options=makeboardselect(0);

  eval("\$tpl->output(\"".$tpl->get("modcp_thread_move")."\");");
 }
}

if($action=="thread_edit") {
 if(!isset($threadid)) eval("error(\"".$tpl->get("error_falselink")."\");");
 if(!$ismod && (!$isuser || $wbbuserdata['caneditowntopic']==0)) access_error();
 if(isset($_POST['send'])) {
  $topic=trim($_POST['topic']);
  if(isset($_POST['iconid'])) $iconid=intval($_POST['iconid']);
  else $iconid=0;
  if($dostopshooting==1) $topic=stopShooting($topic);
  if(!$topic) eval("error(\"".$tpl->get("error_emptyfields")."\");");
  if($ismod==1) $important=intval($_POST['important']);
  else $important=$thread['important'];
  if($important==2 && $thread['important']!=2) $db->unbuffered_query("INSERT IGNORE INTO bb".$n."_announcements (boardid,threadid) VALUES ($boardid,$threadid)");
  if($important!=2 && $thread['important']==2) $db->unbuffered_query("DELETE FROM bb".$n."_announcements WHERE threadid = '$threadid'",1);

  // remove redirect(s)
  if($ismod==1 && isset($_POST['rm_redirect']) && $_POST['rm_redirect']==1) $db->unbuffered_query("DELETE FROM bb".$n."_threads WHERE pollid='$threadid' AND closed=3",1);

  $db->unbuffered_query("UPDATE bb".$n."_threads SET topic='".addslashes(htmlspecialchars($topic))."', iconid='$iconid', closed='".intval($_POST['closed'])."', important='$important' WHERE threadid='$threadid'",1);

  if(isset($_POST['submitbutton']) || (!isset($_POST['announce']) || !$_POST['announce'])) header("Location: thread.php?threadid=$threadid&sid=$session[hash]");
  else header("Location: modcp.php?action=announce&threadid=$threadid&sid=$session[hash]");
  exit();
 }

 if($board['allowicons']==1) {
  $ICONselected[$thread['iconid']]="checked";
  $result = $db->query("SELECT * FROM bb".$n."_icons ORDER BY iconorder ASC");
  $iconcount=0;
  while($row=$db->fetch_array($result)) {
   $row_iconid=$row['iconid'];
   eval ("\$choice_posticons .= \"".$tpl->get("newthread_iconbit")."\";");
   if($iconcount==6) {
    $choice_posticons.="<br>";
    $iconcount=0;
   }
   else $iconcount++;
  }
  eval ("\$newthread_icons = \"".$tpl->get("newthread_icons")."\";");
 }

 if($thread['closed']==1) $checked=" checked";

 $navbar=getNavbar($board[parentlist]);
 eval ("\$navbar .= \"".$tpl->get("navbar_board")."\";");

 $oldboardid_checked="";
 if($ismod==1) {
  $imp_checked[$thread['important']]=" checked";
  eval ("\$change_important = \"".$tpl->get("modcp_thread_edit_important")."\";");

  list($redirectlink) = $db->query_first("SELECT COUNT(*) FROM bb".$n."_threads WHERE pollid='$threadid' AND closed=3");
  if($redirectlink>0) eval ("\$remove_redirect = \"".$tpl->get("modcp_thread_remove_redirect")."\";");
 }

 eval("\$tpl->output(\"".$tpl->get("modcp_thread_edit")."\");");
}

if($action=="announce") {
 if(!isset($threadid) || $thread['important']!=2) eval("error(\"".$tpl->get("error_falselink")."\");");
 if($ismod==0) access_error();
 if(isset($_POST['send'])) {
  $db->query("DELETE FROM bb".$n."_announcements WHERE boardid<>'$boardid' AND threadid='$threadid'");
  $boardids = $_POST['boardids'];
  if(count($boardids)) {
   $boardids = implode("','$threadid'),('",$boardids);
   $db->query("INSERT IGNORE INTO bb".$n."_announcements (boardid,threadid) VALUES ('$boardids','$threadid')");
  }

  header("Location: thread.php?threadid=$threadid&sid=$session[hash]");
  exit();
 }

 $result = $db->query("SELECT boardid, parentid, boardorder, title, invisible FROM bb".$n."_boards ORDER by parentid ASC, boardorder ASC");
 while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;

 $result = $db->query("SELECT * FROM bb".$n."_permissions WHERE groupid = '$wbbuserdata[groupid]'");
 while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;
 if($wbbuserdata['userid'] && $useuseraccess==1) {
  $result = $db->query("SELECT * FROM bb".$n."_access WHERE userid = '$wbbuserdata[userid]'");
  while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;
 }

 $boardids=array();
 $result = $db->query("SELECT boardid FROM bb".$n."_announcements WHERE threadid='$threadid'");
 while($row=$db->fetch_array($result)) $boardids[]=$row['boardid'];

 $board_options=makeboardselect(0,1,$boardids);

 $navbar=getNavbar($board[parentlist]);
 eval ("\$navbar .= \"".$tpl->get("navbar_board")."\";");

 eval("\$tpl->output(\"".$tpl->get("modcp_announce")."\");");
}
?>
