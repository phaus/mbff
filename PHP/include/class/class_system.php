<?php
global $hp;
$hp['class'][] = "c_system";
class c_system extends data {
	var $class_db2 = "";
	var $db_prefix2 = "";
	var $index_id2 = "";
	var $db_level2 = "db_level2";

	function c_system($system_id = ""){
		//$this->base_data = array('system_id', 'system_name', 'system_location', 'date', 'activ');
		$this->index_id = "system_id";
		$this->db_prefix = "system_";
		return $this->data($system_id);
	}
	
	function get_base_date(){
//		//Grunddaten laden
//		$sql = "SELECT * 
//				FROM `".$this->db_prefix."index` 
//				WHERE ".$this->index_id." = '".$this->data_id."' ";
//		$result = $this->class_db->query($sql);
//		if($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
//			foreach($row as $key => $part)
//				if($key != 'system_location')
//					$this->data[$key] = $part;
//				else
//					$this->data[$key] = unserialize($part);
//		}	
	$this->get_data();
	}		

	function set_activ(){
		$this->set_entry("activ", 0);
		$this->save_data();
	}	
	
	function new_system(){
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
	
	function get_system_content(){
		global $sys_conf;
		$system_content = array();
//		$this->class_db2 = new db($sys_conf[$this->db_level2]['host'], $sys_conf[$this->db_level2]['user'], $sys_conf[$this->db_level2]['pass'], $sys_conf[$this->db_level2]['name'],$phpversion);
//		$this->index_id2 = "star_id";
//		$this->db_prefix2 = "star_";
//		$sql = "SELECT * 
//				FROM `".$this->db_prefix2."index` 
//				WHERE ".$this->db_prefix2."system_id = '".$this->data_id."' ";
//		$result = $this->class_db2->query($sql);
//		while($row = $this->class_db2->fetch_array($result, MYSQL_ASSOC)){
//			$loc = unserialize($row[$this->db_prefix2.'location']);
//			$system_content[$loc[0]][$loc[1]] = $row;
//			$system_content[$loc[0]][$loc[1]]['typ'] = "planet";		
//		}
		return $system_content;
	}
}
?>