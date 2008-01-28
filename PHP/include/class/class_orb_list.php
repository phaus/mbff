<?php
class c_orb_list extends data_list {
	function c_orb_list($orb_list_id = ""){
		$this->db_level = "db_level2";
		$this->index_id = "value";
		$this->db_prefix = "orb_";
		return $this->data_list($orb_list_id);
	}	
}
?>