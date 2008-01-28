{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Setup RDF Feed</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Setup RDF Feed</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<form action="set_rdf.php" method="post">
<input type="hidden" name="sid" value="$sid" />
<input type="hidden" name="action" value="setup" />
<table cellpadding="4" cellspacing="1" border="0" width="{tableinwidth}" bgcolor="{tableinbordercolor}">
	<tr bgcolor="{tablecatcolor}" id="tablecat">
		<td colspan=3><normalfont color="{fontcolorthird}"><b>Feed Settings:</b></font></td>
	</tr>
	<tr id="tablea" bgcolor="{tablecolora}">
		<td valign="top" align="right" width="50%" nowrap>Choose Boards:</td>
		<td colspan="2" width="50%">$boardselect</td>
	</tr>
	<tr id="tableb" bgcolor="{tablecolorb}">
		<td valign="top" align="right" nowrap>Thread Count:</td>
		<td colspan="2">
			<input name="threadcount" value="$threadcount" size="5" type="text" />
		</td>
	</tr>
	<tr id="tablea" bgcolor="{tablecolora}">
		<td></td>
		<td colspan="2"><input type="submit" value="speichern"  /></td>
	</tr>
</table>
<br />
<table cellpadding="4" cellspacing="1" border="0" width="{tableinwidth}" bgcolor="{tableinbordercolor}">

	<tr bgcolor="{tablecatcolor}" id="tablecat">
		<td colspan=3><normalfont color="{fontcolorthird}"><b>Use Link or Copy Code:</b></font></td>
	</tr>
	<tr id="tablea" bgcolor="{tablecolora}">
		<td valign="top" align="right" width="50%" nowrap>Link:</td>
		<td colspan="2" width="50%"><a href="$rdflink" target="_blank"><img src="" alt="RDF" border="0" /></a></td>
	</tr>
	<tr id="tableb" bgcolor="{tablecolorb}">
		<td valign="top" align="right" width="50%" nowrap>Code:</td>
		<td colspan="2" width="50%"><textarea cols="80" rows="1">$rdflink</textarea></td>	
	</tr>
</table>
</form>
$footer
</body>
</html>   