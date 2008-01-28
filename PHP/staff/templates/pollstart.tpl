{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Add Poll</title>
$headinclude

</head>

<body id="bg">
<table width="100%" cellpadding=0 cellspacing=1 align="center" border=0 bgcolor="{tableoutbordercolor}">
 <tr><td bgcolor="{mainbgcolor}" align="center">&nbsp;<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle"><form action="pollstart.php" method="post" name="pform">
   <td colspan=2><normalfont color="{fontcolorsecond}"><B>Add Poll</B></font></td>
  </tr>
  <tr bgcolor="{tablecolorb}" id="tableb">
   <td><normalfont><b>Question:</b></font></td>
   <td><input type="text" name="question" value="$question" class="input" size=50 maxlength=100></td>
  </tr>
  <tr bgcolor="{tablecolora}" id="tablea">
   <td align="center"><a href="javascript:ShiftToTop();"><img src="{imagefolder}/polledit_uptop.gif" border=0 alt="Move to first"></a><br><br>
   <a href="javascript:ShiftUp();"><img src="{imagefolder}/polledit_up.gif" border=0 alt="Move up"><br><br>
   <a href="javascript:ShiftDown();"><img src="{imagefolder}/polledit_down.gif" border=0 alt="Move down"><br><br>
   <a href="javascript:ShiftToBottom();"><img src="{imagefolder}/polledit_downbottom.gif" border=0 alt="Move to last"></td>
   <td><select name="optionlist" size="20" style="width:500px" onchange='setindex()'>

   </select></td>
  </tr>
  <tr bgcolor="{tablecolorb}" id="tableb">
   <td><normalfont><b>Options:</b></font></td>
   <td><input type="text" name="option" value="" class="input" maxlength=100> <input type="button" value="delete" class="Input" onClick="DeleteEntry()"> <input type="button" value="Add" class="input" onClick="AddEntry()"> <input type="button" value="Save" class="input" onClick="SaveEntry()"></td>
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
  <input type="hidden" name="polloptions" value="">
  <input type="hidden" name="send" value="send">
  <input type="hidden" name="sid" value="$session[hash]">
  <input class="input" type="button" accesskey="S" value="Add Poll" onclick="FormSubmit();">
  <input class="input" type="button" accesskey="C" value="Close Window" onclick="self.close();">
 </p></form>
</td></tr></table>
</body>

<script language="javascript">
<!--
 if(!opener) self.close();
 var optionlist = document.pform.optionlist;
 var option = document.pform.option;
 var maxpolloptions = $maxpolloptions;
 var pform = document.pform;

 function trim(string) {
  string = string.replace(/^\s*/,"");
  string = string.replace(/\s*$/,"");
  return string;
 }

 function AddEntry() {
  optionvalue = trim(option.value);
  if(optionvalue!="") {
   count=optionlist.length;
   if(count>=maxpolloptions) alert('You are only allowed to have a maximum of '+maxpolloptions+' options.');
   else {
    newoption = new Option(optionvalue);
    optionlist.options[count] = newoption;
    option.value="";
    optionlist.selectedIndex=-1;
    option.focus();
   }
  }
 }

 function setindex() {
  index=optionlist.selectedIndex;
  if(index!=-1) option.value = optionlist.options[index].text;
 }

 function DeleteEntry() {
  index=optionlist.selectedIndex;
  if(index!=-1) {
   optionlist.options[index] = null;
   option.value="";
   option.focus();
  }
 }

 function SaveEntry() {
  index=optionlist.selectedIndex;
  optionvalue = trim(option.value);
  if(index!=-1) {
   if(optionvalue!="") {
    optionlist.options[index].text = optionvalue;
    option.value="";
    optionlist.selectedIndex=-1;
    option.focus();
   }
  }
  else AddEntry();
 }

 function ShiftUp() {
  index=optionlist.selectedIndex;
  if(index!=-1 && index!=0) {
   temp = optionlist.options[index-1].text;
   optionlist.options[index-1].text = optionlist.options[index].text;
   optionlist.options[index].text = temp;
   optionlist.selectedIndex = index-1;
  }
 }

 function ShiftDown() {
  index=optionlist.selectedIndex;
  count=optionlist.length;
  if(index!=-1 && index!=count-1) {
   temp = optionlist.options[index+1].text;
   optionlist.options[index+1].text = optionlist.options[index].text;
   optionlist.options[index].text = temp;
   optionlist.selectedIndex = index+1;
  }
 }

 function ShiftToTop() {
  doindex=optionlist.selectedIndex;
  if(doindex!=-1 && doindex!=0) {
   for(i=0;i<doindex;i++) {
    ShiftUp();
   }
  }
 }

 function ShiftToBottom() {
  doindex=optionlist.selectedIndex;
  docount=optionlist.length;
  if(doindex!=-1 && doindex!=docount-1) {
   for(i=0;i<(docount-1-doindex);i++) ShiftDown();
  }
 }

 function FormSubmit() {
  if(opener.document) {
   pform.question.value=trim(pform.question.value);
   if(pform.question.value=="" || pform.choicecount.value=="") alert('You must fill out all the fields.');
   else if(optionlist.length<2) alert('You have not created enough options. You need to create at least 2 options.');
   else if(optionlist.length<parseInt(pform.choicecount.value)) alert('You have created less options than the number a user can select');
   else {
    for(i=0;i<optionlist.length;i++) {
     text = optionlist.options[i].text;
     pform.polloptions.value+=text+'\\n';
    }
    pform.submit();
   }
  }
 }

//-->
</script>

</html>
