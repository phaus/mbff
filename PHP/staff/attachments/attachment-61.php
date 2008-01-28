<?php
##################################################################################
$modules = array("user", "formular");
$request = array();
$post = array();
##################################################################################
require("./session.php");

$ava_form = new c_formular("avatar", "post", $PHP_SELF);
$ava_form->add_hidden_field("action", "avatar_new_set");
$ava_form->add_hidden_field("sid", $sid);
$ava_form->add_input_field("name", "", "Name:");
$ava_form->add_submit_button("newava", "Avatar erstellen");

//Test bezüglich Pools und Plus/Minus
$ava_form->add_pool("exp", 90);
$ava_form->add_plusminus_field("str", 0, "Stärke", "", 0, 50, "exp");
$ava_form->add_plusminus_field("agi", 0, "Gewandtheit", "", 0, 50, "exp");
$ava_form->add_plusminus_field("cha", 0, "Charisma", "", 0, 50, "exp");
$ava_form->add_plusminus_field("intel", 0, "Intelligenz", "", 0, 50, "exp");
$ava_form->build_form();
//$ava_form->show_static_form();

//$ava_form->show_class();
echo $ava_form->show_form("avatar_new");
?>