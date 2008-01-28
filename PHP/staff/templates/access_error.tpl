{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Access denied.</title>
$headinclude
</head>

<body id="bg">
 $header
 </table>
 <table border=0 cellpadding=4 cellspacing=1 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
  <tr bgcolor="{tabletitlecolor}" id="tabletitle">
   <td><normalfont color="{fontcolorsecond}"><b>Access denied.</b></font></td>
  </tr>
  <tr id="tablea" bgcolor="{tablecolora}">
   <td><normalfont>Access to this page has been denied for one of the following reasons:
<ul>
 <li>You are not logged in. Some pages are restricted to users only. To login, fill in the information below. To register, <a href="register.php?sid=$session[hash]">click here</a>.</li>
 <li>Your account is closed or not activated. Please contact the Administrator in this case.</li>    
 <li>You are trying to access a page restricted to certain user groups. You do not have permission to enter this page.</li>
</ul></font>
$access_errorbit
</td>
  </tr>
 </form></table>	
 $footer
</body>
</html>