<tr bgcolor="$rowcolor" id="$rowid">
  <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/$foldericon.gif" border=0></td>
  <td id="tableb" bgcolor="{tablecolorb}">$threadicon</td>
  <td id="tablea" bgcolor="{tablecolora}" width="80%">$firstnew<normalfont>$prefix<a href="thread.php?threadid=$threads[threadid]&sid=$session[hash]">$threads[topic]</a></font>$multipages<br><smallfont>Forum: <b><a href="board.php?boardid=$threads[boardid]&sid=$session[hash]">$threads[title]</a></b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" align="center"><normalfont><a href="javascript:who($threads[threadid])">$threads[replycount]</a></font></td>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="20%"><normalfont>$threads[starter]</font></td>
  <td id="tableb" bgcolor="{tablecolorb}" align="center"><normalfont>$threads[views]</font></td>
  <td id="tablea" bgcolor="{tablecolora}" align="center">$threadrating</td>
  <td id="tableb" bgcolor="{tablecolorb}"><table cellpadding="0" cellspacing="0" border="0" width="100%">
   <tr align="right">
    <td align="right" nowrap><smallfont>$lastpostdate <font color="{timecolor}">$lastposttime</font><br>
    by $threads[lastposter]</font></td>
    <td><smallfont>&nbsp;<a href="thread.php?goto=lastpost&threadid=$threads[threadid]&sid=$session[hash]"><img src="{imagefolder}/lastpost.gif" alt="Go to last post" border=0></a></font></td>
   </tr>
  </table></td>
 </tr>
