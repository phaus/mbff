<?php
$sys_id = $_REQUEST['sys_id'];
$sys_id_end = 230;
if(!$sys_id)$sys_id = 1;
?>
<html><head>
<title> System::
<?php echo $sys_id; ?>
</title>
</head><body>
<iframe width="100%" height="100%" src="system_build.php?sid=2d7ace9243bc8a555e57b108e32282c4&sys_id=<?php echo $sys_id;?>#debug"></iframe>
<?php
if($sys_id != $sys_id_end){
$sys_id++;
?>
<script type="text/javascript" language="javascript">
setTimeout('Redirect()',1500);
function Redirect()
{
<?php	
	echo "window.location=\"".$PHP_SELF."?sys_id=".$sys_id."\";\n";
?>
}
	
</script>
<?php
}
?>
</body></html>