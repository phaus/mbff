{!DOCTYPE}<html>
<head>
<title>$master_board_name - Formmailer</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Formmailer</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="formmail.php" method="post">
 <td colspan=2><normalfont color="{fontcolorsecond}"><B>Send Email</B></font></td>
 </tr>
  $formmail_to
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><normalfont>Subject:</font></td>
  <td><INPUT class="input" TYPE="TEXT" NAME="subject" SIZE=50 MAXLENGTH=255 VALUE="$subject"></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td valign="top"><normalfont>Message:</font>
  <td><textarea class="input" name="message" rows=14 cols=70 wrap=virtual>$message</textarea></td>
 </tr>
</table>
<p align="center">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
 <INPUT TYPE="HIDDEN" NAME="send" VALUE="send">
 $userinput
 <INPUT class="input" TYPE="SUBMIT" NAME="submit" ACCESSKEY="S" VALUE="Send">
 <INPUT class="input" TYPE="RESET" NAME="reset" ACCESSKEY="L" VALUE="Reset">
 </form>
</p>
$footer
</body>
</html>