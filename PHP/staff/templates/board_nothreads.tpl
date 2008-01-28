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
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont color="{fontcolorsecond}">$moderators</font></td>
    <td align="right" valign="top"><smallfont color="{fontcolorsecond}"><a href="usercp.php?action=addsubscription&boardid=$boardid&sid=$session[hash]">Add Forum to Favorites</a></font></td>
   </tr>
  </table></td>
 </tr>
</table>
$subboards
<table width="{tableinwidth}">
 <tr>
  <td><smallfont>$useronline&nbsp;</font></td>
  <td align="right" valign="bottom">$newthread</td>
 </tr>
</table>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecolora}" id="tablea"><form method=get action="board.php" name="dform">
  <td colspan=8 align="center"><normalfont>No threads from <select name="daysprune" onchange="document.dform.submit();">
   <option value="1500" $d_select[1500]>your last visit</option>
   <option value="1" $d_select[1]>the last 24 hours</option>
   <option value="2" $d_select[2]>the last 2 days</option>
   <option value="5" $d_select[5]>the last 5 days</option>
   <option value="10" $d_select[10]>the last 10 days</option>
   <option value="20" $d_select[20]>the last 20 days</option>
   <option value="30" $d_select[30]>the last 30 days</option>
   <option value="45" $d_select[45]>the last 45 days</option>
   <option value="60" $d_select[60]>the last 60 days</option>
   <option value="75" $d_select[75]>the last 75 days</option>
   <option value="100" $d_select[100]>the last 100 days</option>
   <option value="365" $d_select[365]>the last year</option>
   <option value="1000" $d_select[1000]>the beginning</option>
  </select> are available.</font></td>
 </tr>
 <input type="hidden" name="boardid" value="$boardid">
 <input type="hidden" name="sid" value="$session[hash]">
 </form>
</table>
<table width="{tableinwidth}">
 <tr>
  <form action="search.php" method="post">
  <input type="hidden" name="sid" value="$session[hash]">
  <input type="hidden" name="topiconly" value="0">
  <input type="hidden" name="showposts" value="0">
  <input type="hidden" name="beforeafter" value="after">
  <input type="hidden" name="searchdate" value="0">
  <input type="hidden" name="sortorder" value="desc">
  <input type="hidden" name="sortby" value="lastpost">
  <input type="hidden" name="send" value="send">
  <input type="hidden" name="boardids[]" value="$boardid">
  <td valign="top"><smallfont><b>Forum Search:<br><input class="input" type="text" name="searchstring" value=""> <input src="{imagefolder}/go.gif" type="image" border=0 align="absmiddle"></b></font></td>
  </form>
  <td valign="top" align="right">$newthread</td>
 </tr>
 <tr>
  <td align="right">$boardjump</td>
 </tr>
</table>
$footer
</body>
</html>

