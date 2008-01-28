<table cellpadding=4 cellspacing=1 border=0 width="100%">
 <tr bgcolor="$tdbgcolor" id="$tdid">
  <td colspan=2><img src="{imagefolder}/$foldericon.gif" border=0><normalfont> <b>Thread: </b><b><a href="thread.php?threadid=$posts[threadid]&sid=$session[hash]">$posts[topic]</a></b></font></td>
 </tr>
 <tr bgcolor="$tdbgcolor" id="$tdid">
  <td width="175" valign="top" nowrap><a name="post$posts[postid]">
   <table width="100%" cellpadding=4 cellspacing=0 border=0>
    <tr>
     <td width="100%"><normalfont><b>$posts[username]</b></font>
      <p><table>
       <tr>
        <td><smallfont>Replies:</font></td>
        <td><smallfont>$posts[replycount]</font></td>
       </tr>
       <tr>
        <td><smallfont>Views:</font></td>
        <td><smallfont>$posts[views]</font></td>
       </tr>
      </table></p>
     </td>
    </tr>
   </table>
  </td>
  <td valign="top" width="100%">
   <table width="100%" cellpadding=4 cellspacing=0 border=0>
    <tr>
     <td width="100%">
      <table cellpadding=0 cellspacing=0 border=0 width="100%">
       <tr>
        <td>$posticon <smallfont><b><a href="thread.php?postid=$posts[postid]&sid=$session[hash]#$posts[postid]">$posts[posttopic]</a></b></font> <smallfont>$postsign $postdate <font color="{timecolor}">$posttime</font></font></td>
        <td align="right"><smallfont>Forum: <b><a href="board.php?boardid=$posts[boardid]&sid=$session[hash]">$posts[title]</a></b></font></td>
       </tr>
      </table><hr size=1 color="{tableinbordercolor}">
      <p><normalfont>$posts[message]</font></p>
     </td>
    </tr>
   </table>
  </td>
 </tr>
</table>
