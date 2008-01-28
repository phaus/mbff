{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Members List</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Members List</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle" align="center">
  <td><smallfont color="{fontcolorsecond}"><b>Username</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>Email</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>Homepage</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>PM</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>Search</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>Buddy</b></font></td>
  <td nowrap><smallfont color="{fontcolorsecond}"><b>Registration Date</b></font></td>
  <td><smallfont color="{fontcolorsecond}"><b>Posts</b></font></td>
 </tr>
 $membersbit
 <tr bgcolor="{tablecolorb}" id="tableb"><form method="get" action="memberslist.php">
  <td align="center" colspan=8><normalfont>Show <select name="letter">
   <option value="">all</option>
   $letteroptions
  </select> users and sort by <select name="sortby">
   <option value="username"$sel_sortby[username]>username</option>
   <option value="regdate"$sel_sortby[regdate]>registration date</option>
   <option value="userposts"$sel_sortby[userposts]>number of posts</option>
  </select> in <select name="order">
   <option value="ASC"$sel_order[ASC]>ascending</option>
   <option value="DESC"$sel_order[DESC]>descending</option>
  </select> order.
  <input src="{imagefolder}/go.gif" type="image" border=0>
  <input type="hidden" name="page" value="$page">
  <input type="hidden" name="sid" value="$session[hash]">
  </font></td>
 </tr></form>
</table>
<table align="center">
 <tr>
  <td><smallfont>$pagelink</font></td>
 </tr>
</table>
$footer
</body>
</html>
