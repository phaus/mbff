{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Report Post</title>
$headinclude
</head>

<body id="bg">
 $header
 </table><br>
 <table border=0 cellpadding=4 cellspacing=1 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="report.php" method="post">
   <td colspan=2><normalfont color="{fontcolorsecond}"><B>Report Post</B></font></td>
  </tr>
  <tr id="tablea" bgcolor="{tablecolora}">
   <td><normalfont>Notify Moderator:</font></td>
   <td><select name="modid">$mod_options</select></td>
  </tr>
  <tr id="tableb" bgcolor="{tablecolorb}">
   <td valign="top"><normalfont><b>Reason:</b></font><br><smallfont></font><smallfont>This function should only be used for one of the following reasons: spam, advertisement or other problems (like racism, vulgarity, agressiveness, discrimination or sexism).</font></td>
   <td><textarea name="reason" rows=14 cols=70 wrap=virtual></textarea></td>
  </tr>
 </table>
<p align="center">
<input type="hidden" name="postid" value="$postid">
<input type="hidden" name="sid" value="$session[hash]">
<input type="hidden" name="send" value="send">
<input type="submit"  value="Send" class="input">
</form>
</p> 
 $footer
</body>
</html>