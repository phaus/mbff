<tr>
 <td id="tableb" bgcolor="{tablecolorb}" align="center"><img src="{imagefolder}/$onoff.gif" border=0></td>
 <td id="tablea" bgcolor="{tablecolora}" width="80%"><normalfont><a href="board.php?boardid=$boards[boardid]&sid=$session[hash]"><b>$boards[title]</b></a></font><smallfont>$boards[description]<br><b><a href="newthread.php?boardid=$boards[boardid]&sid=$session[hash]">New Thread</a> <a href="usercp.php?action=removesubscription&boardid=$boards[boardid]&sid=$session[hash]">Remove</a></b></font></td>
 <td id="tableb" bgcolor="{tablecolorb}" align="center" nowrap><normalfont>$boards[postcount]</font></td>
 <td id="tablea" bgcolor="{tablecolora}" align="center" nowrap><normalfont>$boards[threadcount]</font></td>
 <td id="tableb" bgcolor="{tablecolorb}" nowrap>$lastpost</td>
</tr>