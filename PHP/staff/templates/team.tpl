{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Administrators and Moderators</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Administrators and Moderators</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table align="center">
 <tr>
  <td>
   <table border=0 bgcolor="{tableinbordercolor}" cellpadding=4 cellspacing=1 width="100%">
    <tr bgcolor="{tabletitlecolor}" id="tabletitle">
     <td colspan=4><normalfont color="{fontcolorsecond}"><b>$master_board_name Administrators</b></font></td>
    </tr>
    <tr bgcolor="{tablecolora}" id="tablea">
     <td colspan=2><smallfont>Username</font></td>
     <td colspan=2><smallfont>Location</font></td>
    </tr>
    $adminbits
   </table>
   <br><br>
   <table border=0 bgcolor="{tableinbordercolor}" cellpadding=4 cellspacing=1 width="100%">
    <tr bgcolor="{tabletitlecolor}" id="tabletitle">
     <td colspan=4><normalfont color="{fontcolorsecond}"><b>$master_board_name Super Moderators</b></font></td>
    </tr>
    <tr bgcolor="{tablecolora}" id="tablea">
     <td colspan=2><smallfont>Username</font></td>
     <td colspan=2><smallfont>Location</font></td>
    </tr>
    $supermodbits
   </table>
   <br><br>
   <table border=0 bgcolor="{tableinbordercolor}" cellpadding=4 cellspacing=1 width="100%">
    <tr bgcolor="{tabletitlecolor}" id="tabletitle">
     <td colspan=5><normalfont color="{fontcolorsecond}"><b>$master_board_name Moderators</b></font></td>
    </tr>
    <tr bgcolor="{tablecolora}" id="tablea">
     <td colspan=2><smallfont>Username</font></td>
     <td><smallfont>Forum</font></td>
     <td colspan=2><smallfont>Location</font></td>
    </tr>
    $moderatorbits
   </table>
  </td>
 </tr>
</table>
<p align="center">$boardjump</p> 
$footer
</body>
</html>   