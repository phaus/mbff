Hello $wbbuserdata[username],

You have changed your email at $master_board_name. You account has been deactivated. 

To activate your account you must click this link
$url2board/register.php?action=activation&usrid=$wbbuserdata[userid]&a=$activation

<a href="$url2board/register.php?action=activation&usrid=$wbbuserdata[userid]&a=$activation">AOL User click here, please!</a>

**** The link don't work? ****
If the link don't work, you should open the following url in your browser:
$url2board/register.php?action=activation

Pay attention, that there are no spaces in the link.
If you use the last link ( $url2board/register.php?action=activation ), you must enter your userid and the activationcode on the page.

Your userid: 	$wbbuserdata[userid]
Your activation code: 	$activation

If you have problems activating your account, send a mail to one of our supportteam members, please.
-> $webmastermail

Yours truly,
The $master_board_name Team