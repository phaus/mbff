{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Main Page</title>
$headinclude
</head>

<body id="bg">
 $header
 $welcome
</table>
<br />
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 $index_pms
 $index_stats
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="right"><smallfont><a href="search.php?action=24h&sid=$session[hash]">Active Threads from the Last 24h</a> | <a href="markread.php?sid=$session[hash]">Mark All Forums as Read</a></font></td>
 </tr>
</table>
<br />
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
<br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 $index_useronline
</table>
$quicklogin
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
