{!DOCTYPE}
<html>
<head>
<title>$master_board_name Smilies Legend</title>
$headinclude
<script language="JavaScript">
<!--
function smilie(smilietext) {
 opener.document.bbform.message.value += smilietext+" ";
 opener.document.bbform.message.focus();
}
//-->
</script>
</head>

<body id="bg">
<table width="100%" cellpadding=8 cellspacing=1 align="center" border=0 bgcolor="{tableoutbordercolor}">
 <tr><td bgcolor="{mainbgcolor}" align="center"><table cellpadding=4 cellspacing=1 border=0 width="100%" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
   <td colspan=4><normalfont color="{fontcolorsecond}"><B>Smilies Legend</B></font><br><smallfont color="{fontcolorsecond}">Click on a smilie to add it to your post.</font></td>
  </tr>
  $popup_smiliesbits
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
   <td colspan=4 align="center"><smallfont><a href="javascript:self.close()">[Close Window]</a></font></td>
  </tr>
 </table></td></tr>
</table>
</body>
</html>