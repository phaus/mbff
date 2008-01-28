<tr>
       <td id="tablea" bgcolor="{tablecolora}">$user_online</td>
       <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="profile.php?userid=$row[userid]&sid=$session[hash]">$row[username]</a></font></td>
       <td id="tablea" bgcolor="{tablecolora}"><normalfont><a href="pms.php?action=newpm&userid=$row[userid]&sid=$session[hash]">PM</a></font></td>
       <td id="tableb" bgcolor="{tablecolorb}"><normalfont><a href="usercp.php?action=buddy&remove=$row[userid]&sid=$session[hash]">X</a></font></td>
      </tr>
      