<form action="editpost.php" method="post">
<input type="hidden" name="send" value="send2">
<input type="hidden" name="postid" value="$postid">
<input type="hidden" name="sid" value="$session[hash]">
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=3><normalfont color="{fontcolorsecond}"><b>Delete Post</b></font></td>
 </tr>
 <tr>
  <td bgcolor="{tablecolorb}" id="tableb"><normalfont><input type="checkbox" name="deletepost" value="1"> <b>Delete Post?</b></font></td>
  <td bgcolor="{tablecolora}" id="tablea"><normalfont>To delete this post, check the box on the left and press "Delete Post".</font></td>
  <td bgcolor="{tablecolorb}" id="tableb"><input type="submit" value="Delete Post" class="input"></td>
 </tr></form>
</table><br>