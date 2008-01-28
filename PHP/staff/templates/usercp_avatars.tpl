{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Avatar</title>
  $headinclude

 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Avatar</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br><FORM ACTION="usercp.php" METHOD="POST" name="bbform" ENCTYPE="multipart/form-data">
  <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><normalfont color="{fontcolorsecond}"><b>Avatar</b></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td width="50%"><normalfont><b>Use Avatar?</b></font><br><smallfont>Avatars are small images shown under your username in all your posts.</font></td>
    <td width="50%"><normalfont><INPUT TYPE="RADIO" NAME="avatarid" VALUE="0"$noavatar_checked> No</font><br><smallfont>(If you currently use a custom avatar and decide to select this option, your avatar will be deleted.)</font></td>
   </tr>
   $avatar_choice
  </table><br>
  <p align="center"><input class="input" type="submit" value="Submit"> <input class="input" type="reset" value="Reset"></p>
   <input type="hidden" name="page" value="$page">
   <input type="hidden" name="action" value="$action">
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>