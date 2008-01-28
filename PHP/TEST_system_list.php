<?php
##################################################################################
$modules = array("user", "system", "system_list");
$request = array();
$post = array();
##################################################################################
require("./session.php");
$sys_list = new c_system_list("*");
$sys_list->get_all_nodes(array('system_name', 'system_location'));
$sys_list->print_data();
?>