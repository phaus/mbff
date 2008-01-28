{!DOCTYPE}<html>
<head>
<title>$master_board_name - $thread[topic]</title>
$headinclude
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
</table><br><FORM ACTION="modcp.php" METHOD="POST">
 <INPUT TYPE="HIDDEN" NAME="action" VALUE="$action">
 <INPUT TYPE="HIDDEN" NAME="threadid" VALUE="$threadid">
 <INPUT TYPE="HIDDEN" NAME="send" VALUE="send">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
<table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}" align="center">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><normalfont color="{fontcolorsecond}"><b>Delete Thread</b></font></td>
 </tr>
 <tr>
  <td width="50%" bgcolor="{tablecolora}" id="tablea"><normalfont><b>Delete Thread?</b></font></td>
  <td width="50%" bgcolor="{tablecolorb}" id="tableb"><input type="submit" value="Yes" class="input"> <input type="button" value="No" onclick="history.back();" class="input"></td>
 </tr></form>
</table>
$footer
</body>
</html>  