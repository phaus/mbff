<?php
//Himmelskörper
class c_orb extends data {

	function c_orb($orb_id = ""){
		$this->db_level = "db_level2";
		$this->index_id = "orb_id";
		$this->db_prefix = "orb_";
		return $this->data($orb_id);
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
		
	function new_orb(){
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