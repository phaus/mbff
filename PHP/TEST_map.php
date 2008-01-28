<html>
	<head>
		<title>MBFF MAP TEST (c) 2005 by Amun</title>
	</head>
	<body>
<?php
require("include/base_config.php");
require("include/class/class_caching.php");
require("include/class/class_fieldmap.php");
if(_debug){
	require("./include/class/class_debug.php");
	$_debug = new c_debug();
}
echo "ANSICHT: 
<a href=\"".$PHP_SELF."?type=iso\">ISO</a>&nbsp;&nbsp;
<a href=\"".$PHP_SELF."?type=hex\">HEX</a>&nbsp;&nbsp;
<a href=\"".$PHP_SELF."?type=hex3d\">HEX 3D</a>&nbsp;&nbsp;<hr />";
$type = $_REQUEST['type'];

$output = new c_caching("Map_".$type);

if(!$output->is_exist()){
	$system = new c_fieldmap(15, 45, "index.php", true);
	$system->set_offset("0", "40");
	switch($type){
		case"hex":
			$system->set_map_typ("hex");
			$system->set_tile_size();
			break;
		case"hex3d":
			$system->set_map_typ("hex3d");
			$system->set_tile_size("70", "17");
			break;
		case"iso":
			$system->set_map_typ("iso");
			$system->set_tile_size();
			break;
		default:
			$system->set_map_typ("iso");
			$system->set_tile_size();
	}
	$system->draw();	
	$output->build_caf("Map_".$type, $system->get_content());
}
$output->output();

//$system->showclass();
?>
	</body>
</html>
