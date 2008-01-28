<?php
class c_user extends data {

	function c_user($user_id = ""){
		$this->index_id = "user_id";
		$this->db_prefix = "user_";
		return $this->data($user_id);
	}
	
	function set_activ(){
		if($this->data_status["activ"] == 1){
			$this->set_entry("activ", 0);
			$this->save_data();
			return true;
		}else{
			return false;
		}
	}
		
	function new_user(){
		$string = strtoupper(substr(getnewsid(),0,10));
		
		//Überprüfe ob User mit Namen schon vorhanden ist
		$sql = "SELECT * 
				FROM `".$this->db_prefix."table` 
				WHERE category = '".$this->db_prefix."name'
				AND value = '".$this->data[$this->db_prefix.'name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			$this->class_db->free_result($result);			
			return false;
		}else{			
			$this->set_entry("activ", $string);
			$this->save_data();
			$this->get_data();
			$this->class_db->free_result($result);			
			return true;
		}	
	}
}
?>