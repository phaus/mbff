<?php
require ("./global.php");
isAdmin();
@set_time_limit(0);

if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
else $action="";

if(!$action) {
 list($reindexposts)=$db->query_first("SELECT COUNT(*) FROM bb".$n."_posts WHERE reindex=1");

 eval("print(\"".gettemplate("otherstuff")."\");");
}

if($action=="doing") eval("print(\"".gettemplate("doing")."\");");

if($action=="delindex") {
 if(isset($_POST['send'])) {
  $db->unbuffered_query("DELETE FROM bb".$n."_wordlist",1);
  $db->unbuffered_query("DELETE FROM bb".$n."_wordmatch",1);
  $db->unbuffered_query("UPDATE bb".$n."_posts SET reindex=1",1);
  header("Location: otherstuff.php?sid=$session[hash]");
  exit();
 }

 eval("print(\"".gettemplate("delindex")."\");");
}

if($action=="userposts") {
 if(isset($_REQUEST['perpage'])) $perpage=intval($_REQUEST['perpage']);
 else $perpage=0;
 if($perpage==0) $perpage=1;
 if(isset($_REQUEST['page'])) $page=intval($_REQUEST['page']);
 else $page=0;
 if($page==0) $page=1;

 $result=$db->query("SELECT userid, userposts FROM bb".$n."_users ORDER BY userid ASC",$perpage,$perpage*($page-1));
 if($db->num_rows($result)) {
  while($row=$db->fetch_array($result)) {
   list($userposts)=$db->query_first("SELECT COUNT(postid) FROM bb".$n."_posts p, bb".$n."_threads t LEFT JOIN bb".$n."_boards b ON (t.boardid=b.boardid) WHERE t.threadid=p.threadid AND p.userid='$row[userid]' AND p.visible=1 AND b.countuserposts=1");
   if($userposts!=$row['userposts']) $db->unbuffered_query("UPDATE bb".$n."_users SET userposts='$userposts' WHERE userid='$row[userid]'",1);
  }
  refresh("otherstuff.php?sid=$session[hash]&action=userposts&perpage=$perpage&page=".($page+1));
 }
 else eval("print(\"".gettemplate("working_done")."\");");
}

if($action=="ranks") {
 if(isset($_REQUEST['perpage'])) $perpage=intval($_REQUEST['perpage']);
 else $perpage=0;
 if($perpage==0) $perpage=1;
 if(isset($_REQUEST['page'])) $page=intval($_REQUEST['page']);
 else $page=0;
 if($page==0) $page=1;

 $result=$db->query("SELECT userid, groupid, gender, userposts FROM bb".$n."_users",$perpage,$perpage*($page-1));
 if($db->num_rows($result)) {
  while($row=$db->fetch_array($result)) {
   list($rankid)=$db->query_first("SELECT rankid FROM bb".$n."_ranks WHERE groupid IN ('0','$row[groupid]') AND needposts<='$row[userposts]' AND gender IN ('0','$row[gender]') ORDER BY needposts DESC, gender DESC",1);
   $db->unbuffered_query("UPDATE bb".$n."_users SET rankid='$rankid' WHERE userid='$row[userid]'",1);
  }
  refresh("otherstuff.php?sid=$session[hash]&action=ranks&perpage=$perpage&page=".($page+1));
 }
 else eval("print(\"".gettemplate("working_done")."\");");
}

if($action=="reindex") {
 if(isset($_REQUEST['perpage'])) $perpage=intval($_REQUEST['perpage']);
 else $perpage=0;
 if($perpage==0) $perpage=1;

 $caching=array();
 $result=$db->query("SELECT postid, message, posttopic FROM bb".$n."_posts WHERE reindex=1",$perpage);
 if($db->num_rows($result)) {
  $postids="0";
  while($row=$db->fetch_array($result)) {
   $caching[]=$row;
   $postids.=",".$row['postid'];
  }

  $db->unbuffered_query("DELETE FROM bb".$n."_wordmatch WHERE postid IN ($postids)",1);

  reset($caching);
  while(list($key,$val)=each($caching)) {
   wordmatch($val['postid'],$val['message'],$val['posttopic']);
  }

  $db->unbuffered_query("UPDATE bb".$n."_posts SET reindex=0 WHERE postid IN ($postids)",1);
  refresh("otherstuff.php?sid=$session[hash]&action=reindex&perpage=$perpage");
 }
 else eval("print(\"".gettemplate("working_done")."\");");
}

if($action=="loademail") eval("print(\"".gettemplate("working_loademail")."\");");

if($action=="email") {
 $perpage=250;

 if(isset($_REQUEST['page'])) $page=intval($_REQUEST['page']);
 else $page=0;
 if($page==0) $page=1;

 $userids=$_REQUEST['userids'];
 $subject=$_REQUEST['subject'];
 $message=$_REQUEST['message'];
 $emailtype=$_REQUEST['emailtype'];
 if(!$userids) $userids="0";

 if($userids=="all") $result=$db->query("SELECT username, email FROM bb".$n."_users WHERE admincanemail = 1 ORDER BY userid ASC",$perpage,$perpage*($page-1));
 else $result=$db->query("SELECT username, email FROM bb".$n."_users WHERE userid IN ($userids) AND admincanemail = 1 ORDER BY userid ASC",$perpage,$perpage*($page-1));
 if($db->num_rows($result)) {
  while($row=$db->fetch_array($result)) {
   $temp=str_replace("{username}",$row['username'],$message);
   mailer($row['email'],$subject,$temp,"",ifelse($emailtype=="html","\nMIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1"));
  }
  $page+=1;
  $subject=htmlspecialchars($subject);
  $message=htmlspecialchars($message);
  eval("print(\"".gettemplate("refresh_email")."\");");
 }
 else eval("print(\"".gettemplate("working_emaildone")."\");");
}

?>
