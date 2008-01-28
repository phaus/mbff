<?php
require ("./global.php");
isAdmin();

if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
else $action="view";

function makeboardlist($boardid,$x=0) {
 global $boardcache, $session, $maxcolspan;

 if(!isset($boardcache[$boardid])) return;

 while (list($key1,$val1) = each($boardcache[$boardid])) {
  while(list($key2,$boards) = each($val1)) {
   $count = countboards($boardcache[$boardid]);
   unset($options);
   for($i = 1; $i <= $count; $i++) $options .= makeoption($i,$i,$boards['boardorder'],1);
   $colspan=$maxcolspan-$x;
   $temp=$maxcolspan-($maxcolspan-$x);
   if($temp) $tds=str_repeat("<td class=\"secondrow\">&nbsp;&nbsp;</td>",$temp);
   else $tds="";
   eval ("\$out .= \"".gettemplate("board_viewbit")."\";");
   $out .= makeboardlist($boards['boardid'],$x+1);
  }
 }
 unset($boardcache[$boardid]);
 return $out;
}

function countboards($array) {
 $count=0;
 reset($array);
 while(list($key,$val)=each($array)) $count+=count($val);
 return $count;
}

if($action == "view") {
 if(isset($_POST['send'])) {
  reset($_POST['boardorder']);
  while(list($key,$val)=each($_POST['boardorder'])) $db->query("UPDATE bb".$n."_boards SET boardorder='$val' WHERE boardid = '$key'");
 }

 $maxcolspan=0;
 $result = $db->query("SELECT boardid, parentid, boardorder, title, parentlist FROM bb".$n."_boards ORDER by parentid ASC, boardorder ASC");
 while ($row = $db->fetch_array($result)) {
  $temp=count(explode(",",$row['parentlist']));
  if($temp>$maxcolspan) $maxcolspan=$temp;
  $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;
 }
 $boardlist = makeboardlist(0);
 $maxcolspan+=2;
 eval("print(\"".gettemplate("board_view")."\");");
}

if($action == "add") {
 if(isset($_POST['send'])) {
  reset($_POST);
  while(list($key,$val)=each($_POST)) $$key=$val;

  if($parentid==0) $parentlist="0";
  else {
   $result = $db->query_first("SELECT parentlist FROM bb".$n."_boards WHERE boardid = '$parentid'");
   $parentlist = $result['parentlist'].",".$parentid;
  }

  $prefix = preg_replace("/\s*\n\s*/","\n",trim($prefix));

  list($boardorder)=$db->query_first("SELECT MAX(boardorder) FROM bb".$n."_boards WHERE parentid = '$parentid'");
  $boardorder+=1;

  $db->query("INSERT INTO bb".$n."_boards (styleid,parentid,parentlist,childlist,boardorder,title,password,description,allowbbcode,allowimages,allowhtml,allowsmilies,allowicons,daysprune,threadsperpage,postsperpage,postorder,hotthread_reply,hotthread_view,closed,isboard,invisible)
  VALUES ('$style_set','$parentid','$parentlist','0','$boardorder','".addslashes($title)."','".addslashes($password)."','".addslashes($description)."','$allowbbcode','$allowimages','$allowhtml','$allowsmilies','$allowicons','$daysprune','".intval($threadsperpage)."','".intval($postsperpage)."','$postorder','".intval($hotthread_reply)."','".intval($hotthread_view)."','$closed','$isboard','$invisible')");
  $insertid = $db->insert_id();

  if($parentlist!='0') $db->query("UPDATE bb".$n."_boards SET childlist=CONCAT(childlist,',$insertid') WHERE boardid IN ($parentlist)");

  if($isboard==1) for($i = 0; $i < count($boardmods); $i++) $db->query("REPLACE INTO bb".$n."_moderators VALUES ('$boardmods[$i]','$insertid')");

  $tempbp=array();
  $tempsp=array();
  $temprp=array();
  if(is_array($boardpermission)) while(list($key,$val)=each($boardpermission)) if($val!='*') $tempbp[$val]=1;
  if(is_array($startpermission)) while(list($key,$val)=each($startpermission)) if($val!='*') $tempsp[$val]=1;
  if(is_array($replypermission)) while(list($key,$val)=each($replypermission)) if($val!='*') $temprp[$val]=1;

  $result = $db->query("SELECT groupid FROM bb".$n."_groups");
  while($row=$db->fetch_array($result)) $db->query("REPLACE INTO bb".$n."_permissions VALUES ('$insertid','$row[groupid]','".ifelse($boardpermission[0]=='*',"1",$tempbp[$row[groupid]])."','".ifelse($startpermission[0]=='*',"1",$tempsp[$row[groupid]])."','".ifelse($replypermission[0]=='*',"1",$temprp[$row[groupid]])."')");

  header("Location: board.php?action=view&sid=$session[hash]");
  exit();
 }

 $result = $db->query("SELECT boardid, parentid, boardorder, title FROM bb".$n."_boards ORDER by parentid ASC, boardorder ASC");
 while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;

 $parentid_options = makeboardoptions(0);

 $result = $db->query("SELECT groupid, title FROM bb".$n."_groups ORDER BY title ASC");
 while($row = $db->fetch_array($result)) $groupoptions.=makeoption($row['groupid'],$row['title'],"",0);
 $db->free_result($result);

 $result = $db->query("SELECT styleid, stylename FROM bb".$n."_styles WHERE default_style <> 1 ORDER BY stylename ASC");
 while($row = $db->fetch_array($result)) $style_options .= makeoption($row['styleid'],$row['stylename'],"",0);
 $db->free_result($result);

 $result = $db->query("SELECT userid, username FROM bb".$n."_users LEFT JOIN bb".$n."_groups USING (groupid) WHERE ismod = 1 OR issupermod = 1 ORDER BY username ASC");
 while($row = $db->fetch_array($result)) $mod_options .= makeoption($row['userid'],$row['username'],"",0);
 $db->free_result($result);

 eval("print(\"".gettemplate("board_add")."\");");
}

if($action == "edit") {
 $boardid=intval($_REQUEST[boardid]);
 $board = $db->query_first("SELECT * FROM bb".$n."_boards WHERE boardid = '$boardid'");
 if(isset($_POST['send'])) {
  reset($_POST);
  while(list($key,$val)=each($_POST)) $$key=$val;

  if($board['parentid']!=$parentid) {
   $threadcount=$board['threadcount'];
   $postcount=$board['postcount'];

   if($parentid!=0) {
    list($parentlist)=$db->query_first("SELECT parentlist FROM bb".$n."_boards WHERE boardid='$parentid'");
    $parentlist.=",$parentid";
    $db->query("UPDATE bb".$n."_boards SET threadcount=threadcount+$threadcount, postcount=postcount+$postcount WHERE boardid IN ($parentlist)");
    updateList($parentlist,"$boardid,$board[childlist]","childlist");
   }
   else $parentlist=0;
   $parentchange=" parentid='$parentid', parentlist='$parentlist',";

   if($board['parentlist']!="0") {
    $db->query("UPDATE bb".$n."_boards SET threadcount=threadcount-$threadcount, postcount=postcount-$postcount WHERE boardid IN ($board[parentlist])");
    updateList($board['parentlist'],"$boardid,$board[childlist]","childlist",true);

    updateBoardInfo("$board[parentlist]",$board['lastposttime']);
   }

   if($parentlist!="0") updateBoardInfo("$parentlist",$board['lastposttime']);
  }

  if($board['parentid']!=$parentid && $board['childlist']!="0" && $board['childlist']!="") {
   updateList($board['childlist'],"$board[parentlist],$boardid","parentlist",true);
   updateList($board['childlist'],"$parentlist,$boardid","parentlist");
  }

  $prefix = preg_replace("/\s*\n\s*/","\n",trim($prefix));

  $db->query("UPDATE bb".$n."_boards SET
  styleid='$style_set',$parentchange title='".addslashes($title)."', password='".addslashes($password)."', description='".addslashes($description)."', allowbbcode='$allowbbcode', allowimages='$allowimages', allowhtml='$allowhtml', allowsmilies='$allowsmilies', allowicons='$allowicons', daysprune='$daysprune',
  threadsperpage='".intval($threadsperpage)."', postsperpage='".intval($postsperpage)."', postorder='$postorder', hotthread_reply='".intval($hotthread_reply)."', hotthread_view='".intval($hotthread_view)."', closed='$closed', isboard='$isboard', invisible='$invisible'
  WHERE boardid='$boardid'");

  $db->query("DELETE FROM bb".$n."_moderators WHERE boardid='$boardid'");
  if($isboard==1) for($i = 0; $i < count($boardmods); $i++) $db->query("INSERT INTO bb".$n."_moderators VALUES ('$boardmods[$i]','$boardid')");

  $db->query("DELETE FROM bb".$n."_permissions WHERE boardid='$boardid'");

  $tempbp=array();
  $tempsp=array();
  $temprp=array();
  for($i=0;$i<count($boardpermission);$i++) if($boardpermission[$i]!='*') $tempbp[$boardpermission[$i]]=1;
  for($i=0;$i<count($startpermission);$i++) if($startpermission[$i]!='*') $tempsp[$startpermission[$i]]=1;
  for($i=0;$i<count($replypermission);$i++) if($replypermission[$i]!='*') $temprp[$replypermission[$i]]=1;

  $result = $db->query("SELECT groupid FROM bb".$n."_groups");
  while($row=$db->fetch_array($result)) $db->query("INSERT INTO bb".$n."_permissions VALUES ('$boardid','$row[groupid]','".ifelse($boardpermission[0]=='*',"1",$tempbp[$row[groupid]])."','".ifelse($startpermission[0]=='*',"1",$tempsp[$row[groupid]])."','".ifelse($replypermission[0]=='*',"1",$temprp[$row[groupid]])."')");

  header("Location: board.php?action=view&sid=$session[hash]");
  exit();
 }

 reset($board);
 while(list($key,$val)=each($board)) $board[$key]=htmlspecialchars($val);

 $sel_isboard[$board['isboard']]=" selected";
 $sel_closed[$board['closed']]=" selected";
 $sel_invisible[$board['invisible']]=" selected";
 $sel_allowbbcode[$board['allowbbcode']]=" selected";
 $sel_allowimages[$board['allowimages']]=" selected";
 $sel_allowhtml[$board['allowhtml']]=" selected";
 $sel_allowsmilies[$board['allowsmilies']]=" selected";
 $sel_allowicons[$board['allowicons']]=" selected";
 $sel_daysprune[$board['daysprune']]=" selected";
 $sel_postorder[$board['postorder']]=" selected";

 $result = $db->query("SELECT boardid, parentid, boardorder, title FROM bb".$n."_boards WHERE boardid <> '$boardid' ORDER by parentid ASC, boardorder ASC");
 while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardorder']][$row['boardid']] = $row;
 $db->free_result($result);

 $parentid_options = makeboardoptions(0,1,1,$board['parentid']);

 $result = $db->query("SELECT userid FROM bb".$n."_moderators WHERE boardid='$boardid'");
 while($row=$db->fetch_array($result)) $mods[]=$row['userid'];
 $db->free_result($result);

 $result = $db->query("SELECT userid, username FROM bb".$n."_users LEFT JOIN bb".$n."_groups USING (groupid) WHERE ismod = 1 OR issupermod = 1 ORDER BY username ASC");
 while($row = $db->fetch_array($result)) $mod_options .= makeoption($row['userid'],$row['username'],$mods,1);
 $db->free_result($result);

 $result = $db->query("SELECT styleid, stylename FROM bb".$n."_styles WHERE default_style <> 1 ORDER BY stylename ASC");
 while($row = $db->fetch_array($result)) $style_options .= makeoption($row['styleid'],$row['stylename'],$board['styleid'],1);
 $db->free_result($result);

 $count_bp = 0;
 $count_sp = 0;
 $count_rp = 0;
 $result = $db->query("SELECT * FROM bb".$n."_permissions WHERE boardid='$boardid'");
 while($row=$db->fetch_array($result)) {
  if($row['boardpermission']==1) $bps[]=$row['groupid'];
  if($row['startpermission']==1) $sps[]=$row['groupid'];
  if($row['replypermission']==1) $rps[]=$row['groupid'];
  $count_bp += $row['boardpermission'];
  $count_sp += $row['startpermission'];
  $count_rp += $row['replypermission'];
 }
 $db->free_result($result);

 $result = $db->query("SELECT groupid, title FROM bb".$n."_groups ORDER BY groupid ASC");
 $count=$db->num_rows($result);

 if($count==$count_bp) $bp_selected = " selected";
 if($count==$count_sp) $sp_selected = " selected";
 if($count==$count_rp) $rp_selected = " selected";

 while($row = $db->fetch_array($result)) {
  $bp_options .= makeoption($row['groupid'],$row['title'],$bps,ifelse($bp_selected,0,1));
  $sp_options .= makeoption($row['groupid'],$row['title'],$sps,ifelse($sp_selected,0,1));
  $rp_options .= makeoption($row['groupid'],$row['title'],$rps,ifelse($rp_selected,0,1));
 }
 $db->free_result($result);

 eval("print(\"".gettemplate("board_edit")."\");");
}

function emptyboard($boardid) {
 global $board, $db, $n;

 /* countuserposts */
 if($board['countuserposts']==1) {
  $result = $db->query("SELECT COUNT(p.postid) AS posts, p.userid FROM bb".$n."_posts p, bb".$n."_threads t WHERE p.threadid=t.threadid AND t.boardid='$boardid' AND p.visible = 1 AND p.userid>0 GROUP BY p.userid");
  while($row=$db->fetch_array($result)) $db->unbuffered_query("UPDATE bb".$n."_users SET userposts=userposts-'$row[posts]' WHERE userid='$row[userid]'",1);
 }

 /* delete posts & threads */
 $threadids="";
 $result = $db->query("SELECT threadid FROM bb".$n."_threads WHERE boardid='$boardid'");
 while($row=$db->fetch_array($result)) $threadids.=",".$row['threadid'];
 $db->unbuffered_query("DELETE FROM bb".$n."_posts WHERE threadid IN (0$threadids)",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_threads WHERE pollid IN (0$threadids) AND closed=3",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_announcements WHERE threadid IN (0$threadids)",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_threads WHERE boardid='$boardid'",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_subscribethreads WHERE threadid IN (0$threadids)",1);

 /* delete poll(options|votes) */
 $pollids="";
 $result = $db->query("SELECT pollid FROM bb".$n."_polls WHERE threadid IN (0$threadids)");
 while($row=$db->fetch_array($result)) $pollids.=",".$row['pollid'];
 $db->unbuffered_query("DELETE FROM bb".$n."_polloptions WHERE pollid IN (0$pollids)",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_votes WHERE id IN (0$pollids) AND votemode=1",1);
 $db->unbuffered_query("DELETE FROM bb".$n."_polls WHERE pollid IN (0$pollids)",1);

 /* update parent boards */
 if($board['parentid']!=0) {
  $db->unbuffered_query("UPDATE bb".$n."_boards SET threadcount=threadcount-'$board[threadcount]', postcount=postcount-'$board[postcount]' WHERE boardid IN ($board[parentlist])",1);
  updateBoardInfo("$board[parentlist]",0,$board['lastthreadid']);
 }
}

if($action=="del") {
 $boardid=intval($_REQUEST['boardid']);
 $board=$db->query_first("SELECT * FROM bb".$n."_boards WHERE boardid = '$boardid'");

 if(isset($_POST['send'])) {
  emptyboard($boardid);
  $db->unbuffered_query("DELETE FROM bb".$n."_boards WHERE boardid = '$boardid'",1);
  if($board['parentid']!=0) $db->unbuffered_query("UPDATE bb".$n."_boards SET childlist = SUBSTRING(REPLACE(CONCAT(',',childlist,','),',$boardid,',','),2,LENGTH(REPLACE(CONCAT(',',childlist,','),',$boardid,',','))-2) WHERE boardid IN ($board[parentlist])",1);

  if($board['childlist']!="0") {
   $db->unbuffered_query("UPDATE bb".$n."_boards SET parentlist = SUBSTRING(REPLACE(CONCAT(',',parentlist,','),',$boardid,',','),2,LENGTH(REPLACE(CONCAT(',',parentlist,','),',$boardid,',','))-2) WHERE boardid IN ($board[childlist])",1);
   $db->unbuffered_query("UPDATE bb".$n."_boards SET parentid='$board[parentid]' WHERE parentid = '$boardid'",1);
  }
  $db->unbuffered_query("DELETE FROM bb".$n."_moderators WHERE boardid = '$boardid'",1);
  $db->unbuffered_query("DELETE FROM bb".$n."_permissions WHERE boardid = '$boardid'",1);
  $db->unbuffered_query("DELETE FROM bb".$n."_subscribeboards WHERE boardid = '$boardid'",1);

  header("Location: board.php?action=view&sid=$session[hash]");
  exit();
 }

 eval("print(\"".gettemplate("board_del")."\");");
}

if($action=="sync") {
 $result = $db->query("SELECT boardid, parentid FROM bb".$n."_boards ORDER by parentid ASC");
 while ($row = $db->fetch_array($result)) $boardcache[$row['parentid']][$row['boardid']] = $row;

 function syncBoards($parentid,$parentlist="0") {
  global $boardcache, $db, $n;

  if(!isset($boardcache[$parentid])) {
   if($parentid!=0) $db->query("UPDATE bb".$n."_boards SET childlist='0' WHERE boardid='$parentid'");
   return;
  }

  $childlist="";
  $updatelist="";
  while(list($boardid,$board)=each($boardcache[$parentid])) {
   $childlist.=",$boardid";
   $childlist.=syncBoards($boardid,$parentlist.",$boardid");

   $updatelist.=",$boardid";
  }

  $db->query("UPDATE bb".$n."_boards SET parentlist='$parentlist' WHERE boardid IN (0$updatelist)");
  if($parentid!=0) $db->query("UPDATE bb".$n."_boards SET childlist='0$childlist' WHERE boardid='$parentid'");

  return $childlist;
 }

 syncBoards(0);

 header("Location: board.php?action=view&sid=$session[hash]");
 exit();
}
?>