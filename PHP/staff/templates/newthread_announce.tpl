{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Add Announcement</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar » Add Announcement</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="newthread.php" method="post">
  <td><normalfont color="{fontcolorsecond}"><B>Add Announcement</B></font></td>
 </tr>
 <tr bgcolor="{tablecolora}" id="tablea">
   <td><smallfont>Specify in which forums this announcement should be displayed. A link to the original annoucement will be posted in each of these forums.</font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
   <td><select name="boardids[]" style="width:100%;" size=15 multiple>
   $board_options
  </select><br><smallfont>(Hold the "Ctrl/Shift" key and click to select multiple forums.)</font></td>
 </tr>
</table>
<p align="center">
 <input type="hidden" name="send" value="send">
 <input type="hidden" name="threadid" value="$threadid">
 <input type="hidden" name="action" value="$action">
 <input type="hidden" name="sid" value="$session[hash]">
 <input class="input" type="submit" name="submit" accesskey="S" value="Add Announcement">
 <input class="input" type="reset" accesskey="R" value="reset">
</p></form>
$footer
</body>
</html>	