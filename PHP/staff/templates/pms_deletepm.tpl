{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Delete PM</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar » <a href="pms.php?sid=$session[hash]">Private Messages</a></b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br><FORM ACTION="pms.php" METHOD="POST">
 <INPUT TYPE="HIDDEN" NAME="action" VALUE="$action">
 <INPUT TYPE="HIDDEN" NAME="outbox" VALUE="$outbox">
 <INPUT TYPE="HIDDEN" NAME="pmid" VALUE="$pmid">
 <INPUT TYPE="HIDDEN" NAME="send" VALUE="send">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
<table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}" align="center">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><normalfont color="{fontcolorsecond}"><b>Delete PM</b></font></td>
 </tr>
 <tr>
  <td width="50%" bgcolor="{tablecolora}" id="tablea"><normalfont><b>Are you sure you want to delete this PM?</b></font></td>
  <td width="50%" bgcolor="{tablecolorb}" id="tableb"><input type="submit" value="Yes" class="input"> <input type="button" value="No" onclick="history.back();" class="input"></td>
 </tr></form>
</table>
$footer
</body>
</html>  