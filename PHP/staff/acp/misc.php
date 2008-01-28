<?php
require("./global.php");
isAdmin(-1);

if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
else $action="";

if($action=="slice") {
 eval("print(\"".gettemplate("slice")."\");");
 exit();
}

isAdmin();
if($action=="menue") {
 $result=$db->query("SELECT optiongroupid, title FROM bb".$n."_optiongroups ORDER BY showorder ASC");
 $optiongroupbit="";
 while($row=$db->fetch_array($result)) $optiongroupbit.="<b>»</b> ".makehreftag("options.php?sid=$session[hash]&action=edit&optiongroupid=$row[optiongroupid]",$row[title],"main")."<br>";
 
 eval("print(\"".gettemplate("menue")."\");");
}
if($action=="logo") eval("print(\"".gettemplate("logo")."\");");
if($action=="top") eval("print(\"".gettemplate("top")."\");");
if($action=="working") eval("print(\"".gettemplate("working")."\");");
?>
