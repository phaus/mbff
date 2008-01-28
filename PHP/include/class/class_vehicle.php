<?php
global $hp;
$hp['class'][] = "c_vehicle";
class c_vehicle extends data {

	function c_vehicle($vehicle_id = ""){
		$this->base_data = array('vehicle_id', 'vehicle_name', 'date', 'activ');
		$this->db_level = "db_level3";
		$this->index_id = "vehicle_id";
		$this->db_prefix = "vehicle_";
		return $this->data($vehicle_id);
	}
	
	function set_activ(){
		$sql = "UPDATE `".$this->db_prefix."index`
				SET activ = 0
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);
	}
	
	function new_vehicle(){
		$string = strtoupper(substr(getnewsid(),0,10));
		$sql = "SELECT vehicle_id 
				FROM `".$this->db_prefix."index` 
				WHERE vehicle_name = '".$this->data['vehicle_name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			return false;
		}else{
			$sql = "INSERT INTO `".$this->db_prefix."index`
					(".$this->index_id.", vehicle_name, date, activ)
					VALUES
					('".$this->data_id."', '".$this->data['vehicle_name']."', '".time()."', '".$string."')";	
			$this->class_db->unbuffered_query($sql);
		}
		$this->class_db->free_result($result);
	}
}
?>