<?php
$filename="profile.php";

require("./global.php");
if($wbbuserdata['canviewprofile']==0) access_error();
require("./acp/lib/class_parse.php");

$userid=intval($_GET['userid']);
if(!$userid) eval("error(\"".$tpl->get("error_falselink")."\");");

$user_info = $db->query_first("SELECT
 u.*,
 uf.*,
 r.rankimages, r.ranktitle,
 a.avatarextension, a.width, a.height
 FROM bb".$n."_users u
 LEFT JOIN bb".$n."_userfields uf USING (userid)
 LEFT JOIN bb".$n."_avatars a ON (a.avatarid=u.avatarid)
 LEFT JOIN bb".$n."_ranks r ON (r.rankid=u.rankid)
 WHERE u.userid='$userid'");

if(!$user_info['userid']) eval("error(\"".$tpl->get("error_falselink")."\");");

$regdate = formatdate($dateformat,$user_info['regdate']);
$posts['userid'] = $user_info['userid'];
$posts['username'] = $user_info['username'];

if(($user_info['invisible']==0 || $wbbuserdata['canuseacp']==1) && $user_info['lastactivity']>=time()-$useronlinetimeout*60) eval ("\$user_online = \"".$tpl->get("thread_user_online")."\";");
else eval ("\$user_online = \"".$tpl->get("thread_user_offline")."\";");

$regdays = (time() - $user_info[regdate]) / 86400;
if ($regdays < 1) $postperday = "$user_info[userposts]";
else $postperday = sprintf("%.2f",($user_info['userposts'] / $regdays));

if($user_info['usertext']) $user_text=parse::textwrap($user_info['usertext'],40);
if($user_info['gender']) {
 if($user_info['gender']==1) eval ("\$gender = \"".$tpl->get("profile_male")."\";");
 else eval ("\$gender  = \"".$tpl->get("profile_female")."\";");
}
else eval ("\$gender = \"".$tpl->get("profile_nodeclaration")."\";");

if($user_info['title']) $user_info['ranktitle']=$user_info['title'];
$rankimages=formatRI($user_info['rankimages']);

if($user_info['avatarid'] && $showavatar==1 && $wbbuserdata['showavatars']==1) {
 $avatarname="images/avatars/avatar-$user_info[avatarid].$user_info[avatarextension]";
 $avatarwidth=$user_info['width'];
 $avatarheight=$user_info['height'];
 eval ("\$useravatar = \"".$tpl->get("avatar_image")."\";");
}

if($user_info['showemail']==1) $useremail = makehreftag("mailto:$user_info[email]",$user_info['email']);
else eval ("\$useremail = \"".$tpl->get("profile_nodeclaration")."\";");

if($user_info['homepage']) $userhomepage = makehreftag($user_info['homepage'],$user_info['homepage'],"_blank");
else eval ("\$userhomepage = \"".$tpl->get("profile_nodeclaration")."\";");

if(!$user_info['icq']) eval ("\$user_info[icq] = \"".$tpl->get("profile_nodeclaration")."\";");
if(!$user_info['aim']) eval ("\$user_info[aim] = \"".$tpl->get("profile_nodeclaration")."\";");
if(!$user_info['yim']) eval ("\$user_info[yim] = \"".$tpl->get("profile_nodeclaration")."\";");
if(!$user_info['msn']) eval ("\$user_info[msn] = \"".$tpl->get("profile_nodeclaration")."\";");

if($user_info['birthday'] && $user_info['birthday']!="0000-00-00") {
 $birthday_array = explode("-",$user_info['birthday']);
 if($birthday_array[0]=="0000") $birthday =  $birthday_array[2].".".$birthday_array[1].".";
 else $birthday =  $birthday_array[2].".".$birthday_array[1].".".$birthday_array[0];
}
else eval ("\$birthday = \"".$tpl->get("profile_nodeclaration")."\";");

$result = $db->query("SELECT profilefieldid, title FROM bb".$n."_profilefields".ifelse($wbbuserdata['canuseacp']==0," WHERE hidden=0")." ORDER BY fieldorder ASC");
while($row=$db->fetch_array($result)) {
 $fieldid="field".$row['profilefieldid'];
 if(!$user_info[$fieldid]) eval ("\$user_info[$fieldid] = \"".$tpl->get("profile_nodeclaration")."\";");
 else $user_info[$fieldid]=parse::textwrap($user_info[$fieldid],50);
 eval ("\$profilefields .= \"".$tpl->get("profile_userfield")."\";");
}
if($profilefields) eval ("\$hr = \"".$tpl->get("profile_hr")."\";");

if($user_info['showemail']==0 && $user_info['usercanemail']==1) eval ("\$btn_email = \"".$tpl->get("thread_formmail")."\";");
if($user_info['userposts']!=0) eval ("\$btn_search = \"".$tpl->get("thread_search")."\";");
if($user_info['receivepm']==1 && $wbbuserdata['canusepms']==1) eval ("\$btn_pm = \"".$tpl->get("thread_pm")."\";");

eval("\$tpl->output(\"".$tpl->get("profile")."\");");
?>
