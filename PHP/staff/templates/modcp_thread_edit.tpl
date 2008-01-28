{!DOCTYPE}
<html>
<head>
<title>$master_board_name - $thread[topic]</title>
$headinclude
<script type="text/javascript">
function announce()
{
	document.mform.announce.value='1';
	document.mform.submit();
}
</script>
</head>
<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar » <a href="thread.php?threadid=$threadid&sid=$session[hash]">$thread[topic]</a></b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br><FORM ACTION="modcp.php" METHOD="POST" name="mform">
 <INPUT TYPE="HIDDEN" NAME="action" VALUE="$action">
 <INPUT TYPE="HIDDEN" NAME="announce" VALUE="">
 <INPUT TYPE="HIDDEN" NAME="threadid" VALUE="$threadid">
 <INPUT TYPE="HIDDEN" NAME="send" VALUE="send">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
<table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}" align="center">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><normalfont color="{fontcolorsecond}"><b>Edit Thread</b></font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td><normalfont><b>Title:</b></font></td>
  <td><input class="input" type="text" name="topic" value="$thread[topic]" SIZE=40 MAXLENGTH=100></td>
 </tr>
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><normalfont>Options:</font></td>
  <td><input type="checkbox" name="closed" value="1"$checked><normalfont> <b>Close thread:</b> Users cannot reply to this thread anymore.</font></td>
 </tr>
 $change_important
 $remove_redirect
 $newthread_icons
</table>
<p align="center">
 <input class="input" name="submitbutton" type="submit" accesskey="S" value="Thema aktualisieren">
 <input class="input" type="reset" accesskey="R" value="Zur&uuml;cksetzen">
</p>
</form>
$footer
</body>
</html>
