<?php
require("./include/base_functions.php");

require("./session.php");
require("./include/class/class_system.php");



$sol_system = new c_system();
$sol_system->data['location']['x'] = 1345;
$sol_system->data['location']['y'] = 100;
$sol_system->data['location']['z'] = 0;
$sol_system->data['system_name'] = "Mars System";
$sol_system->new_system();
$sol_system->save_data();

?>
<pre>
<?
$sol_system->print_data();
?>
</pre>
<?

$sol_system = new c_system("1");
$sol_system->data['location']['x'] = 1345;
$sol_system->data['location']['y'] = 100;
$sol_system->data['location']['z'] = 200;
$sol_system->data['system_name'] = "Sol System";
$sol_system->save_data();

//$system['string'] = serialize($system['koords']);
//echo $system['string']."<br />";
//echo strlen($system['string']);
/*
for($i = 5; $i < 26; $i++){
	$user = new c_user();
	$user->add_entry("username", $i);
	$user->add_entry("password", md5($i));
	$user->add_entry("email", $i."@hausswolff.de");		
	$user->data["title"] = $i.". User";
	$user->new_user();
	$user->save_data();
}
*/
?>




