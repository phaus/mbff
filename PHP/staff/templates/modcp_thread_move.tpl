{!DOCTYPE}
<html>
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
  <td colspan=2><normalfont color="{fontcolorsecond}"><b>Move/Copy Thread</b></font></td>
 </tr>
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><normalfont><b>Move/Copy thread to the forum:</b></font></td>
  <td><select name="newboardid">
   <option value="-1">Please choose:</option>
   $newboard_options
  </select><smallfont> (* Category - cannot contain threads)</font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td><normalfont><b>Options:</b></font></td>
  <td><normalfont>
   <input type="radio" name="mode" value="onlymove"> Move<br>
   <input type="radio" name="mode" value="movewithredirect" checked> Move (with a link in the old forum)<br>
   <input type="radio" name="mode" value="copy"> Copy 
  </font></td>
 </tr>
</table>
<p align="center">
 <input class="input" type="submit" name="submit" accesskey="S" value="Move/Copy Thread">
 <input class="input" type="button" onclick="history.back()" value="Cancel">
</p>
</form>
$footer
</body>
</html>  
</html>  