{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Forgot Password</title>
$headinclude
</head>

<body id="bg">
 $header
 </table>
 <table border=0 cellpadding=4 cellspacing=1 align="center" bgcolor="{tableinbordercolor}">
  <form method="post" action="forgotpw.php">
  <input type="hidden" name="action" value="$action">
  <input type="hidden" name="send" value="send">
  <input type="hidden" name="sid" value="$session[hash]">
  <tr id="tabletitle" bgcolor="{tabletitlecolor}">
   <td colspan=2><normalfont color="{fontcolorsecond}"><b>Forgot Password</b></font></td>
  </tr>
  <tr>
   <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>Username:</b></font><br><smallfont>Enter your username so you can get a new password.</font></td>
   <td id="tableb" bgcolor="{tablecolorb}"><normalfont><input type="text" name="username" value="$wbbuserdata[username]" class="input">&nbsp;<input type="submit" class="input" value="Submit"></font></td>
  </tr>
 </form></table> 
 $footer
</body>
</html>