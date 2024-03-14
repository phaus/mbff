<?php
##################################################################################
$modules = array("user", "system", "caching");
$request = array();
$post = array();
##################################################################################
require("./session.php");

	$test_user = new c_user();
	$test_user->set_entry("user_name", "Amun");
	$test_user->set_entry("password", md5("password"));
	$test_user->set_entry("email", "Amun@hausswolff.de");
	if($test_user->new_user()){
		$test_user->print_data();
		$test_user->set_activ();
	}
?>