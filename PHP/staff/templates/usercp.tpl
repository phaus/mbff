{!DOCTYPE}
<html>
<head>
<title>$master_board_name - User CP of $wbbuserdata[username]</title>
$headinclude
</head>
<body id="bg">
$header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » User CP of $wbbuserdata[username]</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=3><normalfont color="{fontcolorsecond}"><b>Menu</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="33%">
   <a href="usercp.php?action=profile_edit&sid=$session[hash]"><img src="{imagefolder}/usercp_profile_edit.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=profile_edit&sid=$session[hash]">Edit Profile</a></b></font><br>
   <smallfont>Here you can edit your information.</font></td>
  <td id="tableb" bgcolor="{tablecolorb}" align="center" width="33%">
   <a href="usercp.php?action=signature_edit&sid=$session[hash]"><img src="{imagefolder}/usercp_signature_edit.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=signature_edit&sid=$session[hash]">Edit Signature</a></b></font><br>
   <smallfont>Here you can edit your signature.</font></td>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="33%">
   <a href="usercp.php?action=options_change&sid=$session[hash]"><img src="{imagefolder}/usercp_options_change.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=options_change&sid=$session[hash]">Edit Options</a></b></font><br>
   <smallfont>Here you can edit your settings, which make it easier for you to use the forums.</font></td>
 </tr>
 <tr>
  <td id="tableb" bgcolor="{tablecolorb}" align="center" width="33%">
   <a href="usercp.php?action=password_change&sid=$session[hash]"><img src="{imagefolder}/usercp_password_change.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=password_change&sid=$session[hash]">Change Password</a></b></font><br>
   <smallfont>Here you can change your password.</font></td>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="33%">
   <a href="usercp.php?action=buddy_list&sid=$session[hash]"><img src="{imagefolder}/usercp_buddy_list.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=buddy_list&sid=$session[hash]">Buddy List</a></b></font><br>
   <smallfont>Here you can edit your buddy list.</font></td>
  <td id="tableb" bgcolor="{tablecolorb}" align="center" width="33%">
   <a href="usercp.php?action=ignore_list&sid=$session[hash]"><img src="{imagefolder}/usercp_ignore_list.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=ignore_list&sid=$session[hash]">Ignore List</a></b></font><br>
   <smallfont>Here you can edit your ignore list.</font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="33%">
   <a href="usercp.php?action=favorites&sid=$session[hash]"><img src="{imagefolder}/usercp_favorites.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=favorites&sid=$session[hash]">Favorites</a></b></font><br>
   <smallfont>Here you can see the threads and posts you are subscribed to.</font></td>
  <td id="tableb" bgcolor="{tablecolorb}" align="center" width="33%">
   <a href="usercp.php?action=avatars&sid=$session[hash]"><img src="{imagefolder}/usercp_avatars.gif" border=0></a><br>
   <normalfont><b><a href="usercp.php?action=avatars&sid=$session[hash]">Avatar</a></b></font><br>
   <smallfont>Avatars are small images shown under your username in all your posts.</font></td>
  <td id="tablea" bgcolor="{tablecolora}" align="center" width="33%">
   <a href="pms.php?sid=$session[hash]"><img src="{imagefolder}/usercp_pm.gif" border=0></a><br>
   <normalfont><b><a href="pms.php?sid=$session[hash]">Private Messages</a></b></font><br>
   <smallfont>Private Messages allow you to communicate with the other members of this forum.</font></td>
 </tr>
</table>
$footer
</body>
</html>