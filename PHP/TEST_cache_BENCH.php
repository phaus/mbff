<?php
$sys_id = $_REQUEST['sys_id'];
$sys_id_end = 1012;
if(!$sys_id)$sys_id = 1;
?>
<html><head>
<title> System::
<?php echo $sys_id; ?>
</title>
</head><body>
<iframe width="800" height="500" src="map.php?sid=0009ab6a8640ce33fea9d92bc75c4ee8&sys_id=<?php echo $sys_id;?>"></iframe>
<?php
if($sys_id != $sys_id_end){
$sys_id++;
?>
<script type="text/javascript" language="javascript">
setTimeout('Redirect()',5000);
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