{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Profile for  $user_info[username]</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Profile for  $user_info[username]</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><table width="100%" border=0 cellpadding=0 cellspacing=0>
   <tr>
    <td width="100%"><normalfont color="{fontcolorsecond}"><b>Profile for  $user_info[username]</b></font></td>
    <td width="200" align="center" nowrap><normalfont color="{fontcolorsecond}"><b>Avatar/Infotext</b></font></td>
   <tr>
  </table></td>
 </tr>
 <tr bgcolor="{tablecolora}" id="tablea">
  <td width="100%"><table width="100%">
   <tr>
    <td><normalfont><B>Registration Date:</B></font></td>
    <td><normalfont>$regdate</font></td>
   </tr>
   <tr>
    <td valign="top"><normalfont><B>Rank:</B></font></td>
    <td><normalfont>$user_info[ranktitle] $rankimages</font></td>
   </tr>
   <tr>
    <td><normalfont><B>Posts:</B></font></td>
    <td><normalfont>$user_info[userposts] ($postperday per day)</font></td>
   </tr>
   <tr>
    <td colspan=2><hr width="100%" color="{tableinbordercolor}" noShade size=1></td>
   </tr>
   <tr>
    <td><normalfont><B>ICQ Number:</B></font></td>
    <td><normalfont>$user_info[icq]</font></td>
   </tr>
   <tr>
    <td><normalfont><B>AIM Screenname:</B></font></td>
    <td><normalfont>$user_info[aim]</font></td>
   </tr>
   <tr>
    <td><normalfont><B>YIM Screenname:</B></font></td>
    <td><normalfont>$user_info[yim]</font></td>
   </tr>
   <tr>
    <td><normalfont><B>MSN Screenname:</B></font></td>
    <td><normalfont>$user_info[msn]</font></td>
   </tr>
   <tr>
    <td><normalfont><B>eMail:</B></font></td>
    <td><normalfont>$useremail</font></td>
   </tr>
   <tr>
    <td><normalfont><B>Homepage:</B></font></td>
    <td><normalfont>$userhomepage</font></td>
   </tr>
   <tr>
    <td colspan=2><hr width="100%" color="{tableinbordercolor}" noShade size=1></td>
   </tr>
   <tr>
    <td><normalfont><b>Gender:</b></font></td>
    <td><normalfont>$gender</font></td>
   </tr>
   <tr>
    <td><normalfont><b>Birthday:</b></font></td>
    <td><normalfont>$birthday</font></td>
   </tr>
   $hr
   $profilefields
  </table></td>
  <td width="200" align="center" nowrap>$useravatar<br><normalfont>$user_text</font><p>$user_online</p></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2><table width="100%" border=0 cellpadding=0 cellspacing=0>
   <tr>
    <td><normalfont color="{fontcolorsecond}"><B>Contact:</B></font>
    <td align="right">$btn_email $btn_pm $btn_search <a href="usercp.php?action=buddy&add=$user_info[userid]&sid=$session[hash]"><img src="{imagefolder}/homie.gif" border=0 alt="Add $user_info[username] to your buddy list"></a></td>
   </tr>
  </table></td>
 </tr>
</table>
$footer
</body>
</html>
