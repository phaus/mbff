{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Change Password</title>
  $headinclude
 
 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Change Password</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br><FORM ACTION="usercp.php" METHOD="POST">
  <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><normalfont color="{fontcolorsecond}"><b>Change Password</b></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Old Password:</b><font></td>
    <td><input type="password" class="input" name="old_password"><smallfont> <a href="forgotpw.php?sid=$session[hash]">Forgot Password</a></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>New Password:</b><font></td>
    <td><input type="password" class="input" name="new_password"></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Confirm New Password:</b><font></td>
    <td><input type="password" class="input" name="confirm_new_password"></td>
   </tr>
  </table><br>
  <p align="center"><input class="input" type="submit" value="Submit"> <input class="input" type="reset" value="Reset"></p>
   <input type="hidden" name="action" value="$action">
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>