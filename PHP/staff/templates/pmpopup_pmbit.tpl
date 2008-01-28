<tr>
 <td id="tableb" bgcolor="{tablecolorb}">$icon</td>
 <td id="tablea" bgcolor="{tablecolora}" width="60%"><normalfont><a href="javascript:toOpener('pms.php?action=viewpm&pmid=$row[privatemessageid]&sid=$session[hash]');">$row[subject]</a></font></td>
 <td id="tableb" bgcolor="{tablecolorb}" width="20%" align="center" nowrap=nowrap><normalfont><a href="javascript:toOpener('profile.php?userid=$row[userid]&sid=$session[hash]');">$row[username]</a></font></td>
 <td id="tablea" bgcolor="{tablecolora}" width="20%" align="center" nowrap=nowrap><normalfont>$senddate <font color="{timecolor}">$sendtime</font></font></td>
</tr>