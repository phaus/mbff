{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Send Message</title>
$headinclude

<script language="javascript">
<!--
var postmaxchars = $pmmaxchars;
function validate(theform) {
 if (theform.recipient.value=="" || theform.message.value=="" || theform.subject.value=="") {
  alert("You must fill out the to, subject and message fields!");
  return false;
 }
 if (postmaxchars != 0) {
  if (theform.message.value.length > postmaxchars) {
   alert("Your message is too long. Please reduce it to "+postmaxchars+" characters. Your message has currently a length of "+theform.message.value.length+" characters.");
   return false;
  }
  else return true;
 }
 else return true;
}
function checklength(theform) {
 if (postmaxchars != 0) message = " The maximum length is "+postmaxchars+" characters.";
 else message = "";
 alert("Your message has a length of "+theform.message.value.length+" characters."+message);
}
//-->
</script>
<script language="Javascript" src="bbcode.js"></script>
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » <a href="pms.php?sid=$session[hash]">Private Messages</a> » Send Message</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>$preview_window $pm_error
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="pms.php" method="post" name="bbform" onSubmit="return validate(this)">
  <td colspan=2><normalfont color="{fontcolorsecond}"><B>Send Message</B></font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td><normalfont><b>To:</b></font></td>
  <td><input type="text" name="recipient" value="$recipient" maxlength="50" class="input"></td>
 </tr>
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><normalfont><b>Subject:</b></font></td>
  <td><input class="input" type="text" name="subject" value="$subject" SIZE=40 MAXLENGTH=100></td>
 </tr>
 $pm_icons
 <tr bgcolor="{tablecolora}" id="tablea">
  <td valign="top"><normalfont><b>Message:</b></font>
   <p><table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}">
    <tr>
     <td bgcolor="{tablecolorb}" id="tableb" nowrap><smallfont>$note</font></td>
    </tr>
   </table></p>
   <p>$bbcode_smilies</p>
  </td>
  <td><table>
   <tr>
    <td align="center">$bbcode_buttons</td>
   </tr>
   <tr>
    <td><textarea name="message" rows=15 cols=60 wrap="soft" onChange=getActiveText(this) onclick=getActiveText(this) onFocus=getActiveText(this)>$message</textarea><br><smallfont><a href="javascript:checklength(document.bbform);">Check message length</a></font></td>
   </tr>
  </table></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td valign="top"><normalfont>Options:</font></td>
  <td><smallfont><input type="checkbox" name="parseurl" value="1" $checked[0]> <B>Convert URLs:</B> Automatically converts internet addresses into links by adding [url] and [/url] around them.
   <br><input type="checkbox" name="disablesmilies" value="1" $checked[1]> <B>Deactivate smilies in this message.</b>
   <br><input type="checkbox" name="showsignature" value="1" $checked[2]> <B>Add Signature:</B> Displays your signature in this message.
   <br><input type="checkbox" name="savecopy" value="1" $checked[3]> <B>Keep a Copy:</B> A copy of this PM will be stored in your Outbox.
  </font></td>
 </tr>
</table>
<p align="center">
 <input type="hidden" name="pmid" value="$pmid">
 <input type="hidden" name="send" value="send">
 <input type="hidden" name="action" value="$action">
 <input type="hidden" name="sid" value="$session[hash]">
 <input class="input" type="submit" name="submit" accesskey="S" value="Send Message">
 <input class="input" type="submit" name="preview" accesskey="P" value="Preview">
 <input class="input" type="reset" accesskey="R" value="Reset">
</p></form>
$footer
</body>
</html>
