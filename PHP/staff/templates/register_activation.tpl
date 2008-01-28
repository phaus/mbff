{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Activation</title>
$headinclude
</head>

<body id="bg">
 $header
 </table>
 <table border=0 cellpadding=4 cellspacing=1 align="center" bgcolor="{tableinbordercolor}">
  <form method="post" action="register.php">
  <input type="hidden" name="action" value="$action">
  <input type="hidden" name="sid" value="$session[hash]">
  <tr id="tablea" bgcolor="{tablecolora}">
   <td><normalfont>User ID:</font></td>
   <td><input type="text" name="usrid" class="input"></td>
  </tr>
  <tr id="tableb" bgcolor="{tablecolorb}">
   <td><normalfont>Activation Code:</font></td>
   <td><normalfont><input type="text" name="a" class="input">&nbsp;<input type="submit" class="input" value="Submit"></font></td>
  </tr>
 </form></table> 
 $footer
</body>
</html>