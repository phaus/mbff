{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Favorites</title>
$headinclude

<script language="Javascript">
<!--
function who(threadid) {
 window.open("misc.php?action=whoposted&threadid="+threadid+"&sid=$session[hash]", "moo", "toolbar=no,scrollbars=yes,resizable=yes,width=250,height=300");
}
//-->
</script>
</head>
<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Favorites</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecatcolor}" id="tablecat">
  <td colspan=5><normalfont color="{fontcolorthird}"><b>Subscribed Forums</b></font></td>
 </tr>
 $boardheader
 $boardbit
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecatcolor}" id="tablecat">
  <td colspan=8><normalfont color="{fontcolorthird}"><b>Subscribed Threads</b></font></td>
 </tr>
 $threadheader
 $threadbit
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="right"><form method="get" action="usercp.php">
  <input type="hidden" name="action" value="$action">
  <input type="hidden" name="sid" value="$session[hash]">
  <select name="daysprune">
   <option value="1000">Show all threads</option>
   <option value="1500"$d_select[1500]>New post since last visit</option>
   <option value="1"$d_select[1]>New post in last day</option>
   <option value="2"$d_select[2]>New post in last 2 days</option>
   <option value="5"$d_select[5]>New post in last 5 days</option>
   <option value="10"$d_select[10]>New post in last 10 days</option>
   <option value="20"$d_select[20]>New post in last 20 days</option>
   <option value="30"$d_select[30]>New post in last 30 days</option>
   <option value="45"$d_select[45]>New post in last 45 days</option>
   <option value="60"$d_select[60]>New post in last 60 days</option>
   <option value="75"$d_select[75]>New post in last 75 days</option>
   <option value="100"$d_select[100]>New post in last 100 days</option>
   <option value="365"$d_select[365]>New post in last year</option>
  </select>&nbsp;<input src="{imagefolder}/go.gif" type="image" border=0></td>
 </tr></form>
</table>
$footer
</body>
</html>