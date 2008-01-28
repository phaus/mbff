<?php
function get_galaxy_layer($size = 1024){
	global $sys_conf, $user_id;
		$filename = $sys_conf['cache_folder']."/imgs/galaxy_layer_".$user_id.".png";
		if(!@fopen($filename,"r")){
			$galaxy_layer = imagecreatetruecolor($size, $size);
//			$galaxy_layer = imagecreatefromjpeg("./world/backgrounds/12b.jpg");
			$white = ImageColorAllocate($galaxy_layer, 255, 255, 255);
			$black = ImageColorAllocate($galaxy_layer, 0, 0, 0);
			//$yellow = ImageColorAllocate($galaxy_layer, 255, 255, 0);
			//Sun COLORS
			$sun_col[1] = ImageColorAllocate($galaxy_layer, 200, 200, 200);
			$sun_col[2] = ImageColorAllocate($galaxy_layer, 255, 255, 20);
			$sun_col[3] = ImageColorAllocate($galaxy_layer, 255, 255, 10);
			$sun_col[4] = ImageColorAllocate($galaxy_layer, 100, 255, 40);
			$sun_col[5] = ImageColorAllocate($galaxy_layer, 232, 255, 50);
			$sun_col[6] = ImageColorAllocate($galaxy_layer, 100, 255, 60);
			$sun_col[7] = ImageColorAllocate($galaxy_layer, 255, 105, 70);
			$sun_col[8] = ImageColorAllocate($galaxy_layer, 255, 205, 80);
			$sun_col[9] = ImageColorAllocate($galaxy_layer, 255, 235, 90);
			$sun_col[10] = ImageColorAllocate($galaxy_layer, 255, 100, 200);
			
			ImageFill($galaxy_layer, 0, 0, $white);
			imagecolortransparent($galaxy_layer, $white);
			
			$sys_list = new c_system_list("*");
			$sys_list->get_all_nodes(array('system_sun', 'system_location'));
			$sys_arr = $sys_list->return_data_array();
			foreach($sys_arr as $sys){
				$koords = unserialize($sys['system_location']);
				$x = $koords[0]+$size/2;
				$y = $koords[1]+$size/2;
				imagefilledellipse ($galaxy_layer, $x, $y, 10, 5, $sun_col[$sys['system_sun']]);
			}

			imageinterlace($galaxy_layer,1);
			imagepng($galaxy_layer, $filename, 85);
			imagedestroy($galaxy_layer);
			if(_debug){
				global $_debug;
				$_debug->add("<b>CACHING:</b> ".$filename);
			}
		}
return $filename;
}
?>