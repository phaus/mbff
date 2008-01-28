<?php
##################################################################################
$modules = array("user", "system", "orb", "caching");
$funcs = array();
$request = array("sys_id");
$post = array();
##################################################################################
require("./session.php");
if(_debug)
	global $_debug;

if($user_id > 0){
	$hp['bgimg'] = "./world/planets/static/s31939387917_class_g.rgb_q.png";
	$output = new c_caching("game_planet_map_P".$planet_id."-".$sys_conf['lang']);
	if(!$output->is_exist()){
		$w = 70; 
		$h = 35;
		$w2 = ceil($w/2);
		$h2 = ceil($h/2);
		$layer = $pic = 0;
			
	
		$offset = 1;
		for($y = 0; $y < 36; $y++){
			$layer++;
			for($x = 0; $x < 20; $x++)
				if($y != 3 && $y != 4 && $y != 32 && $y != 31){
					if($y % 2 == 0)
						$sys['xpos'] = 80 - $w2 + ($w) * $x ;
					elseif($x!= 19)
						$sys['xpos'] = 80 + ($w ) * $x;
					
					$sys['ypos'] = 70 + $y*($h2 + $offset) - $tile_height; 
				
					$pic++;
					if($y < 3)
						eval("\$hp['planet_bit']  .= \"".hp_gettemplate("game_planet_space_bit", $sys_conf['lang'])."\";");				
					else
						eval("\$hp['planet_bit']  .= \"".hp_gettemplate("game_planet_map_bit", $sys_conf['lang'])."\";");				
				}
		}

		$bgh = 700;
		$bgw = 1400;
		eval("\$hp['content']  = \"".hp_gettemplate("game_planet", $sys_conf['lang'])."\";");
		
		
		
		
		
		
		$output->build_caf("game_planet_map_P".$planet_id."-".$sys_conf['lang'], $hp['content'], false);
		$layer = 100;
	}
	eval("\$hp['content']  = \"".$output->get_content()."\";");	
	$hp['style'] = "background-image:url(./world/backgrounds/space.jpg); ";
	eval("\$index = \"".hp_gettemplate("field", $sys_conf['lang'])."\";");
	echo $index;	
}
?>
