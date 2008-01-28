<br><a name="login"></a>
<form method="post" action="login.php">
<input type="hidden" name="send" value="send">
<input type="hidden" name="sid" value="$session[hash]">
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><smallfont color="{fontcolorsecond}"><b>Login</b></font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td><table cellpadding=0 cellspacing=5 align="center">
   <tr>
    <td><smallfont>Username:</font></td>
    <td><input type="text" name="l_username" maxlength="50" size="20" class="input" tabindex="1">&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><smallfont>Password (<a href="forgotpw.php?sid=$session[hash]">Forgot Password</a>):</font></td>
    <td><input type="password" name="l_password" maxlength="30" size="20" class="input" tabindex="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><input type="submit" value="Login" class="input" tabindex="3"></td>
   </tr>
  </table></td>
 </tr></form>
</table>
