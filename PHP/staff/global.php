<?php
@error_reporting(7);
$phpversion = phpversion();
$pagestarttime=microtime();
$query_count=0;
/** get function libary **/
require("./acp/lib/functions.php");
if (version_compare($phpversion, '4.1.0') == -1) {
 $_REQUEST=array();
 $_COOKIE=array();
 $_POST=array();
 $_GET=array();
 $_SERVER=array();
 $_FILES=array();
 get_vars_old();
}
// remove slashes in get post cookie data...
if (get_magic_quotes_gpc()) {
  if(is_array($_REQUEST)) $_REQUEST=stripslashes_array($_REQUEST);
  if(is_array($_POST)) $_POST=stripslashes_array($_POST);
  if(is_array($_GET)) $_GET=stripslashes_array($_GET);
  if(is_array($_COOKIE)) $_COOKIE=stripslashes_array($_COOKIE);
}
@set_magic_quotes_runtime(0);
/** connect db **/
require("./acp/lib/config.inc.php");
require("./acp/lib/class_db_mysql.php");

$db = new db($sqlhost,$sqluser,$sqlpassword,$sqldb,$phpversion);

/** get configuration **/
require("./acp/lib/options.inc.php");

/** request ids **/
if(isset($_REQUEST['postid'])) $postid=$_REQUEST['postid'];
if(isset($_REQUEST['threadid'])) $threadid=$_REQUEST['threadid'];
if(isset($_REQUEST['pollid'])) $pollid=$_REQUEST['pollid'];
if(isset($_REQUEST['boardid'])) $boardid=$_REQUEST['boardid'];

/** verify ids **/
if(isset($postid)) {
 $postid = intval($postid);
 $post = $db->query_first("SELECT * FROM bb".$n."_posts WHERE postid = '$postid'");
 if(!$post['postid']) unset($postid);
 else $threadid = $post['threadid'];
}
if(isset($threadid)) {
 $threadid = intval($threadid);
 $thread = $db->query_first("SELECT * FROM bb".$n."_threads WHERE threadid = '$threadid'");
 if(!$thread['threadid']) unset($threadid);
 else $boardid = $thread['boardid'];
}
if(isset($pollid)) {
 $pollid = intval($pollid);
 $poll = $db->query_first("SELECT bb".$n."_polls.*, bb".$n."_threads.boardid FROM bb".$n."_polls LEFT JOIN bb".$n."_threads USING (threadid) WHERE bb".$n."_polls.pollid = '$pollid'");
 if(!$poll['pollid']) unset($pollid);
 else {
  $boardid = $poll['boardid'];
  unset($threadid);
  unset($thread);
 }
}

/** start session **/
require("./acp/lib/session.php");

if(isset($boardid)) {
 $boardid = intval($boardid);
 $board = $db->query_first("SELECT
  b.*, p.*
  FROM bb".$n."_boards b
  LEFT JOIN bb".$n."_permissions p ON (p.boardid='$boardid' AND p.groupid='$wbbuserdata[groupid]')
  WHERE b.boardid = '$boardid'");

 if(!$board['boardid']) unset($boardid);
 else {
  $modpermissions['userid']=0;
  if($wbbuserdata['ismod']==1 && $wbbuserdata['issupermod']!=1) $modpermissions=$db->query_first("SELECT * FROM bb".$n."_moderators WHERE userid='$wbbuserdata[userid]' AND boardid='$boardid'");
 }
}

/** get style **/
$style=array();
if($session['styleid'] && (!isset($board) || !$board['enforcestyle'])) $style = $db->query_first("SELECT * FROM bb".$n."_styles WHERE styleid = '$session[styleid]'");
if(!isset($style['styleid']) && $wbbuserdata['styleid'] && (!isset($board) || !$board['enforcestyle'])) $style = $db->query_first("SELECT * FROM bb".$n."_styles WHERE styleid = '".$wbbuserdata['styleid']."'");
if(!isset($style['styleid']) && isset($board) && $board['styleid']!=0) $style = $db->query_first("SELECT * FROM bb".$n."_styles WHERE styleid = '".$board['styleid']."'");
if(!isset($style['styleid'])) $style = $db->query_first("SELECT * FROM bb".$n."_styles WHERE default_style = 1");

/** template class -> caching **/
require("./acp/lib/class_headers.php");
require("./acp/lib/class_tpl_file.php");
$tpl = new tpl(0,intval($style['subvariablepackid']));

/** templates & style **/
$phpinclude = str_replace("\\\"","\"",$tpl->get("phpinclude"));
if(trim($phpinclude)) eval($phpinclude);

//unread Messages
$sql = "SELECT COUNT(*) 
		FROM bb".$n."_privatemessage
		WHERE recipientid = ".$wbbuserdata['userid']." AND view < 1 AND deletepm != 1";
$count = $db->query_first($sql);
if($count[0] == 0)
	$top_pm_img = "pm.gif";
else
	$top_pm_img = "top_pm_changed.gif";

$header_acp="";
eval ("\$headinclude = \"".$tpl->get("headinclude")."\";");
eval ("\$footer = \"".$tpl->get("footer")."\";");
if($wbbuserdata['userid']) {
 eval ("\$usercp_or_register = \"".$tpl->get("header_usercp")."\";");
 eval ("\$usercbar = \"".$tpl->get("usercbar")."\";");
 if($wbbuserdata['canuseacp']==1) eval ("\$header_acp = \"".$tpl->get("header_acp")."\";");
}
else {
 eval ("\$usercp_or_register = \"".$tpl->get("header_register")."\";");
 eval ("\$usercbar = \"".$tpl->get("usercbar_guest")."\";");
}
eval ("\$header = \"".$tpl->get("header")."\";");


if(($wbbuserdata['canviewboard']==0 || $wbbuserdata['blocked']==1 || ($wbbuserdata['userid'] && $wbbuserdata['activation']!=1)) && $filename!="login.php" && $filename!="logout.php" && $filename!="register.php" && $filename!="forgotpw.php") access_error();
verify_ip($REMOTE_ADDR);
if($offline==1 && $wbbuserdata['canviewoffboard']==0 && $filename!="login.php" && $filename!="logout.php" && $filename!="forgotpw.php") {
 $offlinemessage=nl2br($offlinemessage);
 eval("\$tpl->output(\"".$tpl->get("offline")."\");");
 exit();
}

if($wbbuserdata['pmpopup']==2) {
 if($filename!="pms.php" && (!isset($_POST) || count($_POST)==0) && $filename!="logout.php" && $filename!="markread.php" && $filename!="misc.php" && $filename!="modcp.php" && $filename!="polledit.php" && $filename!="register.php" && $filename!="search.php" && ($filename!="thread.php" || !isset($_REQUEST['goto'])) && $filename!="threadrating.php" && $filename!="usercp.php") eval ("\$headinclude .= \"".$tpl->get("pmpopup_open")."\";");
}

if(isset($boardid)) {
 if(!$board['boardpermission']) access_error();
 if($board['password']) {
  if(isset($_COOKIE['boardpasswords'])) $boardpasswords=decode_cookie($_COOKIE['boardpasswords']);
  else $boardpasswords=array();

  if(isset($_POST['boardpassword'])) {
   if($_POST['boardpassword']==$board['password']) {
    $boardpasswords[$boardid]=md5($board['password']);
    if($wbbuserdata['usecookies']==1) encode_cookie("boardpasswords",time()+3600*24*365,false);
    else encode_cookie("boardpasswords",0,false);
    header("Location: board.php?boardid=$boardid&sid=$session[hash]");
    exit();
   }
   else eval("error(\"".$tpl->get("error_falsepassword")."\");");
  }
  elseif(!isset($boardpasswords[$boardid]) || $boardpasswords[$boardid]!=md5($board['password'])) {
   eval("\$tpl->output(\"".$tpl->get("board_password")."\");");
   exit();
  }
 }
}

if(isset($threadid) && $thread['visible']==0 && $wbbuserdata['canuseacp']==0 && $wbbuserdata['issupermod']==0 && ($wbbuserdata['ismod']==0 || !$modpermissions['userid'])) eval("error(\"".$tpl->get("error_falselink")."\");");
if(isset($postid) && $post['visible']==0 && $wbbuserdata['canuseacp']==0 && $wbbuserdata['issupermod']==0 && ($wbbuserdata['ismod']==0 || !$modpermissions['userid'])) eval("error(\"".$tpl->get("error_falselink")."\");");
?>