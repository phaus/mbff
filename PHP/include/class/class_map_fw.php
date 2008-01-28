<?php
class c_map_fw {
	
	var $map =  	array( 
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','M','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','M','M','M','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','M','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','M','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','M','M','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','M','M','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I'),
				array('W','W','W','W','I','I','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','W','I','W','W','W','I','W','W','I')
				);
	var $width = 45;
	var $height = 15;
	
	var $tile_height = 35;
	var $tile_width = 70;
		
	var $terrain = array(array("W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W","W",
							"N","N","N","N","N","N","N","N","N","N","N"),
						array("I","I","I","I","I","I"),
						array("M","M","M","D","D","D","D"),
						array("S","S","S")
						);
	var $color = array(	"W" => "494576", 
						"M"=> "065233", 
						"D"=> "00ff96", 
						"I"=> "04d8e0", 
						"N"=> "05e162", 
						"S"=> "a28484");
	
	function c_map_fw($height = 20, $width = 30, $tile_height = 35, $tile_width = 70){
		$this->height = $height;
		$this->width = $width;
		$this->tile_height = $tile_height;		
		$this->tile_width = $tile_width;
	}
	
	function build(){
		for($j = 0; $j < $this->height; $j++)
			for($i = 0; $i < $this->width; $i++){
				$this->map[$i][$j] = $this->terrain[rand(0, 3)][rand(0, sizeof($this->terrain))];
			}
	}
	
	function show(){
		echo "<table width=\"".$this->width*$this->tile_width."\" height=\"".$this->height*$this->tile_height."\">\n";
		echo "<tr>\n<td></td>\n";
		for($i = 0; $i < $this->width; $i++)
			echo "<td align=\"center\">".$i."</td>\n";
		echo "</tr>\n";
		for($j = 0; $j < $this->height; $j++){
			echo "<tr>\n<td>".$j."</td>\n";
			for($i = 0; $i < $this->width; $i++){
				echo "<td bgcolor=\"#".$this->color[$this->map[$j][$i]]."\" align=\"right\" valign=\"top\" width=\"".$this->tile_width."\" height=\"".$this->tile_height."\">".$this->map[$j][$i]."</td>\n";
			}			
		echo "</tr>\n";
		}
		echo "</table>\n";
	}
	
	function print_map(){ 
		echo "<pre>";
		print_r($this->map);
		echo "</pre>";
	}
	
	function print_matrix(){
		echo "\$map = array(\n";
		for($j = 0; $j < $this->height; $j++){
			echo "array(";
			for($i = 0; $i < $this->width; $i++){
				echo "'".$this->map[$i][$j]."'";
				if($i < $this->width-1)
					echo ",";
			}
			echo")";
			if($j < $this->height-1)
				echo ",";
			echo"<br />\n";
		}
		echo ");";
	}
}


































