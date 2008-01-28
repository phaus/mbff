{!DOCTYPE}
<html>
<head>
<title>$master_board_name - $board[title]</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><smallfont>&nbsp;</font></td>
  <td width="80%"><smallfont color="{fontcolorsecond}"><b>Forum</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Posts</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Threads</b></font></td>
  <td align="center" nowrap><smallfont color="{fontcolorsecond}"><b>Last Post</b></font></td>
  <td width="20%" align="center"><smallfont color="{fontcolorsecond}"><b>Moderators</b></font></td>
 </tr>
 $boardbit
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="right">$boardjump</td>
 </tr>
</table><br>
<table align="center">
 <tr>
  <td><img src="{imagefolder}/on.gif" border=0></td>
  <td><smallfont>New posts&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
  <td><img src="{imagefolder}/off.gif" border=0></td>
  <td><smallfont>No new posts&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
  <td><img src="{imagefolder}/offclosed.gif" border=0></td>
  <td><smallfont>Forum is closed</font></td>
 </tr>
</table>
$footer
</body>
</html>  