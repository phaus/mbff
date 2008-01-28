<script language="JavaScript">
<!--
function boardjump() {
if(document.jumpform.boardid.options[document.jumpform.boardid.selectedIndex].value != -1) document.jumpform.submit();
}
//-->
</script>
<FORM ACTION="board.php" METHOD="GET" name="jumpform">
<smallfont><b>Go to: </b></font><SELECT NAME="boardid" onChange="boardjump()">
  <option value="-1">Please choose:</option>
  <option value="-1">--------------------</option>
   $boardoptions
  </SELECT> <input src="{imagefolder}/go.gif" type="image" border=0>
  <input type="hidden" name="sid" value="$session[hash]">
</FORM>