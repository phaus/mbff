{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Search Results</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="search.php?sid=$session[hash]">Search</a> » Search Results</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td><smallfont>Showing posts $l_posts to $h_posts of $postcount results</font></td>
  <td align="right" valign="bottom"><smallfont>$pagelink</font></td>
 </tr>
</table>
<table cellpadding=0 cellspacing=0 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}" align="center">
 <tr>
  <td><table cellpadding=4 cellspacing=1 border=0 width="100%">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td width="175" nowrap><smallfont color="{fontcolorsecond}"><b>Author</b></font></td>
    <td width="100%"><smallfont color="{fontcolorsecond}"><b>Post</b></font></td>
   </tr>
  </table>
  $postbit
  </td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td><smallfont>Showing posts $l_posts to $h_posts of $postcount results</font></td>
  <td align="right" valign="bottom"><smallfont>$pagelink</font></td>
 </tr>
</table>
$footer
</body>
</html>  