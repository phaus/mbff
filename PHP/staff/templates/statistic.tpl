{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Statistic</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Statistic</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table>
<br />
<table cellpadding="4" cellspacing="1" border="0" width="{tableinwidth}" bgcolor="{tableinbordercolor}">
	<tr bgcolor="{tablecatcolor}" id="tablecat"><td colspan="3"><normalfont color="{fontcolorthird}"><b>Users:</b></font></td></tr>
	<tr>
		<td id="tablea" bgcolor="{tablecolora}" valign="top">
			New Users/Months<hr />$userreg
			<br /><br />		
		</td>	
		<td id="tablea" bgcolor="{tablecolora}" align="center" valign="top" colspan="2">
		Users activ/Hours<hr />$activitydate
		<br /><br />
		</td>
	</tr>
	<tr bgcolor="{tablecatcolor}" id="tablecat"><td colspan="3"><normalfont color="{fontcolorthird}"><b>Posts:</b></font></td></tr>
	<tr>
		<td id="tableb" bgcolor="{tablecolorb}" align="center" valign="top">
		Posts/Months<hr />$postdate
		<br /><br />
		</td>
		<td id="tableb" bgcolor="{tablecolorb}" align="center" valign="top" colspan="2">
		Posts/Hours<hr />$posttime
		<br /><br />
		</td>
	</tr>
	<tr bgcolor="{tablecatcolor}" id="tablecat"><td colspan="3"><normalfont color="{fontcolorthird}"><b>Files:</b></font></td></tr>
	<tr id="tablea" bgcolor="{tablecolora}">
		<td colspan="3">
		<ul>
			<li>Storing $filecount Files using $used_storage MB</li>
			<li>$downloads Downloads since $dtime</li>
		</ul>
		</td>
	</tr>
	<tr>
		<td id="tableb" bgcolor="{tablecolorb}" align="center" valign="top" width="33%">
			Downloads/Months<hr />$downstat
			<br />
			Uploads/Months<hr />$upstat
			<br /><br />
			Traffic [MB]/Months<hr />$filetraffic
			<br /><br />
		</td>
		<td id="tablea" bgcolor="{tablecolora}" align="center" valign="top" width="33%">
			Top Downloads<hr />$files_top
		</td>
		<td id="tableb" bgcolor="{tablecolorb}" align="center" valign="top" width="33%">
			File Extensions<hr />$filelist<br /><br />
		</td>
	</tr>
</table>
$footer
</body>
</html> 