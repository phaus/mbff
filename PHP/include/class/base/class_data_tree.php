<?php
	class data_node extends data{
		function data_node($node_id = "", $preefix = "node_", $db_level = "db_level1"){
			$this->index_id = $preefix."id";
			$this->db_prefix = $preefix;
			$this->db_level = $db_level;
			return $this->data($node_id);
		}
		
		function add($node_array){
			foreach($node_array as $key => $part)
				$this->set_entry($key, $part);	
			$this->save_data();
		}
	
	}
	
	class data_tree{
		var $class_db = "";
		var $db_prefix = "";
		var $db_level = "db_level1";
		var $data_tree_id = "";
		
		var $data_status = array();	
		var $tree = array();
		var $data = array();
		
		function data_tree($data_tree_id = ""){
			global $sys_conf;
			if(_debug)
				global $_debug;
			
			$this->class_db = new db($sys_conf[$this->db_level]['host'], $sys_conf[$this->db_level]['user'], $sys_conf[$this->db_level]['pass'], $sys_conf[$this->db_level]['name'],$phpversion);
			
			if(!$data_tree_id || $data_tree_id == ""){
				$this->data_tree_id = getnewid($this->class_db, $this->db_prefix."table", $this->index_id, "WHERE category = '".$this->db_prefix."tree' ");
			}else{
				$this->data_tree_id = $data_tree_id;			
			}
		}
		
		function get_nodes($parent_id = ""){
			if($parent_id == "")
				$parent_id = $this->data_tree_id;
			$sql = "SELECT ".$this->db_prefix."id AS id 
					FROM ".$this->db_prefix."table
					WHERE category = '".$this->db_prefix."tree' 
					AND value = '".$parent_id."' ";			
			$result = $this->class_db->query($sql);
			while($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
				$this->data_status[$row['id']] = 1;
				$temp[] = $this->get_nodes($row['id']);	
			}
			
			if(sizeof($temp) > 0){
				if($parent_id == $this->data_tree_id){
					$this->tree = $temp;
				}else{
					return $temp;
				print_r($temp);		
				}
			}else{
				return $parent_id;
			}
		}

		function show_tree($trees = ""){
			$root = false;
			if($trees == ""){
				$trees = $this->tree;
				$root = true;
			}	
			
			foreach($trees as $key => $tree){
				echo "<br />NODE";
				echo "[".$key."]"; 
				if(is_array($tree)){		
					$this->show_tree($tree);
				}else{
					echo "[".$tree."]";
				}
			}						
		}
					
		function add_node($node_array = "", $node_id = ""){
			if($node_id == "")
				$node_id = $this->data_tree_id;
			
			if($node_array == "")
				$node_array = array();
				
			$node_array[$this->db_prefix."tree"] = $node_id;
			$temp = new data_node("", $this->db_prefix);
			$temp->add($node_array);
		}
		
		function print_data(){ 
			echo "<pre>";
			print_r($this->data);
			echo "</pre>";
		}

		function print_tree(){ 
			echo "<pre>";
			print_r($this->tree);
			echo "</pre>";
		}	
		
		function get_id(){
			return $this->data_tree_id;
		}
	}
?>