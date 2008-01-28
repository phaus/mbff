{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Edit Poll</title>
$headinclude

</head>

<body id="bg">
 $header
 </table>
 <table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <form action="polledit.php" method="post">
 <input type="hidden" name="action" value="polldelete">
 <input type="hidden" name="pollid" value="$pollid">
 <input type="hidden" name="sid" value="$session[hash]">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
   <td colspan=3><normalfont color="{fontcolorsecond}"><b>Delete Poll</b></font></td>
  </tr>
  <tr>
   <td bgcolor="{tablecolorb}" id="tableb"><normalfont><input type="checkbox" name="deletepoll" value="1"> <b>Delete poll?</b></font></td>
   <td bgcolor="{tablecolora}" id="tablea"><normalfont>To delete this poll, check the box on the left and press "Delete Poll".</font></td>
   <td bgcolor="{tablecolorb}" id="tableb"><input type="submit" value="Delete Poll" class="input"></td>
  </tr></form>
 </table><br>
 <table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="polledit.php" method="post" name="pform">
   <td colspan=2><normalfont color="{fontcolorsecond}"><B>Edit Poll</B></font></td>
  </tr>
  <tr bgcolor="{tablecolorb}" id="tableb">
   <td><normalfont><b>Question:</b></font></td>
   <td><input type="text" name="question" value="$question" class="input" size=50 maxlength=100></td>
  </tr>
  <tr bgcolor="{tablecolora}" id="tablea">
   <td align="center"><a href="javascript:FormSubmit('ShiftToTop');"><img src="{imagefolder}/polledit_uptop.gif" border=0 alt="Move to First"></a><br><br>
   <a href="javascript:FormSubmit('ShiftUp');"><img src="{imagefolder}/polledit_up.gif" border=0 alt="Move Up"><br><br>
   <a href="javascript:FormSubmit('ShiftDown');"><img src="{imagefolder}/polledit_down.gif" border=0 alt="Move Down"><br><br>
   <a href="javascript:FormSubmit('ShiftToBottom');"><img src="{imagefolder}/polledit_downbottom.gif" border=0 alt="Move to Last"></td>
   <td><select name="optionlist" size="20" style="width:500px" onchange='setindex()'>
      $polloptions
   </select></td>
  </tr>
  <tr bgcolor="{tablecolorb}" id="tableb">
   <td><normalfont><b>Answer:</b></font></td>
   <td><input type="text" name="option" value="" class="input" maxlength=100> <input type="button" value="Delete" class="input" onClick="FormSubmit('delentry')"> <input type="button" value="Add" class="input" onClick="AddEntry()"> <input type="button" value="Save" class="input" onClick="SaveEntry()"></td>
  </tr>
  <tr bgcolor="{tablecolora}" id="tablea">
   <td><normalfont><b>Multiple Answers:</b></font></td>
   <td><input type="text" name="choicecount" value="$choicecount" class="input" size=10 maxlength=2><smallfont> (Enter the maximum number of answers a user can select when voting.)</font></td>
  </tr>
  <tr bgcolor="{tablecolorb}" id="tableb">
   <td><normalfont><b>Time Out:</b></font></td>
   <td><input type="text" name="timeout" value="$timeout" class="input" size=10 maxlength=7><smallfont> (Enter the number of days the poll should last. 0 means forever.)</font></td>
  </tr>
 </table>
 <p align="center">
  <input type="hidden" name="action" value="">
  <input type="hidden" name="pollid" value="$pollid">
  <input type="hidden" name="send" value="send">
  <input type="hidden" name="sid" value="$session[hash]">
  <input class="input" type="button" accesskey="S" value="Save Poll" onclick="verifyPoll();"></form>
 </p>
$footer
</body>
<script language="javascript">
<!--
 var polloptionid = document.pform.polloptionid;
 var option = document.pform.option;
 var maxpolloptions = $maxpolloptions;

 function trim(string) {
  string = string.replace(/^\s*/,"");
  string = string.replace(/\s*$/,"");
  return string;
 }

 function setindex() {
  index=polloptionid.selectedIndex;
  if(index!=-1) option.value = polloptionid.options[index].text;
 }

 function FormSubmit(actionval) {
  document.pform.action.value=actionval;
  document.pform.submit();
 }

 function AddEntry() {
  option.value = trim(option.value);
  if(option.value!="") {
   count=polloptionid.length;
   if(count>=maxpolloptions) alert('You are only allowed to have a maximum of '+maxpolloptions+' options.');
   else FormSubmit('addentry');
  }
 }

 function SaveEntry() {
  index=polloptionid.selectedIndex;
  if(index!=-1) {
   option.value = trim(option.value);
   if(option.value!="") FormSubmit('saveentry');
  }
  else AddEntry();
 }

 function verifyPoll() {
  pform.question.value=trim(pform.question.value);
  if(pform.question.value=="" || pform.choicecount.value=="") alert('You must fill out all the fields.');
  else if(polloptionid.length<2) alert('You did not created enough options.');
  else if(polloptionid.length<parseInt(pform.choicecount.value)) alert('You have created less options than the number a user can select.');
  else FormSubmit('savepoll');
 }

//-->
</script>
</html>
