<?php
class c_person extends data {

	function c_person($person_id = ""){
		
		$this->base_data = array('person_id', 'person_name', 'date', 'activ');
		$this->db_level = "db_level2";
		$this->index_id = "person_id";
		$this->db_prefix = "person_";
		return $this->data($person_id);
	}
	
	function set_activ(){
		$sql = "UPDATE `".$this->db_prefix."index`
				SET activ = 0
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);
	}
	
	function new_person(){
		$string = strtoupper(substr(getnewsid(),0,10));
		$sql = "SELECT person_id 
				FROM `".$this->db_prefix."index` 
				WHERE person_name = '".$this->data['person_name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			return false;
		}else{
			$sql = "INSERT INTO `".$this->db_prefix."index`
					(".$this->index_id.", person_name, date, activ)
					VALUES
					('".$this->data_id."', '".$this->data['person_name']."', '".time()."', '".$string."')";	
			$this->class_db->unbuffered_query($sql);
		}
		$this->class_db->free_result($result);
	}
}
?>