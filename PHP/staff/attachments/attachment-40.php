<?php
require("./include/class/class_formular.php");
$options = array("ja", "eher ja", "eher nein", "nein", "weiß nicht");

$form = new c_formular();
$form->add_hidden_field("sid", md5(microtime()));
$form->add_pool("mana", 100, "Manapool", "", "", true);
$form->add_pool("exp", 23432423, "", "", "", false);
$form->add_plusminus_field("", 10, "Test1", "", 5, 20);
$form->add_plusminus_field("", 20, "Test2", "", 5, 40, "exp");
$form->add_select_field("", $options, "", "Bewertung", "", 4, true);
$form->add_radio_field("", $options, 3, "Stimmen Sie überein ?", "");
$form->add_textarea("", "TEST.......", "TXT TEST", "", 4, 40, true, false);
$form->add_textarea("", "TEST.......", "TXT TEST", "", 4, 40, false, false);
$form->add_textarea("", "", "Story", "", 4, 40, false, true);
$form->add_pass_field("", "", "Passwort:", "Das Passwort bitte gut aufbewahren !");
$form->add_file_upload("", "Userbild", "");
$form->add_reset_button();
$form->add_submit_button();
//$form->show_class();
$form->build_form();
$form->show_form();

?>