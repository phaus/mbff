<?php
$filename="markread.php";

require ("./global.php");

if($wbbuserdata['userid']) $db->query("UPDATE bb".$n."_users SET lastvisit='".time()."' WHERE userid = '$wbbuserdata[userid]'");
else bbcookie("lastvisit",time(),0);
header("Location: index.php?sid=$session[hash]");
?>
