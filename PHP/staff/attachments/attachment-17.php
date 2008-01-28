<?php
function build_suns($system_id, $system_name){
	global $koords; 
	$koords = array();
	$count = rand(1, 3);
	//Sonne(n)
	echo "<td nowrap>";
	for($i = 0; $i < $count;){
		$new = false;
		$s_size= rand(1,10);
		while($new == false){
			$x = rand(1,14);
			$y = rand(1,44);
			$z = 0;//rand(0,1024);
			if(check_planet_koords($koords, $x, $y, $z, 1))
				$new = false;
			else
				$new = true;
		}
		$s_location = array($x, $y, $z);
		$koords[] = $s_location;
		$s_name = "Sonne S".$system_id."-".++$i;
		$s_typ = 1; //ist Sonne
		
		$gestirn = new c_star();
		$gestirn->set_entry("star_name", $s_name);
		$gestirn->set_entry("star_system_id", $system_id);
		$gestirn->set_entry("star_location", $s_location);
		$gestirn->set_entry("star_typ", $s_typ);
		$gestirn->new_star();
		$gestirn->get_data();
		$gestirn->set_entry("size", $s_size);
		$gestirn->save_data();

		echo "<big>".$s_name."</big>/(".$count.")<br /><small>Größe:".$s_size."</small><br />";
	}
	echo "</td>";
}

function build_planets($system_id, $system_name){
	global $koords; 
	$p_types = array("A", "M", 
					"G", "T", 
					"X", "C", 
					"I", "B",
					"D", "H");
	//Planeten
	$count = rand(1, 10);
	for($i = 0; $i < $count;){
		echo "<td nowrap>";
		$new = false;
		while($new == false){
			$p_x = rand(1,14);
			$p_y = rand(1,44);
			$p_z = 0;//rand(0,1024);			
			if(check_planet_koords($koords, $p_x, $p_y, $p_z, 2)){
				$new = false;
				echo "<small>K: :-(</small>&nbsp;";
			}else{
				$new = true;
				echo "<small>K: :-)</small>&nbsp;";
			}
		}
		echo "<br />";
		$p_location = array($p_x, $p_y, $p_z);
		$koords[] = $p_location;
		$p_size = rand(1,10);
		$p_monde = rand(0,10);
		$p_typ = $p_types[rand(0,9)];

		$s_typ  = 2; //ist Planet

		$p_name = $system_name." ".++$i;

		$star_names[] = $p_name;

		$gestirn = new c_star();
		$gestirn->set_entry("star_name", $p_name);
		$gestirn->set_entry("star_system_id", $system_id);
		$gestirn->set_entry("star_location", $p_location);
		$gestirn->set_entry("star_typ", $s_typ);
		$gestirn->new_star();
		$gestirn->get_data();
		$gestirn->set_entry("size", $p_size);
		$gestirn->set_entry("monde", $p_monde);
		$gestirn->set_entry("klasse", $p_typ);
		$gestirn->save_data();
				 
		echo "<small>".$p_name."
		<br />Klasse: ".$p_typ."
		<br />Position: ".$p_x.", ".$p_y.", ".$p_z."		
		<br />Größe: ".$p_size."
		<br />Monde: ".$p_monde."		
		</small>";			
		echo "</td>";
	}
}


function check_planet_koords($koords, $x, $y, $z, $typ){
	$loc = array($x, $y, $z);
	switch($typ){
		case"1"://Sonnen (4x4 felder)
			$r_radius = 2;
			$l_radius = 2;
			break;
		default://alle anderen (ein feld)
			$r_radius = 1;
			$l_radius = 1;
			break;
	}
	
	foreach($koords as $part)
		if(($part[0] < $loc[0] +  $r_radius && 
			$part[1] < $loc[1] +  $r_radius && 
			$part[2] < $loc[2] +  $r_radius) 
			&& 
			($part[0] > $loc[0] -  $l_radius && 
			$part[1] > $loc[1] -  $l_radius && 
			$part[2] > $loc[2] -  $l_radius)){
			echo "L:".$x."|".$y."|".$z." besetzt !<br />";
			return true;
		}
}

function get_new_system(){
	global $sys_conf, $system_koords;
	$sys_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);

	$sql = "SELECT system_id FROM systems_index WHERE activ != '0' LIMIT 0,1";
	if($sys_ar = $sys_db->query_first($sql)){
		$p_system = new c_system($sys_ar['system_id']);
		return $p_system;
	}else{
		echo "<hr />keine inaktvies System vorhanden !<hr />";
		return false;
	}
}
#######################################################################################
global $koords; 

require("./include/base_functions.php");
require("./session.php");
require("./include/class/class_star.php");
if($system = get_new_system()){
	$sys_array = $system->return_data_array();
	$sys_id = $sys_array['system_id'];
	echo $sys_array['system_name']." ".$sys_id."<hr />";
	echo "<table>";
	echo "<tr>";
	build_suns($sys_id, $sys_array['system_name']);
	build_planets($sys_id, $sys_array['system_name']);
	$system = get_new_system($sys_id);
	$system->set_activ();
	echo "</tr></table>";
	echo "\n<script type=\"text/javascript\" language=\"javascript\">\n";
	echo "window.location=\"".$PHP_SELF."?sys_id=".$sys_id."\";\n";
	echo "</script>\n";
}
?>