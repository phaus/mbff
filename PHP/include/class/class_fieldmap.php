<?php
global $hp;
$hp['class'][] = "c_fieldmap";
class c_fieldmap {
	var $layer = 0;
	
	var $fields_blocked = array();
	var $fields_content = array();
	var $fields_height = array();

	var $x_count = "";
	var $y_count = "";

	var $x_offset = 0;
	var $y_offset = 0;
	
	var $add_pos = false;
	var $first_add = "";
	var $w = ""; 
	var $h = "";
	var $w2 = "";
	var $h2 = "";

	var $border = 1;
	var $url;
	
	var $img_path = "world/system/fields/";
	var $img_pushed = "trans_tiles_small_pushed.png";
	var $img_basic = "trans_tiles_small.png";	
	var $map_typ = "iso";
	var $output;
	function c_fieldmap($x = 15, $y = 45, $url = "", $add_pos = false, $first_add = "?"){
		$this->add_pos = $add_pos;
		$this->first_add  = $first_add ;
		$this->x_count = $x;
		$this->y_count = $y;
		$this->url = $url;
	}

	function set_layer($layer){
		$this->layer = $layer;
	}

	function set_border($border){
		$this->border = $border;
	}
	
	function set_offset($x, $y){
		$this->x_offset += $x;
		$this->y_offset += $y;
	}
	
	function set_map_typ($map_typ){
		$this->map_typ = $map_typ;
	}
	
	function set_tile_size($w = 70, $h = 35){
		$this->h = $h;
		$this->w = $w;
		$this->w2 = ceil($w/2);
		$this->h2 = ceil($h/2);
		$this->x_offset = $this->w2;
		//$this->y_offset = $this->h2;
	}

	function draw(){
		for($y = 0; $y < $this->y_count; $y++){
			$this->layer += 1;
			for($x = 0; $x < $this->x_count; $x++){
				if($y % 2 == 0)
					$x_pos = $this->x_offset - $this->w2 + ($this->w * $x);
				else
					$x_pos = $this->x_offset + ($this->w * $x);
				
				$y_pos = $this->y_offset + $y * ($this->h2 + $this->border) - $this->fields_height[$x][$y]; 
				$pic_count += 1;
				if($this->add_pos)
					$url = $this->url.$this->first_add ."sid=".$sid."&x=".$x."&y=".$y;
				else
					$url = $this->url.$this->first_add ."sid=".$sid;
				$this->output .= "<div style=\"position:absolute; z-index:".$this->layer."; width:".$this->w."px; height:".$this->h."px; left:".$x_pos."px;top:".$y_pos."px;\">\n";
				$this->output .= "\t<a onmouseover=\"bild".$pic_count.".src='".$this->img_path.$this->map_typ."/".$this->img_pushed."'\" onmouseout=\"bild".$pic_count.".src='".$this->img_path.$this->map_typ."/".$this->img_basic."'\" href=\"".$url."\"><img name=\"bild".$pic_count."\" src=\"".$this->img_path.$this->map_typ."/".$this->img_basic."\" alt=\"".$x."/".$y."\" title=\"".$x."/".$y."\" border=\"0\"></a>";
				$this->output .= "</div>\n";
			}
		}
		return $this->output;	
	}
	
	function get_content(){
		return $this->output;
	}

	function show(){
		echo $this->output;
	}
	
	function set_field_content($content_array){
		$this->fields_content = $content_array;
	}

	function showclass(){
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}
}
?>