{!DOCTYPE}
<html>
<head>
<title>$master_board_name - $board[title]</title>
$headinclude
</head>

<body id="bg">
 $header
 </table><br>
 <table border=0 cellpadding=4 cellspacing=1 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <form method="post" action="board.php">
  <input type="hidden" name="boardid" value="$boardid">
  <input type="hidden" name="sid" value="$session[hash]">
   <td colspan=2><normalfont color="{fontcolorsecond}"><B>$board[title]</B></font></td>
  </tr>
  <tr>
   <td id="tablea" bgcolor="{tablecolora}"><normalfont>This forum is password-protected. Enter the correct password:</font></td>
   <td id="tableb" bgcolor="{tablecolorb}"><normalfont><input type="password" name="boardpassword" value="" maxlength="25" class="input">&nbsp;<input type="submit" value="Submit" class="input"></font></td>
  </tr>
 </form></table> 
 $footer
</body>
</html>