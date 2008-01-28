<tr align="center">
  <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/$foldericon.gif" border=0></td>
  <td id="tableb" bgcolor="{tablecolorb}">$threadicon</td>
  <td id="tablea" bgcolor="{tablecolora}" width="80%" align="left">$firstnew<normalfont><a href="thread.php?threadid=$threads[threadid]&sid=$session[hash]">$prefix$threads[topic]</a></font>$multipages<br><smallfont><b><a href="addreply.php?threadid=$threads[threadid]&sid=$session[hash]">Reply</a> <a href="usercp.php?action=removesubscription&threadid=$threads[threadid]&sid=$session[hash]">Remove</a></b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}"><normalfont><a href="javascript:who($threads[threadid])">$threads[replycount]</a></font></td>
  <td id="tablea" bgcolor="{tablecolora}" width="20%"><normalfont>$threads[starter]</font></td>
  <td id="tableb" bgcolor="{tablecolorb}"><normalfont>$threads[views]</font></td>
  <td id="tablea" bgcolor="{tablecolora}">$threadrating</td>
  <td id="tableb" bgcolor="{tablecolorb}" align="left"><table cellpadding="0" cellspacing="0" border="0" width="100%">
   <tr align="right">
    <td align="right" nowrap><smallfont>$lastpostdate <font color="{timecolor}">$lastposttime</font><br>
    by $threads[lastposter]</font></td>
    <td><smallfont>&nbsp;<a href="thread.php?goto=lastpost&threadid=$threads[threadid]&sid=$session[hash]"><img src="{imagefolder}/lastpost.gif" alt="Go to last post" border=0></a></font></td>
   </tr>
  </table></td>
 </tr>
