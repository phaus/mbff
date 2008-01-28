<?php
require ("./global.php");

if($adminsession->hash) {
 $db->query("DELETE FROM bb".$n."_adminsessions WHERE hash = '".$adminsession->hash."'");	
}
header("Location: index.php");
?>
