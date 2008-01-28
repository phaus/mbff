<?php
class c_system_list extends data_list {
	function c_system_list($system_list_id = ""){
		$this->index_id = "value";
		$this->db_prefix = "system_";
		return $this->data_list($system_list_id);
	}	
}
?>