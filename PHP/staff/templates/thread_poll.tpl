<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td width="100%" colspan=2><form method="post" action="pollvote.php"><normalfont color="{fontcolorsecond}"><b>Poll:</b> $poll[question]</font></td>
 </tr>
 $thread_pollbit
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2 align="center"><normalfont color="{fontcolorsecond}"><input class="input" type="submit" value="Vote"> <input type="button" class="input" value="Results" onclick="window.location='thread.php?threadid=$threadid&sid=$session[hash]&page=$page&preresult=1'"></font></td>
 </tr>
 <input type="hidden" name="sid" value="$session[hash]">
 <input type="hidden" name="pollid" value="$thread[pollid]">
 </form>
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="right"><normalfont>&nbsp;$mod_poll_edit</font></td>
 </tr>
</table>



