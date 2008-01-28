<?php
require("include/base_config.php");
require("include/class/class_caching.php");
require("include/class/class_fieldmap.php");
if(_debug){
	require("./include/class/class_debug.php");
	$_debug = new c_debug();
}
$output = new c_caching("Test");

if(!$output->is_exist()){
	$system = new c_fieldmap(15, 45, "index.php", true);
	$system->set_offset("0", "40");
	$system->set_map_typ("hex");
	$system->set_tile_size();
	$system->draw();	
	$output->build_caf("Test", $system->get_content());
}
$output->output();
?>