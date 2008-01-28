<?php
##################################################################################
$modules = array("user", "system", "system_list", "caching");
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");
header("Content-Type: text/xml");
echo"<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
echo "<mbff typ=\"galaxy3d\">\n";
echo "<title>".$sys_conf['title']."</title>\n";
echo "<version>".$sys_conf['version']."</version>\n";
echo "<sid>$sid</sid>\n";
echo "<systems>\n";
		$sys_list = new c_system_list("*");
		$sys_list->get_all_nodes(array('system_name', 'system_location', 'system_sun'));
		$sys_arr = $sys_list->return_data_array();
		foreach($sys_arr as $sys){
			echo "<system id =\"".$sys['system_id']."\">\n";
			echo "<name>".$sys['system_name']."</name>\n";
			echo "<sun>".$sys['system_sun']."</sun>\n";
			echo "<location>\n";
			$koords = unserialize($sys['system_location']);
			echo "<x>".$koords[0]."</x>\n";
			echo "<y>".$koords[1]."</y>\n";
			echo "<z>".$koords[2]."</z>\n";
			echo "</location>\n";
			echo "</system>\n";
		}		
echo "</systems>\n";
echo "</mbff>\n";
?>
