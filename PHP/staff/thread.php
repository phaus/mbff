<?php
$filename="thread.php";

require("./global.php");
require("./acp/lib/class_parse.php");

if((!isset($postid) && !isset($threadid)) || $thread['closed']==3) eval("error(\"".$tpl->get("error_falselink")."\");");

if($wbbuserdata['canuseacp']==1 || $wbbuserdata['issupermod']==1 || ($wbbuserdata['ismod']==1 && $modpermissions['userid'])) $visible="";
else $visible="AND visible=1";

if($_REQUEST['goto']=="lastpost") {
 $result = $db->query_first("SELECT postid FROM bb".$n."_posts WHERE threadid = '$threadid' $visible ORDER BY posttime DESC LIMIT 1");
 header("Location: thread.php?sid=$session[hash]&postid=$result[postid]#post$result[postid]");
 exit();
}

if(isset($_COOKIE['threadvisit'])) $threadvisit=decode_cookie($_COOKIE['threadvisit']);
else $threadvisit=array();

if(isset($_COOKIE['postvisit'])) $postvisit=decode_cookie($_COOKIE['postvisit']);
else $postvisit=array();


if($_REQUEST['goto']=="firstnew") {
if($threadvisit[$threadid]<$wbbuserdata['lastvisit']) $threadvisit[$threadid]=$wbbuserdata['lastvisit'];
$result = $db->query_first("SELECT postid FROM bb".$n."_posts WHERE threadid='$threadid' AND posttime>'$threadvisit[$threadid]' $visible ORDER BY posttime ASC",1);
if($result['postid']) header("Location: thread.php?sid=$session[hash]&postid=$result[postid]#post$result[postid]");
else header("Location: thread.php?goto=lastpost&threadid=$threadid&sid=$session[hash]");
exit();
}

if($_REQUEST['goto']=="nextnewest") {
 $result = $db->query_first("SELECT threadid FROM bb".$n."_threads WHERE visible = 1 AND lastposttime>'$thread[lastposttime]' AND closed <> 3 AND boardid = '$boardid' ORDER BY lastposttime ASC",1);
 if(!$result['threadid']) eval("error(\"".$tpl->get("error_nonextnewest")."\");");
 $threadid=$result['threadid'];
 $thread = $db->query_first("SELECT * FROM bb".$n."_threads WHERE threadid = '$threadid'");
}

if($_REQUEST['goto']=="nextoldest") {
 $result = $db->query_first("SELECT threadid FROM bb".$n."_threads WHERE visible = 1 AND lastposttime<'$thread[lastposttime]' AND closed <> 3 AND boardid = '$boardid' ORDER BY lastposttime DESC",1);
 if(!$result['threadid']) eval("error(\"".$tpl->get("error_nonextoldest")."\");");
 $threadid=$result['threadid'];
 $thread = $db->query_first("SELECT * FROM bb".$n."_threads WHERE threadid = '$threadid'");
}


if($wbbuserdata['umaxposts']) $postsperpage=$wbbuserdata['umaxposts'];
elseif($board['postsperpage']) $postsperpage=$board['postsperpage'];
else $postsperpage=$default_postsperpage;
$postorder=$board['postorder'];

if(isset($postid)) {
 if($postorder==0) $result = $db->query_first("SELECT COUNT(*) AS posts FROM bb".$n."_posts WHERE threadid='$threadid' AND postid<='$postid' $visible");
 else $result = $db->query_first("SELECT COUNT(*) AS posts FROM bb".$n."_posts WHERE threadid='$threadid' AND postid>='$postid' $visible");
 $_GET['page']=ceil($result['posts']/$postsperpage);
}

$db->unbuffered_query("UPDATE bb".$n."_threads SET views=views+1 WHERE threadid='$threadid'",1);

$boardnavcache=array();
if($showboardjump==1) $boardjump=makeboardjump($boardid);
$navbar=getNavbar($board['parentlist']);
eval ("\$navbar .= \"".$tpl->get("navbar_board")."\";");

/* flat view */
if($threadview==0) {
 $result = $db->query_first("SELECT COUNT(*) FROM bb".$n."_posts WHERE threadid = '$threadid' $visible");
 $postcount = $result[0];

 if(isset($_GET['page'])) {
  $page=intval($_GET['page']);
  if($page==0) $page=1;
 }
 else $page=1;
 $pages = ceil($postcount/$postsperpage);
 if($pages>1) $pagelink=makepagelink("thread.php?threadid=$threadid&sid=$session[hash]",$page,$pages,$showpagelinks-1);

 $postids="";
 $result = $db->query("SELECT postid FROM bb".$n."_posts WHERE threadid = '$threadid' $visible ORDER BY posttime ".ifelse($postorder,"DESC","ASC")." LIMIT ".($postsperpage*($page-1)).",".$postsperpage);
 while($row=$db->fetch_array($result)) $postids .= ",".$row['postid'];
}

$parse = new parse($docensor,75,$board['allowsmilies'],$board['allowbbcode'],$wbbuserdata['showimages'],$usecode);

$userfields="";
$userfieldsjoin="";

if($showavatar==1) {
 $avatar=", av.avatarid, av.avatarextension, av.width, av.height";
 $avatarjoin="LEFT JOIN bb".$n."_avatars av ON (u.avatarid=av.avatarid)";
}
else {
 $avatar="";
 $avatarjoin="";
}

if($board['allowicons']==1) {
 $icon=", i.iconpath, i.icontitle";
 $iconjoin="LEFT JOIN bb".$n."_icons i ON (p.iconid=i.iconid)";
}
else {
 $icon="";
 $iconjoin="";
}
$result = $db->query("SELECT
p.*,
u.userposts,
u.regdate,
u.signature,
u.email,
u.homepage,
u.icq,
u.aim,
u.yim,
u.msn,
u.showemail,
u.receivepm,
u.usercanemail,
u.gender,
u.invisible,
u.title,
u.lastactivity,
r.ranktitle, r.rankimages
$userfields
$icon
$avatar
FROM bb".$n."_posts p
LEFT JOIN bb".$n."_users u USING (userid)
LEFT JOIN bb".$n."_ranks r USING (rankid)
$userfieldsjoin
$iconjoin
$avatarjoin
WHERE p.postid IN (0$postids)
ORDER BY p.posttime ".ifelse($postorder,"DESC","ASC"));

$count=0;
while($posts=$db->fetch_array($result)) {
 if($userfieldcache) reset($userfieldcache);
 $signature="";
 $threadstarter="";
 $lastedit="";
 $search="";
 $homie="";
 $email="";
 $homepage="";
 $icq="";
 $aim="";
 $yim="";
 $user_online="";
 $userfields="";
 $gender="";
 $useravatar="";
 $rankimages="";
 $setvisible="";
 $pm="";
 $invisible="";

 /** mod/admin option -> set visible post **/
 if($posts['visible']==0 && $posts['posttime']!=$thread['starttime']) eval ("\$invisible = \"".$tpl->get("thread_invisible")."\";");

 $tdbgcolor=getone($count,"{tablecolorb}","{tablecolora}");
 $tdid=getone($count,"tableb","tablea");

 $posts['message']=$parse->doparse($posts['message'],$posts['allowsmilies']*$board['allowsmilies'],$board['allowhtml'],$board['allowbbcode'],$board['allowimages']);
 $posts['posttopic']=$parse->textwrap($posts['posttopic'],30);
 if($posts['iconid'] && $board['allowicons']==1) $posticon=makeimgtag($posts['iconpath'],$posts['icontitle']);
 else $posticon="";
 if($wbbuserdata['lastvisit']<=$posts['posttime'] && $postvisit[$posts['postid']]!=1) eval ("\$postsign = \"".$tpl->get("thread_newpost")."\";");
 else eval ("\$postsign = \"".$tpl->get("thread_nonewpost")."\";");
 $postdate=formatdate($dateformat,$posts['posttime'],1);
 $posttime=formatdate($timeformat,$posts['posttime']);

 if($posts['editorid']) {
  $editdate=formatdate($dateformat,$posts['edittime']);
  $edittime=formatdate($timeformat,$posts['edittime']);
  eval ("\$lastedit = \"".$tpl->get("thread_lastedit")."\";");
 }
 if($posts['userid']) {
  $rankimages=formatRI($posts['rankimages']);
  if($rankimages) eval ("\$rankimages = \"".$tpl->get("thread_rankimages")."\";");
  if($posts['title']) $posts['ranktitle']=$posts['title'];

  if($showonlineinthread==1) {
   if(($posts['invisible']==0 || $wbbuserdata['canuseacp']==1) && $posts['lastactivity']>=time()-$useronlinetimeout*60) eval ("\$user_online = \"".$tpl->get("thread_user_online")."\";");
   else eval ("\$user_online = \"".$tpl->get("thread_user_offline")."\";");
  }

  if($showregdateinthread==1) {
   $posts['regdate']=formatdate($dateformat,$posts['regdate']);
   eval ("\$posts['regdate'] = \"".$tpl->get("thread_regdate")."\";");
  }
  else $posts['regdate']="";

  if($showuserfieldsinthread==1 && is_array($userfieldcache) && count($userfieldcache)) {
   while(list($key,$val)=each($userfieldcache)) {
    $fieldcontent=$parse->textwrap($posts["field".$val['profilefieldid']],20);
    if($fieldcontent) eval ("\$userfields .= \"".$tpl->get("thread_userfields")."\";");
   }
  }

  if($showgenderinthread==1 && $posts['gender']>0) {
   if($posts['gender']==1) eval ("\$gender = \"".$tpl->get("thread_gender_male")."\";");
   if($posts['gender']==2) eval ("\$gender = \"".$tpl->get("thread_gender_female")."\";");
  }

  if($showuserpostsinthread==1) eval ("\$posts['userposts'] = \"".$tpl->get("thread_userposts")."\";");
  else $posts['userposts']="";

  eval ("\$search = \"".$tpl->get("thread_search")."\";");
  eval ("\$homie = \"".$tpl->get("thread_homie")."\";");
  if($posts['showemail']==1) eval ("\$email = \"".$tpl->get("thread_email")."\";");
  elseif($posts['usercanemail']==1) eval ("\$email = \"".$tpl->get("thread_formmail")."\";");
  if($posts['homepage']) eval ("\$homepage = \"".$tpl->get("thread_homepage")."\";");
  if($posts['receivepm']==1 && $wbbuserdata['canusepms']==1) eval ("\$pm = \"".$tpl->get("thread_pm")."\";");
  if($posts['icq']) eval ("\$icq = \"".$tpl->get("thread_icq")."\";");
  if($posts['aim']) eval ("\$aim = \"".$tpl->get("thread_aim")."\";");
  if($posts['yim']) eval ("\$yim = \"".$tpl->get("thread_yim")."\";");

  if($posts['avatarid'] && $showavatar==1 && $wbbuserdata['showavatars']==1) {
   $avatarname="images/avatars/avatar-$posts[avatarid].$posts[avatarextension]";
   $avatarwidth=$posts['width'];
   $avatarheight=$posts['height'];
   eval ("\$useravatar = \"".$tpl->get("avatar_image")."\";");
   eval ("\$useravatar = \"".$tpl->get("thread_useravatar")."\";");
  }
  eval ("\$posts['username'] = \"".$tpl->get("thread_username")."\";");

  if($posts['showsignature']==1 && $wbbuserdata['showsignatures']==1 && $posts['signature']) {
   $posts['signature']=$parse->doparse($posts['signature'],$posts['allowsmilies']*$allowsigsmilies,$allowsightml,$allowsigbbcode,$maxsigimage);
   eval ("\$signature = \"".$tpl->get("thread_signature")."\";");
  }
 }
 else {
  eval ("\$posts[ranktitle] = \"".$tpl->get("anonymous")."\";");
 }

 eval ("\$postbit .= \"".$tpl->get("thread_postbit")."\";");
 $count++;
}

if($wbbuserdata['issupermod']==1 || $modpermissions['userid']) eval ("\$modoptions = \"".$tpl->get("thread_modoptions")."\";");
elseif($wbbuserdata['userid'] && $wbbuserdata['userid']==$thread['starterid'] && ($wbbuserdata['cancloseowntopic']==1 || $wbbuserdata['candelowntopic']==1 || $wbbuserdata['caneditowntopic']==1)) eval ("\$modoptions = \"".$tpl->get("thread_useroptions")."\";");

if($thread['pollid']) {
 if($wbbuserdata['issupermod']==1 || $modpermissions['userid']==1) eval ("\$mod_poll_edit = \"".$tpl->get("mod_poll_edit")."\";");

 unset($votecheck);
 $poll=$db->query_first("SELECT * FROM bb".$n."_polls WHERE pollid='$thread[pollid]'");
 if($poll['timeout']==0) $timeout=time()+1;
 else $timeout=$poll['starttime']+$poll['timeout']*86400;
 if($_REQUEST['preresult']!=1 && $wbbuserdata['canvotepoll'] && $timeout>=time()) {
  if($wbbuserdata['userid']) $votecheck=$db->query_first("SELECT id AS pollid FROM bb".$n."_votes WHERE id='$thread[pollid]' AND votemode=1 AND userid='$wbbuserdata[userid]'");
  else $votecheck=$db->query_first("SELECT id AS pollid FROM bb".$n."_votes WHERE id='$thread[pollid]' AND votemode=1 AND ipaddress='$REMOTE_ADDR'");
 }

 if($_REQUEST['preresult']==1 || $votecheck['pollid'] || !$wbbuserdata['canvotepoll'] || $timeout<time()) { // already voted; show result
  $votes=0;
  unset($polloption);
  $totalvotes=0;
  //list($totalvotes)=$db->query_first("SELECT SUM(votes) FROM bb".$n."_polloptions WHERE pollid='$thread[pollid]'");
  $result=$db->query("SELECT * FROM bb".$n."_polloptions WHERE pollid='$thread[pollid]' ORDER BY votes DESC");
  while($row=$db->fetch_array($result)) {
   $totalvotes+=$row['votes'];
   $polloptions[]=$row;
  }

  $i=1;
  while(list($key,$row)=each($polloptions)) {
   $row['polloption']=$parse->doparse($row['polloption'],$board['allowsmilies'],$board['allowhtml'],$board['allowbbcode'],$board['allowimages']);
   if($totalvotes) {
    $percent_float = $row['votes']*100/$totalvotes;
    $percent = number_format($percent_float, 2);
    $percent_int = floor($percent_float)*3;
    $percent_int += 1;
   }
   else $percent = $percent_int = 0;
   eval ("\$thread_poll_resultbit .= \"".$tpl->get("thread_poll_resultbit")."\";");
   if($i==5) $i=0;
   $i++;
  }

  eval ("\$thread_poll = \"".$tpl->get("thread_poll_result")."\";");
 }
 else {
  if($poll['choicecount']>1) $inputtype="checkbox";
  else $inputtype="radio";

  $result=$db->query("SELECT * FROM bb".$n."_polloptions WHERE pollid='$thread[pollid]' ORDER BY showorder ASC");
  while($row=$db->fetch_array($result)) {
   $row['polloption']=$parse->doparse($row['polloption'],$board['allowsmilies'],$board['allowhtml'],$board['allowbbcode'],$board['allowimages']);
   eval ("\$thread_pollbit .= \"".$tpl->get("thread_pollbit")."\";");
  }

  eval ("\$thread_poll = \"".$tpl->get("thread_poll")."\";");
 }
}

if($thread['voted']) {
 $avarage=number_format($thread['votepoints']/$thread['voted'],2);
 $threads['voted']=$thread['voted'];
 eval ("\$threadrating = \"".$tpl->get("board_threadbit_rating")."\";");
 $threadrating=str_repeat($threadrating, round($avarage));
}
else $threadrating="";

$threadvisit[$threadid]=time();
if($wbbuserdata['usecookies']==1) encode_cookie("threadvisit");

$postids = explode(",",$postids);
for($i=0;$i<count($postids);$i++) $postvisit[$postids[$i]]=1;
if($wbbuserdata['usecookies']==1) encode_cookie("postvisit",0,false);

if($board['closed']==0) eval ("\$newthread = \"".$tpl->get("board_newthread")."\";");
$addreply_link="threadid=$threadid";
if($thread['closed']!=0) eval ("\$addreply = \"".$tpl->get("thread_closed")."\";");
elseif($board['closed']==0) eval ("\$addreply = \"".$tpl->get("thread_addreply")."\";");

if(strlen($thread['topic'])>60) $thread['topic']=parse::textwrap($thread['topic'],60);
eval("\$tpl->output(\"".$tpl->get("thread")."\");");
?>
