<table cellpadding=4 cellspacing=1 border=0 width="100%">
 <tr bgcolor="$tdbgcolor" id="$tdid">
  <td width="175" valign="top"><a name="post$posts[postid]"></a>
   <table width="100%" cellpadding=4 cellspacing=0 border=0>
    <tr>
     <td width="100%"><normalfont><b>$posts[username]</b></font>$gender<br>
      <smallfont>$posts[ranktitle]$rankimages$useravatar<br><br>
	$posts[regdate]
	$posts[userposts]
	$userfields
	$threadstarter
	 </font>
     <br><img src="{imagefolder}/spacer.gif" width="159" height="1">
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
        <td>$posticon <smallfont><b>$posts[posttopic]</b></font></td>
        <td align="right"><a href="addreply.php?postid=$posts[postid]&action=quote&sid=$session[hash]"><img src="{imagefolder}/quote.gif" border=0 alt="Post Reply with Quote"></a> <a href="editpost.php?postid=$posts[postid]&sid=$session[hash]"><img src="{imagefolder}/editpost.gif" border=0 alt="Edit/Delete Post"></a> <a href="report.php?postid=$posts[postid]&sid=$session[hash]"><img src="{imagefolder}/report.gif" border=0 alt="Report Post to a Moderator"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="misc.php?action=viewip&postid=$posts[postid]&sid=$session[hash]"><img src="{imagefolder}/ip.gif" border=0 alt="IP Information"></a> <a href="javascript:self.scrollTo(0,0);"><img src="{imagefolder}/goup.gif" border=0 alt="Go to the top of this page"></a></td>
       </tr>
      </table><hr size=1 color="{tableinbordercolor}" noShade>
      <p><normalfont>$posts[message]</font></p>
      $signature
      $lastedit
      $invisible
     </td>
    </tr>
   </table>
  </td>
 </tr>
 <tr bgcolor="$tdbgcolor" id="$tdid">
 	<td></td>
	<td><iframe height="75" width="100%" frameborder="0" src="file_manager.php?sid=$sid&post_id=$posts[postid]"></iframe></td>
</tr>
 <tr bgcolor="$tdbgcolor" id="$tdid">
  <td width="175" align="center" nowrap><smallfont>$postsign $postdate <font color="{timecolor}">$posttime</font></font></td>
  <td width="*" valign="middle"><smallfont>$user_online $email $homepage $search $homie $pm $icq $aim $yim</font></td>
 </tr>
</table>
