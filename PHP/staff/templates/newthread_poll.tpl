<tr bgcolor="{tablecolora}" id="tablea">
  <td valign="top"><normalfont>Poll:</font></td>
  <td><input type="text" size=30 maxlength=100 name="pollquestion" value="$pollquestion" class="input" readonly> <input type="button" name="pollbutton" value="add..." class="input" onclick='window.open("pollstart.php?sid=$session[hash]&pollid="+document.bbform.poll_id.value, "moo", "toolbar=no,scrollbars=yes,resizable=yes,width=700,height=550");'>
  <input type="hidden" name="poll_id" value="$poll_id">
  <script language="javascript">
   <!--
    if(document.bbform.poll_id.value!="") {
     document.bbform.pollbutton.value = '---';
     document.bbform.pollbutton.disabled = true;
    }
   //-->
  </script>
  </td>
 </tr>