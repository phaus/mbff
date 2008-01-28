<tr>
 <td id="tableb" bgcolor="{tablecolorb}">$icon</td>
 <td id="tablea" bgcolor="{tablecolora}" width="60%"><normalfont><a href="pms.php?action=viewpm&pmid=$row[privatemessageid]&sid=$session[hash]&outbox=1">$row[subject]</a></font></td>
 <td id="tableb" bgcolor="{tablecolorb}" width="20%" align="center"><normalfont><a href="profile.php?userid=$row[userid]&sid=$session[hash]">$row[username]</a></font></td>
 <td id="tablea" bgcolor="{tablecolora}" width="20%" align="center" nowrap><normalfont>$senddate <font color="{timecolor}">$sendtime</font></font></td>
 <td id="tableb" bgcolor="{tablecolorb}"><input type="checkbox" name="pmid[]" value="$row[privatemessageid]"></td>
</tr>