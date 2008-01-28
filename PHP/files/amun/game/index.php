<?php
	//compressed output
	function hp_compressed_output()
	{
		$encoding = getEnv("HTTP_ACCEPT_ENCODING");
		$useragent = getEnv("HTTP_USER_AGENT");
		$method = trim(getEnv("REQUEST_METHOD"));
		$msie = preg_match("=msie=i", $useragent);
		$gzip = preg_match("=gzip=i", $encoding);
		if ($gzip && ($method != "POST" or !$msie))
		{
			ob_start("ob_gzhandler");
		}
		else
		{
			ob_start();
		}
	}

	hp_compressed_output();

function get_vehicle_moves($vehicle_id, $vehicle_sets, $vehicle_pos){
	$pos = explode("_", $vehicle_pos);

	$i_start = $pos[0] - $vehicle_sets;
	$i_ende = $pos[0] + $vehicle_sets;
	$j_start = $pos[1] - $vehicle_sets;
	$j_ende = $pos[1] + $vehicle_sets;
	
	echo "<!-- setze i von ".$pos[0]." nach ".$i_start." -> ".$i_ende." -->\n";
	echo "<!-- setze j von ".$pos[1]." nach ".$j_start." -> ".$j_ende." -->\n";
	for($i = $i_start; $i <= $i_ende; $i++){
		for($j = $j_start; $j <= $j_ende; $j++){
			$out[$i][$j] = $vehicle_id;
		}
	}
return $out;
}
?>
<html>
<head>
	<title>TestMap I</title>´
<style type="text/css">

	body {
		background-color: #000000;
	}
	
	.can {
		background-color: #99ff99;
	}

	.vehicle {
		background-color: #dddddd;
	}

	.block {
		background-color: #ff3333;
	}

</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" height="1000" width="1000" border="0">
<?php
	require("map_static.inc");

	$vehicle_move = get_vehicle_moves($vehicle, $vehicle_data[$vehicle]['set'], $vehicle_pos);
	echo "\n<!--";
	print_r($vehicle_move);
	echo "-->\n";

	for($i=0;$i<100;$i++)
	{
		echo "\t<tr>\n";
		for($j=0;$j<100;$j++)
		{
			if($vehicle_move[$i][$j] != 0 && $field_blocked[$i][$j] == 0){
				if($field_vehicle[$i][$j] == 0)
					echo "\t<td class=\"can\" width=\"20\" height=\"20\">
								<a title=\" Vehicle ".$vehicle." setzen\" href=\"?vehicle=".$vehicle."&vehicle_pos=".$i."_".$j."\">
									<img border=\"0\" heigth=\"20\" src=\"images/move.png\" />							
								</a>
							</td>\n";							
				else
					echo "\t<td background=\"images/vehicle.png\" class=\"vehicle\" width=\"20\" height=\"20\">
								<a name=\"".$field_vechicle[$i][$j]."\" title=\" Vehicle ".$field_vechicle[$i][$j]." angreifen\" href=\"?vehicle=".$field_vechicle[$i][$j]."&vehicle_pos=".$i."_".$j."\">
									<big><b>*</b></big>
								</a>
							</td>\n";
			}elseif($field_blocked[$i][$j] != 1){
				if($field_vehicle[$i][$j] != 0 && $vehicle_move[$i][$j] == 0){	
					echo "\t<td class=\"vehicle\" width=\"20\" height=\"20\">
								<a name=\"".$field_vehicle[$i][$j]."\" title=\" Vehicle ".$field_vehicle[$i][$j]." setzen\" href=\"?vehicle=".$field_vehicle[$i][$j]."&vehicle_pos=".$i."_".$j."\">
									<img border=\"0\" heigth=\"20\" src=\"images/vehicle.png\" />
								</a>
							</td>\n";
				}else
					echo "\t<td width=\"20\" height=\"20\"></td>\n";			
			}else
				echo "\t<td title=\"Feld belegt\" class=\"block\" width=\"20\" height=\"20\"><img border=\"0\" heigth=\"20\" src=\"images/blocked.png\" /></td>\n";			
		}	
		echo "\t</tr>\n";
	}
?>
</table>

</body>
</html>