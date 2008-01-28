<?php
##################################################################################
$modules = array("user", "orb", "orb_list");
$request = array();
$post = array();
##################################################################################
require("./session.php");

//$mond = new c_orb();
//$mond->set_entry("orb_name", "Erde");
//$mond->set_entry("size", 50);
//$mond->new_orb();
//$mond->print_data();

$sol_planets = new c_orb_list("*");
$sol_planets->get_all_nodes(array('orb_name'));
$sol_planets->print_data();
$sol_planets->add_filter("system_id", "138");
$sol_planets->get_all_nodes(array('orb_name'));
$sol_planets->print_data();
?>