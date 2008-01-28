{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Print: $thread[topic] - Page $page</title>
</head>

<BODY link="#0000ff" alink="#0000ff" vlink="#0000ff">
 <normalfont><p><b><a href="index.php?sid=$session[hash]">$master_board_name</a></b> ($url2board/index.php)<br>
 $boards <!-- |- <b><a href="board.php?boardid=$boardid$session">$boardname</a></b> ($php_path/board.php?boardid=$boardid)<br> -->
 $lines2 <b><a href="board.php?boardid=$boardid&sid=$session[hash]">$board[title]</a></b> ($url2board/board.php?boardid=$boardid)<br>
 $lines3 <b><a href="thread.php?threadid=$threadid&sid=$session[hash]">$thread[topic]</a></b> ($url2board/threadid.php?threadid=$threadid)</p>
 $print_postbit</font>
 <p align="center"><normalfont>Powered by: <b>Burning Board Lite $boardversion</b> © 2001-2004 <b><a href="http://www.woltlab.de" target="_blank">WoltLab GmbH</a></b><br>
English translation by <a href="http://www.wbbmods.com" target="_blank"><b>Satelk</b></a></font></p>
</body>
</html>
