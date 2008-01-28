<?php
##################################################################################
$modules = array("techtree");
$request = array();
$post = array();
##################################################################################
require("./session.php");

$tree = new c_techtree(1);
$tree->get_nodes();
//$content = array("name"=>"Handwerk", "duration"=>"24");
//$tree->add_node($content);
//$tree->print_data();
$tree->print_tree();
$tree->show_tree();
?>