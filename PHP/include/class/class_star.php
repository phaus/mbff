<?php
class c_star extends data {

	function c_star($star_id = ""){
		
		$this->base_data = array('star_id', 'star_system_id', 'star_typ', 'star_name', 'star_location', 'date', 'activ');
		$this->db_level = "db_level2";
		$this->index_id = "star_id";
		$this->db_prefix = "star_";
		return $this->data($star_id);
	}
	
	function set_activ(){
		$sql = "UPDATE `".$this->db_prefix."index`
				SET activ = 0
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);
	}
	
	function new_star(){
		$string = strtoupper(substr(getnewsid(),0,10));
		$sql = "SELECT star_id 
				FROM `".$this->db_prefix."index` 
				WHERE star_name = '".$this->data['star_name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			return false;
		}else{
			$sql = "INSERT INTO `".$this->db_prefix."index`
					(".$this->index_id.", star_system_id, star_typ, star_location, star_name, date, activ)
					VALUES
					('".$this->data_id."', '".$this->data['star_system_id']."', '".$this->data['star_typ']."', '".serialize($this->data['star_location'])."', '".$this->data['star_name']."', '".time()."', '".$string."')";	
			$this->class_db->unbuffered_query($sql);
		}
		$this->class_db->free_result($result);
	}
}
?>