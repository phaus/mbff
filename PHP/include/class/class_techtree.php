<?php
class c_techtree extends data_tree{
	
	function c_techtree($tree_id = ""){
		$this->index_id = "techtree_id";
		$this->db_prefix = "techtree_";
		$this->data_tree($tree_id);	
	}
}
?>