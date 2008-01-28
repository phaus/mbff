<?php
/*
 * Created on 20.12.2005
 * @author Philipp Haußleiter
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
##################################################################################
$modules = array("user", "system", "system_list", "caching");
$funcs = array();
$request = array();
$post = array();
##################################################################################
require("./session.php");
$land_array = array(".", ",", ":", ";", "-", "*", "o", "0", "@");
/*
   . : very strong preference for water (value=8)
   , : strong preference for water (value=4)
   : : preference for water (value=2)
   ; : weak preference for water (value=1)
   - : don't care (value=0)
   * : weak preference for land (value=1)
   o : preference for land (value=2)
   O : strong preference for land (value=4)
   @ : very strong preference for land (value=8)
*/
global $rgb_activ;
	$rgb_activ = !empty($_POST['rgb_file']) ? $_POST['rgb_file'] : "Colors.rgb";
	$a = $_POST['a'] == 1 ? 1 : "";

function get_rgb($_CMD_PATH){
	$handle=opendir ($_CMD_PATH);
	echo "<table>";
	echo "<tr>";
	while (false !== ($file = readdir ($handle)))
	    if(substr($file,-4) == ".rgb"){
	    	echo "<td>";
	    	write_rgb($_CMD_PATH, $file);
			echo "</td>";
		}
	closedir($handle);
	echo "</tr>";
	echo "</table>";
}

function write_rgb($_CMD_PATH, $file){
	global $rgb_activ;
	if($file == $rgb_activ)
		$checked = 'checked=\"checked\"';
	echo "<div style=\"white-space:nowrap;\"><input $checked value=\"$file\" type=\"radio\" name=\"rgb_file\" />".substr($file,0,-4)."</div><hr />";
	$index = file($_CMD_PATH."/".$file);
	foreach($index as $line)
		echo "<div title=\"$line\" style=\"width: 50; height: 50; background-color: ".$line." \"></div>";
	echo "<hr />";
}

$_CMD_PATH = "./tools/bin";
$_DATA_PATH = "./tools/data";
$_EXT_PATH = "C:/Dokume~1/philipp/workspace/mbff/mbff_legacy/tools";

$num = md5(time());

for($y = 0; $y < 11; $y++){
	$seed .= rand(1, 9);
}

?>
<form action="planet_template.php" method="post">
<input type="hidden" name="sid" value ="<?php echo $sid; ?>" />
<table width="100%">
<tr>
<td colspan="2">
<fieldset>
<legend>Filename</legend>
<input name="filename" size="40" value="<?php echo $num; ?>" />
<input size="40" value="0.<?php echo $seed; ?>" />
<input type="checkbox" name="a" <?php if($a==1) echo 'checked="checked"'; ?> value="1" /> alter ?
<input type="submit" name="action" value="save" />
<?php

if($_POST['action'] == "save"){
	if($handle = fopen ($_CMD_PATH."/tmp.map", "w+")){
		if(fwrite($handle,  $_POST['seed']))
		fclose($handle);
//		echo "<blink>Speichere</blink>";
	}
	if($a == 1)
		$misc = "-a";

		$misc .= " -M ./tools/bin/".$rgb_activ;
		$string = "./tools/bin/planet ".$misc." -h 720 -w 1050 -s 0.".$seed." -B ";
		$filename = "s".$seed."_".$rgb_activ;
		$_COMMANDS[] = $string." -po -o ./tools/data/".$filename."_o.bmp";
		$_COMMANDS[] = $string." -pq -o ./tools/data/".$filename."_q.bmp";	
		$_COMMANDS[] = "./tools/bin/convert ./tools/data/".$filename."_q.bmp -resize 1080x720! –gravity center ./tools/data/".$filename."_q.png";
		$_COMMANDS[] = "./tools/bin/convert ./tools/data/".$filename."_o.bmp -transparent black -resize 50%  ./tools/data/".$filename."_o.gif";
		$_COMMANDS[] = "./tools/bin/convert ./tools/data/".$filename."_o.bmp -transparent black -resize 65x  ./tools/data/".$filename."_so.gif";
		foreach($_COMMANDS as $_COMMAND){
			$_COMMAND = str_replace("\n", " ", $_COMMAND);
			$_COMMAND = str_replace("/", "\\", $_COMMAND);
//			echo "<p><input name=\"CMD\" size=\"125\" value=\"".$_COMMAND."\" /></p>";
			echo passthru($_COMMAND);
		}
	$handle=opendir ("./tools/data/");
	while (false !== ($file = readdir ($handle)))
	    if(substr($file,-4) == ".bmp"){
				unlink("./tools/data/".$file);	
			}
	closedir($handle);
		
/*
 * planet -ps -s 0.3 -m 3 -L 30 -l 35 -G 10 -g 20 -w 320 -h 256 -o p.bmp
 * C:\DOKUME~1>C:\Dokume~1\philipp\workspace\mbff\mbff_legacy\tools\bin\planet.exe
-o C:\Dokume~1\philipp\workspace\mbff\mbff_legacy\tools\data\88da71fab3639ebc9ce
4743def8fabb7.bmp -B -M Mars.rgb
Cannot open Mars.rgb
 */
	
}
?>
</fieldset>
</td>
</tr>
<tr>
<td valign="top">
<fieldset>
<legend>Result</legend>
<?php	
if($_POST['action'] == "save"){
	echo "<p><img width=\"100%\" src=\"./tools/data/".$filename."_q.png\"/></p>";
	echo "<p><img src=\"./tools/data/".$filename."_o.gif\"/></p>";
}
?>
</fieldset>
</td>
<td valign="top">
<fieldset>
<legend>Color Map</legend>
<?php
get_rgb($_CMD_PATH);
?>
</fieldset>
</td>
</tr>
</table>
</form>