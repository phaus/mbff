<?php
$filename="formmail.php";

require ("./global.php");

if($turnoff_formmail==1 || !$wbbuserdata['userid'] || $wbbuserdata['activation']!=1) access_error();

if(isset($_POST['send'])) {
 if(isset($_POST['userid'])) list($recipient)=$db->query_first("SELECT email FROM bb".$n."_users WHERE userid='".intval($_POST['userid'])."'");	
 else $recipient=trim($_POST['recipient']);
 
 if(!$recipient) eval("error(\"".$tpl->get("error_falserecipient")."\");");	
 mailer($recipient,trim($_POST['subject']),trim($_POST['message']),$wbbuserdata['email']);
 eval("redirect(\"".$tpl->get("redirect_emailsend")."\",\"index.php?sid=$session[hash]\",5);");	
}

$userinput="";
$formmail_to="";
if(isset($_REQUEST['userid'])) $userinput = "<INPUT TYPE=\"HIDDEN\" NAME=\"userid\" VALUE=\"".$_REQUEST['userid']."\">";
else eval ("\$formmail_to = \"".$tpl->get("formmail_to")."\";");
if(isset($threadid)) {
 $subject=$thread['topic'];
 eval ("\$message = \"".$tpl->get("formmail_friendmessage")."\";");	
}
eval("\$tpl->output(\"".$tpl->get("formmail")."\");");
?>
