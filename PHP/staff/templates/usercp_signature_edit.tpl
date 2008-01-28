{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Edit Signature</title>
  $headinclude
 
 <script language="javascript">
  <!--
   var postmaxchars = $wbbuserdata[maxsiglength];
   function validate(theform) {
    if (postmaxchars != 0) {
     if (theform.message.value.length > postmaxchars) {
      alert("Your signature is too long. Please reduce it to "+postmaxchars+" characters. Your signature currently has a length of "+theform.message.value.length+" characters.");
      return false;
     }
     else return true;
    }
    else return true;
   }
    
   function checklength(theform) {
    if (postmaxchars != 0) message = " The maximum length is "+postmaxchars+" characters."; 
    else message = "";
    alert("Your signature has a length of "+theform.message.value.length+" characters."+message);
   }
  //-->
 </script>
 <script language="Javascript" src="bbcode.js"></script>
 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Edit Signature</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>$usercp_error<FORM ACTION="usercp.php" METHOD="POST" name="bbform" onSubmit="return validate(this)">
  $usercp_signature_edit_old$usercp_signature_edit_preview
  <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><normalfont color="{fontcolorsecond}"><b>Personal Signature</b></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td valign="top"><normalfont><b>Signature:</b></font><br><smallfont>Your signature is shown after your posts.</font><p><table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}">
     <tr>
      <td bgcolor="{tablecolorb}" id="tableb" nowrap><smallfont>$note</font></td>
     </tr>
    </table></p>
    <p>$bbcode_smilies</p>
    </td>
    <td><table>
   <tr>
    <td align="center">$bbcode_buttons</td>
   </tr>
   <tr>
    <td><textarea name="message" rows=15 cols=60 wrap="soft" onChange=getActiveText(this) onclick=getActiveText(this) onFocus=getActiveText(this)>$message</textarea><br><smallfont><a href="javascript:checklength(document.bbform);">Check signature length</a></font></td>
   </tr>
  </table></td>
   </tr>
  </table><br>
  <p align="center"><input class="input" type="submit" value="Submit"> <input class="input" type="submit" name="preview" value="Preview"> <input class="input" type="reset" value="Reset"></p>
   <input type="hidden" name="action" value="$action">
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>