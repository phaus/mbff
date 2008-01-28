<?php
$filename="set_rdf.php";

require("./global.php");
if($wbbuserdata['canviewprofile']==0) access_error();
require("./acp/lib/class_parse.php");

if(!$wbbuserdata['userid']) eval("error(\"".$tpl->get("error_falselink")."\");");
else{
	
	if($_POST['boardset'])
		$boardset = $_POST['boardset']; 
	else
		$boardset = array();
	
	$boardselect = "<select size=\"6\" name=\"boardset[]\" multiple=\"multiple\">\n";

	if(in_array(-1 , $boardset) || sizeof($boardset) == 0)
			$select = 'selected = "selected"';
		else
			$select = '';
	$boardselect .= "<option value=\"-1\" ".$select.">show all</option>\n";
	$boardselect .= "<option>---------------------------------------------------------</option>\n";
	$sql = "SELECT boardid, title FROM `bb".$n."_boards` WHERE invisible = 0 AND isboard = 1 ORDER BY parentid ASC,  boardorder DESC";
	$result = $db->query($sql);
	while($board = $db->fetch_array($result)) {
		if(in_array($board['boardid'], $boardset))
			$select = 'selected = "selected"';
		else
			$select = '';
		$boardselect .= "<option value=\"".$board['boardid']."\" ".$select.">".$board['title']."</option>\n";
	}
	$boardselect .= "</select>\n";

	if($_POST['threadcount'])
		$threadcount = $_POST['threadcount']; 
	else
		$threadcount = 10;

	if($_POST['action'] == "setup"){
		$rdflink = $url2board."/rdf.php?bc=".$threadcount;
		if(!in_array(-1,$boardset))
			$rdflink .= "&bs=".implode(",", $boardset);
	}
	eval("\$tpl->output(\"".$tpl->get("set_rdf")."\");");
}
?>