{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Error</title>
$headinclude
</head>

<body id="bg">
 $header
 </table>
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Error</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
 <table border=0 cellpadding=4 cellspacing=1 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
   <td><normalfont color="{fontcolorsecond}"><B>Error</B></font></td>
  </tr>
  <tr id="tablea" bgcolor="{tablecolora}">
   <td><normalfont>The forums are currently offline for the following reason(s):
    <p>$offlinemessage</p>Please come again later.
    </font></td>
  </tr>
 </table> 
 $footer
</body>
</html>