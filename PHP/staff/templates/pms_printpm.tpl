{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Print: $pm[subject]</title>
</head>

<BODY bgcolor="#FFFFFF" text="#000000" link="#0000FF" vlink="#0000FF">
 <normalfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a></b> ($url2board/index.php)
 <hr>
 <i>Message from: $pm[username]<br>
 Date: $senddate $sendtime<br>
 To: $wbbuserdata[username]<br>
 Subject: $pm[subject]</i>
 <p>$pm[message]</p></font>
 $signature
<p align="center"><normalfont>Powered by: <b>Burning Board Lite $boardversion</b> © 2001-2004 <b><a href="http://www.woltlab.de" target="_blank">WoltLab GmbH</a></b><br>
English translation by <a href="http://www.wbbmods.com" target="_blank"><b>Satelk</b></a></font></p>
</body>
</html>
