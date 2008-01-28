<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-15">
{cssfile}
<STYLE TYPE="TEXT/CSS">
 <!--
  {css}
 -->
</STYLE>
</head>
<body rightmargin="0" bottommargin="0" leftmargin="0" topmargin="0">
<form name="upload_form" method="post" enctype="multipart/form-data" action="file_manager.php">
<input type="hidden" name="sid" value="$sid" />
<input type="hidden" name="post_id" value="$post_data[postid]" />
<input type="hidden" name="action" value="upload" />
<table bgcolor="{tablecolora}" id="tablea" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%">
	<tr>
		<td width="20" rowspan="2" valign="top"><smallfont><br /></font><a title="zur Dateiliste" href="file_manager.php?sid=$sid&post_id=$post_data[postid]"><img border="0" alt="filelist" height="20" src="images/file_icons/filelist.gif" /></a></td>
		<td height="5" colspan="3"><smallfont>Datei wählen:</font></td>
	</tr>
	<tr>
		<td valign="top" width="100"><input class="input" name="upload" type="file" /></td>
		<td valign="top"><input class="input" type="submit" value="senden" /></td>
		<td></td>
	</tr>
</table>
</form>
</body>
</html>