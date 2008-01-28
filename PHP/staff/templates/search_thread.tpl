{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Search Results</title>
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
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="search.php?sid=$session[hash]">Search</a> » Search Results</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td><smallfont>Showing threads $l_threads to $h_threads of $threadcount results</font></td>
  <td align="right" valign="bottom"><smallfont>$pagelink</font></td>
 </tr>
</table>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center" colspan=3><smallfont color="{fontcolorsecond}"><b>Thread</b></font></td>
  <td align="center" nowrap><smallfont color="{fontcolorsecond}"><b>Replies</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Author</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Views</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Rating</b></font></td>
  <td align="center" nowrap><smallfont color="{fontcolorsecond}"><b>Last Post</b></font></td>
 </tr>
 $threadbit
 </table>
<table width="{tableinwidth}">
 <tr>
  <td><smallfont>Showing threads $l_threads to $h_threads of $threadcount results</font></td>
  <td align="right" valign="bottom"><smallfont>$pagelink</font></td>
 </tr>
</table><br>
$footer
</body>
</html>		