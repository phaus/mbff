<?php
function get_name(){
	$name = "";
	$silben = array(
		array("Ro", "Or", "Sol", "Ka", "so", "Al", "Na"),
		array("de", "ion", "mu", "me", "pha", "bu"),
		array("ba", "lu", "esch", "bu"),
		array("ra", "s", " Cen"),
		array("an", "tau"),
		array("ri")
	);
	$s = sizeof($silben) - 1;
	$s_count = rand(0, $s);
	for($i = 0; $i<=$s_count; $i++){
		$t = sizeof($silben[$i]) - 1;
		$j = rand(0, $t);
			echo "N:".$i."|".$j."<br />";
			$name .= $silben[$i][$j];
	}
	$name = strtolower($name);
	return ucwords($name);
}

function get_systems(){
	global $sys_conf, $system_koords;
	$system_names = array();
	$system_koords = array();
	$sys_db = new db($sys_conf['db_level1']['host'], $sys_conf['db_level1']['user'], $sys_conf['db_level1']['pass'], $sys_conf['db_level1']['name'],$phpversion);
	$sql = "SELECT system_name, system_location 
			FROM systems_index";
	$result = $sys_db->query($sql);
	while($row = $sys_db->fetch_array($result, MYSQL_ASSOC)){
		$system_names[] = $row['system_name'];
		$system_koords[] = unserialize($row['system_location']);
	}
return $system_names;
}

function check_koords($x, $y, $z){
	global $system_koords;
	$loc = array($x, $y, $z);
	foreach($system_koords as $part)
		if($part[0] == $loc[0] && $part[1] == $loc[1] && $part[2] == $loc[2]){
			echo "L:".$x."|".$y."|".$z." besetzt !<br />";
			return true;
		}
}
function show_koords(){
	global $system_koords;
	echo "<pre>Array\n";
	echo"(\n";
	foreach($system_koords as $key => $part){
		echo "\t[".$key."] => ".$part[0]."|".$part[1]."|".$part[2]."\n";
	}
	echo"}\n</pre>";
}

function check_planet_koords($koords, $x, $y, $z, $typ){
	$loc = array($x, $y, $z);
	switch($typ){
		case"1"://Sonnen (4x4 felder)
			$r_radius = 70;
			$l_radius = 70;
			break;
		default://alle anderen (ein feld)
			$r_radius = 70;
			$l_radius = 0;
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

function build_planets($system_id, $system_name){
	$koords = array();
	$count = rand(1, 3);
	$star_names = array();
	
	
	//Sonne(n)
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	for($i = 0; $i < $count;){
		$new = false;
		$s_size= rand(1,10);
		while($new == false){
			$x = rand(100,924);
			$y = rand(50,824);
			$z = 0;//rand(0,1024);
			if(check_planet_koords($koords, $x, $y, $z, 1))
				$new = false;
			else
				$new = true;
		}
		$s_location = array($x, $y, $z);
		$koords[] = $s_location;
		$s_name = ++$i;
		$s_typ = 1; //ist Sonne
		echo "<big>Sonne ".$s_name."</big><br />";
	}
	echo "</td>";
	
	$p_types = array("A", "M", 
					"G", "T", 
					"X", "C", 
					"I", "B",
					"D", "H");
	
	//Planeten
	$count = 1;//rand(1, 10);
	for($i = 0; $i < $count;){
		echo "<td>";
		$new = false;
		while($new == false){
			$p_x = rand(100,924);
			$p_y = rand(50,824);
			$p_z = 0;//rand(0,1024);			
			if(check_planet_koords($koords, $p_x, $p_y, $p_z, 2))
				$new = false;
			else
				$new = true;
		}
		$p_location = array($p_x, $p_y, $p_z);
		$koords[] = $p_location;
		$p_size = rand(1,10);
		$p_monde = rand(1,4);
		$p_typ = $p_types[rand(0,9)];

		$s_typ  = 2; //ist Planet

		$p_name = get_name();
		if(in_array($p_name, $star_names)){
			$p_name = $system_name." ".$count;
		}

		$star_names[] = $p_name;
		 
		echo "<small>".$p_name."
		<br />Klasse: ".$p_typ."
		<br />Größe: ".$p_size."
		<br />Monde: ".$p_monde."		
		</small>";			
		echo "</td>";
	}

	echo "</tr>";
	echo "</table>";
}
#######################################################################################
global $system_koords;

require("./include/base_functions.php");
require("./session.php");
$hp['footer'] = hp_compressed_output();

$system_names = get_systems();
krsort($system_names);
krsort($system_koords);
?>
<html>
	<head>
		<title>mbff System Builder</title>
	</head>
<body bgcolor="#000000" text="#CCCCCC">
<table width="100%">
	<tr>
		<td valign="top">
vorhandene Systeme:<hr />
<?
echo "<pre>";
print_r($system_names);
echo "</pre>";
?>
</td>
<td valign="top">
belegte Standorte:<hr />
<?
show_koords();
?>
</td>
<td valign="top">
neues System:<hr />
<?
$new = false;
echo "<ul>";
while($new == false){
	$s_name = get_name();
	echo "<li>".$s_name;
	if(in_array($s_name, $system_names)){
		echo " :-(";
		$new = false;
	}else{
		$new = true;
		echo " :-)";	
	}
	echo "</li>";
}
echo "</ul>";

$new = false;
echo "<ul>";
while($new == false){
	$x = rand(100,924);
	$y = rand(50,824);
	$z = 0;//rand(0,1024);
	echo "<li>".$x."|".$y."|".$z."</li>";
	if(check_koords($x, $y, $z))
		$new = false;
	else
		$new = true;	
}
echo "</ul>";
$sys_location = array($x, $y, $z);

$new_sys = new c_system();
$new_sys->add_entry("system_name", $s_name);
$new_sys->add_entry("system_location", $sys_location);
//$new_sys->new_system();
//$new_sys->save_data();
$new_sys->get_data();

//build_planets($new_sys->get_id(), $s_name);
?>
		</td>
	</tr>
</table>
<small>DEBUG:
<hr />
<pre>
<?
$new_sys->print_data();
?>
</pre>
<hr />
</small>
</body>
</html>
