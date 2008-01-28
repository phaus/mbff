<?php
$filename="board.php";

require("./global.php");
require("./acp/lib/class_parse.php");

if(!isset($boardid)) eval("error(\"".$tpl->get("error_falselink")."\");");

if(isset($_COOKIE['hidecats'])) $hidecats=decode_cookie($_COOKIE['hidecats']);
else $hidecats=array();

if(isset($_COOKIE['boardvisit'])) $boardvisit=decode_cookie($_COOKIE['boardvisit']);
else $boardvisit=array();

if(isset($_COOKIE['threadvisit'])) $threadvisit=decode_cookie($_COOKIE['threadvisit']);
else $threadvisit=array();

$boardnavcache=array();
if($board['childlist']!="0") {
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
 while ($row = $db->fetch_array($result)) {
  $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;
  $boardnavcache[$row['boardid']]=$row;
 }

 $result = $db->query("SELECT boardid, threadid, lastposttime FROM bb".$n."_threads WHERE visible = 1 AND lastposttime > '$wbbuserdata[lastvisit]' AND closed <> 3");
 while($row=$db->fetch_array($result)) $visitcache[$row['boardid']][$row['threadid']]=$row['lastposttime'];

 $result = $db->query("SELECT * FROM bb".$n."_permissions WHERE groupid = '$wbbuserdata[groupid]'");
 while ($row = $db->fetch_array($result)) $permissioncache[$row['boardid']] = $row;

 $result = $db->query("SELECT bb".$n."_moderators.*, username FROM bb".$n."_moderators LEFT JOIN bb".$n."_users USING (userid) ORDER BY username ASC");
 while ($row = $db->fetch_array($result)) $modcache[$row['boardid']][] = $row;

 $tempboardcache=$boardcache;
 $temppermissioncache=$permissioncache;

 $index_depth=$board_depth;
 $temp_boardid=$boardid;
 $boardbit = makeboardbit($boardid);

 $boardcache=$tempboardcache;
 $permissioncache=$temppermissioncache;
}

if($showboardjump==1) $boardjump=makeboardjump($boardid);
$navbar=getNavbar($board['parentlist']);
eval ("\$navbar .= \"".$tpl->get("navbar_boardend")."\";");

if(!$board['isboard']) {
 eval("\$tpl->output(\"".$tpl->get("board_cat")."\");");
 exit();
}

/********** board *********/
if(isset($boardbit) && $boardbit) eval ("\$subboards = \"".$tpl->get("board_subboards")."\";");
else $subboards="";

if($board['threadsperpage']) $threadsperpage=$board['threadsperpage'];
else $threadsperpage=$default_threadsperpage;

if($wbbuserdata['umaxposts']) $postsperpage=$wbbuserdata['umaxposts'];
elseif($board['postsperpage']) $postsperpage=$board['postsperpage'];
else $postsperpage=$default_postsperpage;

if($board['hotthread_reply']==0) $board['hotthread_reply']=$default_hotthread_reply;
if($board['hotthread_view']==0) $board['hotthread_view']=$default_hotthread_view;

if(isset($_GET['page'])) {
 $page=intval($_GET['page']);
 if($page==0) $page=1;
}
else $page=1;
$threadbit="";

unset($datecute);

if(isset($_GET['sortfield'])) $sortfield=$_GET['sortfield'];
else $sortfield="lastposttime";

switch ($sortfield) {
 case "topic": break;
 case "starttime": break;
 case "replycount": break;
 case "starter": break;
 case "views": break;
 case "vote": break;
 case "lastposttime": break;
 case "lastposter": break;
 default: $sortfield = "lastposttime"; break;
}
$f_select['topic']="";
$f_select['starttime']="";
$f_select['replycount']="";
$f_select['starter']="";
$f_select['views']="";
$f_select['vote']="";
$f_select['lastposttime']="";
$f_select['lastposter']="";
$f_select[$sortfield]="selected";

if(isset($_GET['sortorder'])) $sortorder=$_GET['sortorder'];
else $sortorder="lastposttime";

switch ($sortorder) {
 case "ASC": break;
 case "DESC": break;
 default: $sortorder = "DESC"; break;
}
$o_select['ASC']="";
$o_select['DESC']="";
$o_select[$sortorder]="selected";

if(isset($_GET['daysprune'])) $daysprune = intval($_GET['daysprune']);
elseif($wbbuserdata['daysprune']!=0) $daysprune = $wbbuserdata['daysprune'];
elseif($board['daysprune']!=0) $daysprune = $board['daysprune'];
else $daysprune = $default_daysprune;
$d_select[1500]="";
$d_select[1000]="";
$d_select[1]="";
$d_select[2]="";
$d_select[5]="";
$d_select[10]="";
$d_select[20]="";
$d_select[30]="";
$d_select[45]="";
$d_select[60]="";
$d_select[75]="";
$d_select[100]="";
$d_select[365]="";
$d_select[$daysprune]="selected";
if($daysprune!=1000) {
 if($daysprune==1500) $datecute = " AND (important=1 OR lastposttime >= '".$wbbuserdata['lastvisit']."')";
 else {
  $tempdate=time()-($daysprune*86400);
  $datecute = " AND (important=1 OR lastposttime >= '".$tempdate."')";
 }
}
else $datecute="";

/** announcements threads **/
$announcecount=0;
$announceids="";
//$result = $db->query("SELECT threadid FROM bb".$n."_threads WHERE boardid='$boardid' AND important = 2 AND visible = 1");
$result = $db->query("SELECT threadid FROM bb".$n."_announcements WHERE boardid='$boardid'");
while($row = $db->fetch_array($result)) {
 $announcecount++;
 $announceids .= ",".$row['threadid'];
}

$ownuserid="";
$ownjoin="";

/** count total threads **/
$threadcount = $db->query_first("SELECT COUNT(threadid) FROM bb".$n."_threads WHERE boardid='$boardid' AND important < 2 AND visible = 1 $datecute");
$threadcount = $threadcount[0];

$pages = ceil($threadcount/$threadsperpage);
if($pages>1) $pagelink=makepagelink("board.php?boardid=$boardid&sid=$session[hash]&daysprune=$daysprune&sortfield=$sortfield&sortorder=$sortorder",$page,$pages,$showpagelinks-1);
else $pagelink="";

$threadids="";
$result = $db->query("SELECT threadid, IF(voted>0,votepoints/voted,0) AS vote FROM bb".$n."_threads WHERE boardid='$boardid' AND visible = 1 AND important < 2 $datecute ORDER BY important DESC, $sortfield $sortorder",$threadsperpage,$threadsperpage*($page-1));
while($row=$db->fetch_array($result)) $threadids .= ",".$row['threadid'];

$result = $db->query("SELECT
 $ownuserid
 bb".$n."_threads.*,
 IF(voted>0,votepoints/voted,0) AS vote,
 bb".$n."_icons.*
 FROM bb".$n."_threads
 LEFT JOIN bb".$n."_icons USING (iconid)
 $ownjoin
 WHERE bb".$n."_threads.threadid IN (0$announceids$threadids)
 ORDER BY important DESC, $sortfield $sortorder");

if(isset($boardvisit[$boardid]) && $boardvisit[$boardid]>$wbbuserdata['lastvisit']) $wbbuserdata['lastvisit']=$boardvisit[$boardid];

while($threads=$db->fetch_array($result)) {
 $firstnew="";
 $multipages="";
 $prefix="";

 if(strlen($threads['topic'])>60) $threads['topic']=parse::textwrap($threads['topic'],60);
 if($threads['starterid']!=0) eval ("\$threads['starter'] = \"".$tpl->get("board_threadbit_starter")."\";");
 if($threads['lastposterid']!=0) eval ("\$threads['lastposter'] = \"".$tpl->get("board_threadbit_lastposter")."\";");

 $lastpostdate=formatdate($dateformat,$threads['lastposttime'],1);
 $lastposttime=formatdate($timeformat,$threads['lastposttime']);

 if($threads['closed']==3) {
  $threads['threadid']=$threads['pollid'];
  $threadrating="&nbsp;";
  eval ("\$prefix .= \"".$tpl->get("board_thread_moved")."\";");

  $foldericon="moved";
  if($wbbuserdata['lastvisit']<$threads['lastposttime'] && $threadvisit[$threads['threadid']]<$threads['lastposttime']) eval ("\$firstnew = \"".$tpl->get("board_threadbit_firstnew")."\";");
  if($threads['iconid']) $threadicon=makeimgtag($threads['iconpath'],$threads['icontitle']);
  else $threadicon="&nbsp;";

  $threads['replycount']="-";
  $threads['views']="-";
 }
 else {
  if($threads['voted']) {
   $avarage=number_format($threads['votepoints']/$threads['voted'],2);
   eval ("\$threadrating = \"".$tpl->get("board_threadbit_rating")."\";");
   $threadrating=str_repeat($threadrating, round($avarage));
  }
  else $threadrating="&nbsp;";

  if($threads['important']==2) eval ("\$prefix .= \"".$tpl->get("board_thread_announce")."\";");
  if($threads['important']==1) eval ("\$prefix .= \"".$tpl->get("board_thread_important")."\";");
  if($threads['pollid']!=0) eval ("\$prefix .= \"".$tpl->get("board_thread_poll")."\";");

  if($threads['important']==2) $foldericon="announce";
  else $foldericon=ifelse($wbbuserdata['lastvisit']<$threads['lastposttime'] && $threadvisit[$threads['threadid']]<$threads['lastposttime'],"new").ifelse($threads['replycount']>=$board['hotthread_reply'] || $threads['views']>=$board['hotthread_view'],"hot").ifelse($threads['closed']!=0,"lock")."folder";
  if($wbbuserdata['lastvisit']<$threads['lastposttime'] && $threadvisit[$threads['threadid']]<$threads['lastposttime']) eval ("\$firstnew = \"".$tpl->get("board_threadbit_firstnew")."\";");
  if($threads['pollid']!=0) $threadicon=makeimgtag("{imagefolder}/poll.gif","");
  elseif($threads['iconid']) $threadicon=makeimgtag($threads['iconpath'],$threads['icontitle']);
  else $threadicon="&nbsp;";

  if($threads['replycount']+1>$postsperpage && $showmultipages!=0) {
   unset($multipage);
   unset($multipages_lastpage);
   $xpages=ceil(($threads['replycount']+1)/$postsperpage);
   if($xpages>$showmultipages) {
    eval ("\$multipages_lastpage = \"".$tpl->get("board_threadbit_multipages_lastpage")."\";");
    $xpages=$showmultipages;
   }
   for($i=1;$i<=$xpages;$i++) {
    $multipage.=" ".makehreftag("thread.php?threadid=$threads[threadid]&page=$i&sid=$session[hash]",$i);
   }
   eval ("\$multipages = \"".$tpl->get("board_threadbit_multipages")."\";");
  }
 }

 eval ("\$threadbit .= \"".$tpl->get("board_threadbit")."\";");
}

$threadcount += $pages * $announcecount;
$l_threads = ($page-1) * ($threadsperpage + $announcecount) + 1;
$h_threads = $page * ($threadsperpage + $announcecount);
if($h_threads > $threadcount) $h_threads = $threadcount;

if($board['closed']==0) eval ("\$newthread = \"".$tpl->get("board_newthread")."\";");

if(!$threadbit) eval("\$tpl->output(\"".$tpl->get("board_nothreads")."\");");
else eval("\$tpl->output(\"".$tpl->get("board")."\");");
?>