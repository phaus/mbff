{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - $pm[subject]</title>
  $headinclude
 
 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » <a href="pms.php?folderid=$pm[folderid]&sid=$session[hash]">Private Messages: $pm[title]</a> » $pm[subject]</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="center"><a href="pms.php?action=newpm&sid=$session[hash]"><img src="{imagefolder}/newpm.gif" border=0 alt="Compose New Message"></a> <a href="pms.php?action=replypm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/replypm.gif" border=0 alt="Reply to Message"></a> <a href="pms.php?action=forwardpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/forwardpm.gif" border=0 alt="Forward Message"></a> <a href="pms.php?action=downloadpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/downloadpm.gif" border=0 alt="Download as a Text File"></a> <a href="pms.php?action=printpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/printpm.gif" border=0 alt="View Printable Version"></a> <a href="pms.php?action=deletepm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/deletepm.gif" border=0 alt="Delete Message"></a></td>
 </tr>
</table>
<table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><normalfont color="{fontcolorsecond}"><b>Message from $pm[username], on $senddate at $sendtime</b></font></td>
 </tr>
 <tr id="tablea" bgcolor="{tablecolora}">
  <td><normalfont>
  $icon <b>$pm[subject]</b></font>
  <p><normalfont>
  $pm[message]
  </font></p>
  $signature
  </td>
 </tr>
</table>
<table width="{tableinwidth}">
 <tr>
  <td align="center"><a href="pms.php?action=newpm&sid=$session[hash]"><img src="{imagefolder}/newpm.gif" border=0 alt="Compose New Message"></a> <a href="pms.php?action=replypm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/replypm.gif" border=0 alt="Reply to Message"></a> <a href="pms.php?action=forwardpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/forwardpm.gif" border=0 alt="Forward Message"></a> <a href="pms.php?action=downloadpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/downloadpm.gif" border=0 alt="Download as a Text File"></a> <a href="pms.php?action=printpm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/printpm.gif" border=0 alt="View Printable Version"></a> <a href="pms.php?action=deletepm&pmid=$pmid&sid=$session[hash]"><img src="{imagefolder}/deletepm.gif" border=0 alt="Delete Message"></a></td>
 </tr>
</table>
$footer
</body>
</html>