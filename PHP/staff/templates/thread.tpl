{!DOCTYPE}
<html>
<head>
<title>$master_board_name - $thread[topic]</title>
$headinclude
</head>

<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a>$navbar » </b><b>$thread[topic]</b> $threadrating</font></td>
   </tr>
  </table></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td></td>
    <td align="right" valign="top"><smallfont color="{fontcolorsecond}"><a href="print.php?threadid=$threadid&page=$page&sid=$session[hash]">Print Page</a> | <a href="formmail.php?threadid=$threadid&sid=$session[hash]">Recommend to Friend</a> | <a href="usercp.php?action=addsubscription&threadid=$threadid&sid=$session[hash]">Add Thread to Favorites</a></font></td>
   </tr>
  </table></td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td valign="bottom"><smallfont>$pagelink</font></td>
  <td align="right" valign="bottom"><smallfont>$newthread $addreply</font></td>
 </tr>
</table>$thread_poll
<table cellpadding=0 cellspacing=0 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}" align="center">
 <tr>
  <td><table cellpadding=4 cellspacing=1 border=0 width="100%">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td width="175" nowrap><smallfont color="{fontcolorsecond}"><b>Author</b></font></td>
    <td width="100%"><table cellpadding=0 cellspacing=0 border=0 width="100%">
     <tr>
      <td><smallfont color="{fontcolorsecond}"><b>Post</b></font></td>
      <td align="right"><smallfont color="{fontcolorsecond}"><b>«</b> <a href="thread.php?goto=nextoldest&threadid=$threadid&sid=$session[hash]">Previous Thread</a> | <a href="thread.php?goto=nextnewest&threadid=$threadid&sid=$session[hash]">Next Thread</a> <b>»</b></font></td>
     </tr>
    </table></td>
   </tr>
  </table>
  $postbit
  <table cellpadding=4 cellspacing=1 border=0 width="100%">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2>
     <table cellpadding=0 cellspacing=0 border=0 width="100%">
      <tr>
       <td><smallfont color="{fontcolorsecond}">$pagelink</font></td>
       <td align="right"><smallfont color="{fontcolorsecond}">&nbsp;</font></td>
      </tr>
     </table>
    </td>
   </tr>
  </table></td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td valign="top"><FORM ACTION="threadrating.php" METHOD="POST">
  <SELECT NAME="rating">
   <option value="-1" selected>Rate thread:</option>
   <option value="5">5 .. very good</option>
   <option value="4">4</option>
   <option value="3">3</option>
   <option value="2">2</option>
   <option value="1">1 .. very bad</option>
  </SELECT>
  <input src="{imagefolder}/go.gif" type="image" border=0>
  <input type="hidden" name="sid" value="$session[hash]">
  <input type="hidden" name="threadid" value="$threadid">
  </td></form>
  <td align="right" valign="top"><smallfont>$newthread $addreply</font></td>
 </tr>
 <tr>
  <td valign="top">$boardjump</td>
  <td align="right" valign="top">$modoptions</td>
 </tr>
</table>
$footer
</body>
</html>
