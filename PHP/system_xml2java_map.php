<?php
##################################################################################
$modules = array("user", "system", "system_list", "caching");
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?> 
<java version="1.5.0_04" class="java.beans.XMLDecoder">
<object class="java.util.Vector"> ';


		$sys_list = new c_system_list("*");
		$sys_list->get_all_nodes(array('system_name', 'system_location', 'system_sun'));
		$sys_arr = $sys_list->return_data_array();
		foreach($sys_arr as $sys){
			echo '<void method="add">';
			echo '<object class="system">';
			echo '	<void property="system_name"> 
   					<string>'.$sys['system_name'].'</string> 
  					</void>';
			echo '<void property="id"> 
   					<int>'.$sys['system_id'].'</int> 
  					</void>';
			echo '<void property="sun"> 
   					<int>'.$sys['system_sun'].'</int> 
  					</void>';

			$koords = unserialize($sys['system_location']);
			echo '<void property="x"> 
   					<int>'.$koords['0'].'</int> 
  					</void>';
			echo '<void property="y"> 
   					<int>'.$koords['1'].'</int> 
  					</void>';
			echo '<void property="z"> 
   					<int>'.$koords['2'].'</int> 
  					</void>';
  			echo '</object>';
  			echo '</void>';
		}		
echo '</object>
</java>';
?>
