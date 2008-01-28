<?php
class data_list{
	var $class_db = "";
	var $db_prefix = "";
	var $db_level = "db_level1";
	var $data_list_id = "";
	var $ddata_ids = "";
	
	var $db_filter = array();
	var $data = array();
	var $fields = array();
		
	function data_list($data_list_id = ""){
		global $sys_conf;
		if(_debug)
			global $_debug;
		
		$this->class_db = new db($sys_conf[$this->db_level]['host'], $sys_conf[$this->db_level]['user'], $sys_conf[$this->db_level]['pass'], $sys_conf[$this->db_level]['name'],$phpversion);

		if(!$data_list_id || $data_list_id == ""){
			$this->data_list_id = getnewid($this->class_db, $this->db_prefix."table", $this->index_id, "WHERE category = '".$this->db_prefix."liste' ");
			if(_debug)
				$_debug->add("<b>".$this->db_prefix."LISTE: </b> ID ".$this->data_list_id." erstellt.");
		}else{
			$this->data_list_id = $data_list_id;
			if(_debug)
				if($data_list_id == "*")
					$_debug->add("<b>".$this->db_prefix."GESAMTLISTE: </b> geöffnet.");
				else					
					$_debug->add("<b>".$this->db_prefix."LISTE: </b> ID ".$this->data_list_id." geöffnet.");
		}
		return $this->data_list_id;
	}
	
	function add_filter($cat = "", $value = ""){
		if($cat != "" && $value != ""){
			$this->db_filter[$cat] = $value;
		}
		$this->data = array();
	}

	function build_data_ids(){
		$i = 0;
		$feed = "";
		foreach($this->data as $key=>$data){
			$feed .= $key;
			if($i++ < sizeof($this->data)-1)
				$feed .= ", ";
		}
		$this->data_ids = $feed;
	}
	
	function load(){
		$sql = "SELECT ".$this->db_prefix."id 
				FROM ".$this->db_prefix."table ";
		if(sizeof($this->db_filter) > 0){
			$sql.=" WHERE "; 
			foreach($this->db_filter as $key => $value){
				$sql .= "(category = '".$key."' AND value = '".$value."') OR ";
			}

			if($this->data_list_id != "*")
			$sql .= "category = '".$this->db_prefix."liste' 
					AND value = ".$this->data_list_id." ";
			else
			$sql .= "0";
			$this->build_data_ids();
		}else{
			if($this->data_list_id != "*")
			$sql .= "WHERE category = '".$this->db_prefix."liste' 
					AND value = ".$this->data_list_id." ";
		}

		$result = $this->class_db->query($sql);
		while($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
			$this->data[$row[$this->db_prefix."id"]] = $row;
		}
		
		$this->class_db->free_result($result);
	}

	function get_all_nodes($fields = ""){
		$this->load();
		if($fields != "")
			$this->fields = $fields;
		
		$sql = "SELECT * 
				FROM `".$this->db_prefix."table` 
				WHERE (0 ";
		foreach($this->fields as $field)
			$sql .= " OR category = '".$field."' ";
		
		$sql .= ")"; 
		if($this->data_ids != "")
			$sql .= "AND ".$this->db_prefix."id IN (".$this->data_ids.") ";	
		
		$result = $this->class_db->query($sql);
		
		while($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
			$this->data[$row[$this->db_prefix."id"]][$row['category']] = $row['value'];
		}
		$this->class_db->free_result($result);
	}

	function return_data_array(){
		$array = array();
		foreach($this->data as $key => $part){
			$array[$key] = $part;
		}
		return $array;
	}
		
	function showclass(){
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}
	
	function print_data(){ 
		echo "<pre>";
		print_r($this->data);
		echo "</pre>";
	}
	
	
	function get_id(){
		return $this->data_list_id;
	}

}
?>