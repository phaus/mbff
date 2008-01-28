<?php
global $hp;
$hp['class'][] = "data";
class data{
	var $class_db = "";
	var $db_prefix = "";
	var $db_level = "db_level1";

	var $data_id = 0;
	var $index_id = "";

	var $data = array();	
	var $data_status = array();
	
	var $base_data = array();
	var $sys_conf;
	
	function data($data_id = ""){
		global $sys_conf;

		$this->class_db = new db($sys_conf[$this->db_level]['host'], $sys_conf[$this->db_level]['user'], $sys_conf[$this->db_level]['pass'], $sys_conf[$this->db_level]['name'],$phpversion);

		if(!$data_id || $data_id == ""){
			$this->data_id = getnewid($this->class_db, $this->db_prefix."index", $this->index_id);
		}else {
			$this->data_id = $data_id;
			$this->get_data();
		}
		return $this->data_id;
	}
	
	function get_data_array($key){
		$this->data[$key] = unserialize($this->data[$key]);
		return $this->data[$key];
	}
	
	function return_data_array(){
		$array = array();
		foreach($this->data as $key => $part){
			$array[$key] = $part;
		}
		return $array;
	}

	//gibt anhand eines Arrays mit Schlüsseln ein gefiltertes array zurück
	function return_perm_data_array($perm_array = ""){
		if($perm_array == "")$perm_array = array();
		$array = array();
		foreach($this->data as $key => $part){
			if($perm_array[$key] == 1  ||  $this->status[$key] == 2 || in_array($key, $this->base_data))
				$array[$key] = $part;
		}
		return $array;
	}
	
	function get_data_keys(){
		$array = array();
		foreach($this->data as $key => $part){
			if($key != "username" && $key != "password" && $key != "user_id" && $key != "activ")
				$array[] = $key;
		}
		return $array;	
	}
	
	function get_data(){	
	
		//Grunddaten laden
		$sql = "SELECT * 
				FROM `".$this->db_prefix."index` 
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$result = $this->class_db->query($sql);
		if($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
			$this->data = $row;
		}
		
		//erweiterte Daten
		$sql = "SELECT	value, category
				FROM `".$this->db_prefix."link`
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$result = $this->class_db->query($sql);
		while($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
			$this->data[$row['category']] = $row['value'];
			$this->data_status[$row['category']] = 1;
		}
		
		$this->class_db->free_result($result);
	}	

	function save_data(){

		foreach($this->data as $key => $part){
			if(!in_array($key, $this->base_data) && $this->data_status[$key] != 1){
				if(is_array($part)){
					$part = serialize($part);
				}

				if($this->data_status[$key] == 3){
					$sql = "UPDATE `".$this->db_prefix."link` 
							SET value = '".$part."'
							WHERE ".$this->index_id." =  ".$this->data_id." 
							AND category = '".$key."' ";
					$this->class_db->unbuffered_query($sql);
				}
				if($this->data_status[$key] == 2){				
					$sql = "INSERT INTO `".$this->db_prefix."link` 
							(category, value, ".$this->index_id.")
							VALUES
							('".$key."', '".$part."', '".$this->data_id."')";
					$this->class_db->unbuffered_query($sql);
				}
			}
		}
		$this->class_db->free_result($result);
	}
		
	function delete(){
		$sql = "DELETE FROM `".$this->db_prefix."link`
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);

		$sql = "DELETE FROM `".$this->db_prefix."index`
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);	
	}
	
	function rem_entry($category){
		 $this->data_status[$category] = 1;
	}

	function set_entry($category, $value){

		$this->data[$category] = $value;

		//Eintrag vorhanden -> UpdateFlag
		if($this->data_status[$category] == 1)
			$this->data_status[$category] = 3;
		
		//Eintrag nicht vorhanden -> InsertFlag
		if(!$this->data_status[$category])
			$this->data_status[$category] = 2;
	}

	function print_data(){
		echo "<pre>";
		print_r($this->data);
		echo "</pre>";
	}

	function showclass(){
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}
	
	function get_id(){
		return $this->data_id;
	}

}
?>