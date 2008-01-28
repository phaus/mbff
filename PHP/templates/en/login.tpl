<form name="login" method="post" action="login.php">
<input type="hidden" value="$sid" name="sid" />
<fieldset id="Layer1" style="width:350px; z-index:1; background-color: #5c5e5c; text-align : center;" class="container">
	<legend>:: LOGIN ::</legend>
	<table>
	<tr>
		<td rowspan="3" valign="top"><img src="world/system/logos/mbff_logo.png" /></td>
		<td><label for="l_username">ID:</label></td>
		<td><input class="input" type="text" name="l_username" /></td>
	</tr>
	<tr>
		<td><label for="password">CODE:</label></td>
		<td><input class="input" type="password" name="l_password" /></td>
	</tr>
	<tr>
		<td colspan="2">
			<br />
			<table width="100%">
				<tr>
					<td align="left"><a style="text-align:left;background-color: #5c5e5c;" class="buttonlink" href="register.php?sid=$sid">register Account</a></td>
					<td align="right"><input style="text-align:right"  type="image" alt="login" src="world/system/buttons/login.png" value="login" /></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">$hp[set_lang]</td>
	</tr>
	</table>
</form>		
</fieldset>
<div>

	<tr><th colspan="2"></th></tr>
	
</div>