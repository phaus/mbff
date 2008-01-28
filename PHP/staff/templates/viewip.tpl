{!DOCTYPE}
<html>
<head>
<title>$master_board_name - IP Information</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar » <a href="thread.php?threadid=$threadid&sid=$session[hash]">$thread[topic]</a> » <a href="thread.php?sid=$session[hash]&postid=$postid#post$postid">post from $post[username]</a> » IP Information</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><normalfont color="{fontcolorsecond}"><b>IP Information</b></font></td>
 </tr>
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td><normalfont>IP address in this post:</font></td>
  <td><normalfont>$post[ipaddress] ($post[host])</font></td>
 </tr>
 $userip
</table>
$footer
</body>
</html>