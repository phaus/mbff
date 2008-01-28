<tr id="tableb" bgcolor="{tablecolorb}">
 <td width="50%" valign="top"><normalfont><b>Use Custom Avatar?</b></font><br><smallfont>Custom avatars can have a maximum size of $wbbuserdata[maxavatarwidth]*$wbbuserdata[maxavatarheight] pixels and $wbbuserdata[maxavatarsize] bytes.</font></td>
 <td width="50%"><normalfont><INPUT TYPE="RADIO" NAME="avatarid" VALUE="useown"$ownavatar_checked> Yes</font><br>$ownavatar</td>
</tr>
<tr id="tablea" bgcolor="{tablecolora}">
 <td width="50%"><normalfont><b>Upload Avatar:</b></font></td>
 <td width="50%">$havatar<input type="hidden" name="MAX_FILE_SIZE" value="$wbbuserdata[maxavatarsize]"><input name="avatar_file" type="file" class="input" size=35></td>
</tr>
                     
                        