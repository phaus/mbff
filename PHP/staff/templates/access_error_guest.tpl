<FORM ACTION="login.php" METHOD="POST">
 <INPUT TYPE="HIDDEN" NAME="url" VALUE="$REQUEST_URI">
 <INPUT TYPE="HIDDEN" NAME="send" VALUE="send">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
 <table border=0 bgcolor="{tableinbordercolor}" cellpadding=4 cellspacing=1 widht="300" align="center">
  <tr id="tableb" bgcolor="{tablecolorb}">
   <td><normalfont>Username:</font></td>
   <td><input type="text" class="input" name="l_username" SIZE=20 MAXLENGTH=50 tabindex="1"><smallfont> <a href="register.php?sid=$session[hash]">Register</a></font></td> 
  </tr>
  <tr id="tablea" bgcolor="{tablecolora}">
   <td><normalfont>Password:</font></td>
   <td><input type="password" class="input" name="l_password" SIZE=20 MAXLENGTH=30 tabindex="2"><smallfont> <a href="forgotpw.php?sid=$session[hash]">Forgot password?</a></font></td> 
  </tr>
 </table>
 <div align="center"><INPUT class="input" TYPE="SUBMIT" NAME="submit" VALUE="Login"><INPUT class="input" TYPE="reset" VALUE="Reset"></div>