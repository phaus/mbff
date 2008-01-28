<?php
$filename="index.php";

require("./global.php");

if(isset($_COOKIE['boardvisit'])) $boardvisit=decode_cookie($_COOKIE['boardvisit']);
else $boardvisit=array();

if(isset($_COOKIE['threadvisit'])) $threadvisit=decode_cookie($_COOKIE['threadvisit']);
else $threadvisit=array();

$boardcache=array();
$permissioncache=array();
$modcache=array();

$activtime=time()-60*$useronlinetimeout;

$result = $db->query("
 SELECT
 b.*".ifelse($showlastposttitle==1,", t.topic, i.*")."
 FROM bb".$n."_boards b
 ".ifelse($showlastposttitle==1,"LEFT JOIN bb".$n."_threads t ON (t.threadid=b.lastthreadid)
 LEFT JOIN bb".$n."_icons i USING (iconid)")."
 ORDER by b.parentid ASC, b.boardorder ASC");
while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;


$result = $db->query("SELECT boardid, threadid, lastposttime FROM bb".$n."_threads WHERE visible = 1 AND lastposttime > '$wbbuserdata[lastvisit]' AND closed <> 3");
while($row=$db->fetch_array($result)) $visitcache[$row['boardid']][$row['threadid']]=$row['lastposttime'];

$result = $db->query("SELECT * FROM bb".$n."_permissions WHERE groupid = '$wbbuserdata[groupid]'");
while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;

$result = $db->query("SELECT bb".$n."_moderators.*, username FROM bb".$n."_moderators LEFT JOIN bb".$n."_users USING (userid) ORDER BY username ASC");
while ($row = $db->fetch_array($result)) $modcache[$row['boardid']][] = $row;

$boardbit = makeboardbit(0);

$index_pms="";
$quicklogin="";
$index_useronline="";
$index_stats="";

/* ############## STATS ############## */
if($showstats==1) {
 $members=$db->query_first("SELECT COUNT(*) AS members, MAX(userid) AS userid FROM bb".$n."_users WHERE activation = 1");
 $newestmember=$db->query_first("SELECT userid, username FROM bb".$n."_users WHERE userid = '$members[userid]'");
 $posts=$db->query_first("SELECT COUNT(*) AS posts FROM bb".$n."_posts");
 $threads=$db->query_first("SELECT COUNT(*) AS threads FROM bb".$n."_threads");

 $installdays = (time() - $installdate) / 86400;
 if ($installdays < 1) $postperday = $posts['posts'];
 else $postperday = sprintf("%.2f",($posts['posts'] / $installdays));

 eval ("\$index_stats = \"".$tpl->get("index_stats")."\";");
}
/* ############## USERONLINE ############## */
if($showuseronline==1) {
 $guestcount=0;
 $membercount=0;
 $useronlinebit = '';
 $result = $db->query("SELECT bb".$n."_sessions.userid, username, groupid, invisible FROM bb".$n."_sessions LEFT JOIN bb".$n."_users USING (userid) WHERE bb".$n."_sessions.lastactivity >= '".(time()-60*$useronlinetimeout)."' ORDER BY username ASC");
 while($row = $db->fetch_array($result)) {
  if($row['userid']==0) {
   $guestcount++;
   continue;
  }
  $membercount++;
  	if(!$row['invisible']) {
  		if(isset($useronlinebit) && $useronlinebit != '') $useronlinebit .= ', ';
  		eval ("\$useronlinebit .= \"".$tpl->get("index_useronline")."\";");
  	}
 }
 $totaluseronline = $membercount+$guestcount;
 if($totaluseronline>$rekord) {
  $rekord=$totaluseronline;
  $rekordtime=time();
  $db->unbuffered_query("UPDATE bb".$n."_options SET value='$rekord' WHERE varname='rekord'",1);
  $db->unbuffered_query("UPDATE bb".$n."_options SET value='$rekordtime' WHERE varname='rekordtime'",1);
  require ("./acp/lib/class_options.php");
  $option=new options("acp/lib");
  $option->write();
 }
 $rekorddate = formatdate($dateformat,$rekordtime);
 $rekordtime = formatdate($timeformat,$rekordtime);
 eval ("\$index_useronline = \"".$tpl->get("index_showuseronline")."\";");
}


if(!$wbbuserdata['userid']) {
 eval ("\$welcome = \"".$tpl->get("index_welcome")."\";");
 eval ("\$quicklogin = \"".$tpl->get("index_quicklogin")."\";");
}
else {
 $currenttime=formatdate($timeformat,time());
 $toffset=ifelse($default_timezoneoffset>=0,"+").$default_timezoneoffset;
 $lastvisitdate = formatdate($dateformat,$wbbuserdata['lastvisit']);
 $lastvisittime = formatdate($timeformat,$wbbuserdata['lastvisit']);
 eval ("\$welcome = \"".$tpl->get("index_hello")."\";");
 if($wbbuserdata['canusepms']==1 && $showpmonindex==1) {
  $counttotal=0; $countunread=0; $countnew=0;
  $result = $db->query("SELECT view, sendtime FROM bb".$n."_privatemessage WHERE deletepm <> 1 AND recipientid = '$wbbuserdata[userid]'");
  while($row=$db->fetch_array($result)) {
   $counttotal++;
   if($row['view']==0) {
    $countunread++;
    if($row['sendtime']>$wbbuserdata['lastvisit']) $countnew++;
   }
  }

  if($countnew>0) eval ("\$new_notnew = \"".$tpl->get("index_newpm")."\";");
  else eval ("\$new_notnew = \"".$tpl->get("index_nonewpm")."\";");
  eval ("\$index_pms = \"".$tpl->get("index_pms")."\";");
 }
}
eval("\$tpl->output(\"".$tpl->get("index")."\");");
?>
