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
	$geocolor = $sys_conf_color['planets']['ground_color'];
	$fontcolor = $sys_conf_color['planets']['font_color'];			
if($user_id > 0){
	$hp['style'] = "background-image: url(../../images/t.space.gif);";
	
	if($sys_conf['js_menu']){
		eval("\$hp['js'] .= \"".hp_gettemplate("menu_js", $sys_conf['lang'])."\";");
		$hp['onload'] = "init();move()";
	}

	$output = new c_caching("game_system_map_S".$sys_id."-".$sys_conf['lang']);
	if(!$output->is_exist()){
		if(_debug)
			$_debug->add("<b>Schreibe in Cache:</b> game_system_map_".$sys_id."_".$sys_conf['lang']);
		$system = new c_system($sys_id);
		$hp['system_name'] = $system->data['system_name'];
		$system_content = $system->get_system_content();

		$system_content[5][15]['typ'] = "unit";
		$system_content[5][15]['picture'] = "spaceships/iso/dummy-cruiser.gif";
		$system_content[5][15]['name'] = "dummy-cruiser";
		
		$system_content[4][16]['typ'] = "unit";
		$system_content[4][16]['picture'] = "spaceships/iso/cruiser2.gif";
		$system_content[4][16]['name'] = "Krell Kreutzer";

		$system_content[3][16]['typ'] = "unit";
		$system_content[3][16]['picture'] = "spaceships/iso/talerion-cruiser1.gif";
		$system_content[3][16]['name'] = "Talerion Kreutzer";

		$system_content[2][5]['typ'] = "planet";
		$system_content[2][5]['picture'] = "../planets/static/s15686992763_Dune.rgb_so.gif";
		$system_content[2][5]['name'] = "Planet Klasse D";
		$system_content[2][5]['id'] = 234;
		
		$system_content[10][5]['typ'] = "planet";
		$system_content[10][5]['picture'] = "../planets/static/s47971519633_class_m.rgb_so.gif";
		$system_content[10][5]['name'] = "Planet Klasse M";
		$system_content[10][5]['id'] = 235;	
		
		$system_content[5][13]['typ'] = "planet";
		$system_content[5][13]['picture'] = "../planets/static/s31939387917_class_g.rgb_so.gif";
		$system_content[5][13]['name'] = "Planet Klasse G";
		$system_content[5][13]['id'] = 236;	
		
		$system_content[7][13]['typ'] = "planet";
		$system_content[7][13]['picture'] = "../planets/static/s13165115482_Colors.rgb_so.gif";
		$system_content[7][13]['name'] = "Planet Klasse P";
		$system_content[7][13]['id'] = 237;	


		//echo "<pre>".print_r($system_content)."</pre>";
		$w = 68; 
		$h = 33;
		$w2 = ceil($w/2);
		$h2 = ceil($h/2);
		$layer = $pic = 0;
		

		$offset = 1;
		for($y = 0; $y < 45; $y++){
			$layer++;
			for($x = 0; $x < 15; $x++){
				if($y % 2 == 0)
					$sys['xpos'] = 150 - $w2 + ($w) * $x ;
				else
					$sys['xpos'] = 150 + ($w ) * $x;
				
				$sys['ypos'] = 75 + $y*($h2 + $offset) - $tile_height; 
				
				if(is_array($system_content[$x][$y])){					
//					if($system_content[$x][$y]['typ'] == "planet"){
//					
//						$sys['name'] = $system_content[$x][$y]['star_name']; 
////						$objekt = new c_star($system_content[$x][$y]['star_id']);
////						$objekt->get_data();
////						$content = $objekt->return_data_array();						
//						$content = $system_content;
//						if($content['klasse']){
//							$sys['color'] = $geocolor[$content['klasse']];
//							$sys['fontcolor'] = $fontcolor[$content['klasse']];
//							$sys['class'] = "[".$content['klasse']."]";
//							$sys['typ'] = "Planet";
//							$sys['font_size'] = $content['size'] + 8;						
//						}else{
//							$sys['color'] = $geocolor["Sonne"];
//							$sys['fontcolor'] = $fontcolor["Sonne"];
//							$sys['class'] = "";
//							$sys['typ'] = "SONNE";
//							$sys['font_size'] = $content['size'] + 10;						
//						}	
//					}
					
					if($system_content[$x][$y]['typ'] == "unit"  || $system_content[$x][$y]['typ'] == "planet"){
						$sys['ypos'] -= 15;
						$u_layer = $layer + 2;
						$sys['picture'] = $system_content[$x][$y]['picture'];
						$sys['name'] = $system_content[$x][$y]['name'];
						$p_id = $system_content[$x][$y]['id'];
					}				
					$pic++;					
					eval("\$hp['system_bit']  .= \"".hp_gettemplate("game_system_map_".$system_content[$x][$y]['typ']."_bit", $sys_conf['lang'])."\";");
				}else{
					$pic++;
					eval("\$hp['system_bit']  .= \"".hp_gettemplate("game_system_map_bit", $sys_conf['lang'])."\";");		
				}
			}
		}
		eval("\$hp['content']  = \"".hp_gettemplate("game_system_map", $sys_conf['lang'])."\";");
		if(_debug)
			$_debug->add("<b>Hole aus Cache:</b> game_system_map_".$sys_id."_".$sys_conf['lang']);
		
		//echo md5($hp['content']);
		$output->build_caf("game_system_map_S".$sys_id."-".$sys_conf['lang'], $hp['content'], false);
	}
	eval("\$hp['content']  = \"".$output->get_content()."\";");

	$layer = 100;
	//eval("\$hp['nav'] = \"".hp_gettemplate("map_nav_top", $sys_conf['lang'])."\";");
	//eval("\$hp['nav'] .= \"".hp_gettemplate("map_nav_bottom", $sys_conf['lang'])."\";");
	//eval("\$hp['nav'] = \"".hp_gettemplate("nav_frame", $sys_conf['lang'])."\";");
	$hp['style'] = "background-image:url(./world/backgrounds/space.jpg); ";
	eval("\$index = \"".hp_gettemplate("field", $sys_conf['lang'])."\";");
	echo $index;
}else{
	eval("\$hp['content']  = \"".hp_gettemplate("login", $sys_conf['lang'])."\";");
	eval("\$index = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
	echo $index;
}


///////////////////////////////////////////

?>
