<FORM ACTION="modcp.php" METHOD="GET">
 <SELECT NAME="action">
  <option value="-1" selected>Other Options:</option>
  <option value="thread_close">Close/Open</option>
  <option value="thread_edit">Edit</option>
  <option value="thread_del">Delete</option>
 </SELECT>
 <input src="{imagefolder}/go.gif" type="image" border=0>
 <INPUT TYPE="HIDDEN" NAME="threadid" VALUE="$threadid">
 <INPUT TYPE="HIDDEN" NAME="sid" VALUE="$session[hash]">
</FORM>