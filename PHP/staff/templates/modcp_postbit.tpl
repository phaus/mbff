<tr bgcolor="$tdbgcolor" id="$tdid"> 
 <td width="175" valign="top">
  <smallfont>Delete post?<br>
  <input type="checkbox" name="postids[]" value="$row[postid]"> Yes
  </font><br><img src="{imagefolder}/spacer.gif" width="159" height="1">
 </td>
 <td valign="top" width="100%">
  <smallfont>Posted by: <b>$row[username]</b> on $postdate at <font color="{timecolor}">$posttime</font></font>
  <p><normalfont>$row[message]</font></p>
 </td>
</tr>