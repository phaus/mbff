{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Ignore List</title>
  $headinclude
 
 </head>
 <body id="bg" onload="document.bbform.addtolist.focus();">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Ignore List</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br><FORM ACTION="usercp.php" METHOD="POST" name="bbform">
  <table cellpadding=5 cellspacing=0 border=0 width="{tableinwidth}">
   <tr>
    <td width="200" valign="top">
     <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="200">
      <tr bgcolor="{tabletitlecolor}" id="tabletitle">
       <td colspan=2 align="center"><normalfont color="{fontcolorsecond}"><b>Ignore List</b></font></td>
      </tr>
      $listbit
     </table>
    </td>
    <td width="100%" valign="top">
     <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="100%">
      <tr>
       <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>Add User:</b></font><br><smallfont>Enter the username of a member you want to add to your ignore list.</font></td>
       <td id="tableb" bgcolor="{tablecolorb}"><input type="text" class="input" name="addtolist" maxlength=50> <input class="input" type="submit" value="Add"></td>
      </tr>
     </table>
    </td>
   </tr>
  </table><br>
   <input type="hidden" name="action" value="$action">
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>