{!DOCTYPE}
<html>
<head>
<title>$master_board_name - $board[title]</title>
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
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center" colspan=3><smallfont color="{fontcolorsecond}"><b>Thread</b></font></td>
  <td align="center" nowrap><smallfont color="{fontcolorsecond}"><b>Replies</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Author</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Views</b></font></td>
  <td align="center"><smallfont color="{fontcolorsecond}"><b>Rating</b></font></td>
  <td align="center" nowrap><smallfont color="{fontcolorsecond}"><b>Last Post</b></font></td>
 </tr>
 $threadbit
 <tr bgcolor="{tablecolorb}" id="tableb">
  <td colspan=8 align="center">
   <form method="get" action="board.php">
   <input type="hidden" name="page" value="$page">
   <input type="hidden" name="boardid" value="$boardid">
   <input type="hidden" name="sid" value="$session[hash]">
   <normalfont>Showing threads $l_threads to $h_threads of $threadcount, sort by
        <select name="sortfield">
                <option value="topic" $f_select[topic]>thread subject</option>
                <option value="starttime" $f_select[starttime]>start time</option>
                <option value="replycount" $f_select[replycount]>number of replies</option>
                <option value="starter" $f_select[starter]>thread starter</option>
                <option value="views" $f_select[views]>number of views</option>
                <option value="vote" $f_select[vote]>thread rating</option>
                <option value="lastposttime" $f_select[lastposttime]>last post time</option>
                <option value="lastposter" $f_select[lastposter]>last post author</option>
        </select>
        in
        <select name="sortorder">
                <option value="ASC" $o_select[ASC]>ascending</option>
                <option value="DESC" $o_select[DESC]>descending</option>
        </select>
        order,
        <select name="daysprune">
                <option value="1500" $d_select[1500]>since last visit</option>
                <option value="1" $d_select[1]>from the last day</option>
                <option value="2" $d_select[2]>from the last 2 days</option>
                <option value="5" $d_select[5]>from the last 5 days</option>
                <option value="10" $d_select[10]>from the last 10 days</option>
                <option value="20" $d_select[20]>from the last 20 days</option>
                <option value="30" $d_select[30]>from the last 30 days</option>
                <option value="45" $d_select[45]>from the last 45 days</option>
                <option value="60" $d_select[60]>from the last 60 days</option>
                <option value="75" $d_select[75]>from the last 75 days</option>
                <option value="100" $d_select[100]>from the last 100 days</option>
                <option value="365" $d_select[365]>from the last year</option>
                <option value="1000" $d_select[1000]>from the beginning</option>
        </select>
        <input src="{imagefolder}/go.gif" type="image" border=0></font></td>
 </tr></form>
</table>
<table width="{tableinwidth}">
 <tr>
  <td valign="top"><smallfont>$pagelink</font></td>
  <td align="right" valign="top">$newthread</td>
 </tr>
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
  <td valign="top" align="right">$boardjump</td>
 </tr>
 </table>
<table align="center">
 <tr>
  <td><smallfont><img src="{imagefolder}/newfolder.gif">&nbsp;<b>New posts</b></font></td>
  <td><smallfont>(&nbsp;<img src="{imagefolder}/newhotfolder.gif">&nbsp;<b>More than $board[hotthread_reply] replies or $board[hotthread_view] views</b>&nbsp;)</font></td>
  <td><smallfont><img src="{imagefolder}/lockfolder.gif">&nbsp;<b>Thread is closed/archived</b></font></td>
 </tr>
 <tr>
  <td><smallfont><img src="{imagefolder}/folder.gif">&nbsp;<b>No new posts</b></font></td>
  <td><smallfont>(&nbsp;<img src="{imagefolder}/hotfolder.gif">&nbsp;<b>More than $board[hotthread_reply] replies or $board[hotthread_view] views</b>&nbsp;)</font></td>
  <td>&nbsp;</td>
 </tr>
</table>
$footer
</body>
</html>
