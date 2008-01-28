{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Private Messages</title>
$headinclude
<script language="JavaScript">
<!--
function toOpener(url) {
 opener.location.href=url;
 opener.document.focus();
}
//-->
</script>
</head>

<body id="bg">
<!-- {imagelogo} -->
<table width="100%" cellpadding=8 cellspacing=1 align="center" border=0 bgcolor="{tableoutbordercolor}">
 <tr><td bgcolor="{mainbgcolor}" align="center"><table cellpadding=4 cellspacing=1 border=0 width="100%" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecatcolor}" id="tablecat">
  <td colspan=4><normalfont color="{fontcolorthird}"><b>You have $pmscount new message(es) in your inbox:</b></font></td>
 </tr> 
 $pmbit
 <tr bgcolor="{tablecolorb}" id="tableb">
   <td colspan=4 align="center"><input type="button" value="Go to Inbox" class="input" onclick="javascript:toOpener('pms.php?sid=$session[hash]');self.close();"> <input type="button" value="Cancel" class="input" onclick="javascript:self.close();"></td>
 </tr>
</table></td></tr>
</table>
</body>
</html>