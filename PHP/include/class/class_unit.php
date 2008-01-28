<?php
class c_unit extends data {

	function c_unit($unit_id = ""){
		$this->base_data = array('unit_id', 'unit_name', 'date', 'activ');
		$this->db_level = "db_level3";
		$this->index_id = "unit_id";
		$this->db_prefix = "unit_";
		return $this->data($unit_id);
	}
	
	function set_activ(){
		$sql = "UPDATE `".$this->db_prefix."index`
				SET activ = 0
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);
	}
	
	//bewegt eine einheit auf neue position
	//$new_location(x, y, z, map)
	function move(){
		if(is_array($new_location))
			foreach($new_location as $key => $part)
				$this->data['location'][$key] = $part;
	}
	
	function new_unit(){
		$string = strtoupper(substr(getnewsid(),0,10));
		$sql = "SELECT unit_id 
				FROM `".$this->db_prefix."index` 
				WHERE unit_name = '".$this->data['unit_name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			return false;
		}else{
			$sql = "INSERT INTO `".$this->db_prefix."index`
					(".$this->index_id.", unit_name, date, activ)
					VALUES
					('".$this->data_id."', '".$this->data['unit_name']."', '".time()."', '".$string."')";	
			$this->class_db->unbuffered_query($sql);
		}
		$this->class_db->free_result($result);
	}
}
?>