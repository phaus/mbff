<?php
require("./acp/lib/config.inc.php");
require("./acp/lib/class_db_mysql.php");
require("./acp/lib/options.inc.php");
require("./acp/lib/functions.php");
require("./acp/lib/class_parse.php");
//require("./acp/lib/class_headers.php");
require("./acp/lib/class_tpl_file.php");
define("_imgfolder", "images");
$db = new db($sqlhost,$sqluser,$sqlpassword,$sqldb,$phpversion);
$parse = new parse($docensor, 75, 1, 1, 1, 1, 0);
$tpl = new tpl(0,intval(1));

if($_REQUEST["bs"])
	$bs = $_REQUEST["bs"];

if($_REQUEST["bc"])
	$bc = $_REQUEST["bc"];
else $bc = 10;

function parse_pre($string){
	$string = str_replace("[CODE]", "", $string);
	$string = str_replace("[/CODE]", "", $string);
	$string = str_replace("[QUOTE]", "", $string);
	$string = str_replace("[/QUOTE]", "", $string);
	$string = str_replace("<normalfont>", "", $string);
	$string = str_replace("<smallfont>", "", $string);
	$string = str_replace("&", "und", $string);
	//$string = htmlentities($string);
	return $string;
}
function parse_post($string){
	global $url2board;
	$string = str_replace("{imagefolder}", $url2board."/"._imgfolder, $string);
	$string = str_replace("border=0>", "border=\"0\" />", $string);
	$string = str_replace("cellpadding=4 cellspacing=1", "cellpadding=\"4\" cellspacing=\"1\"", $string);
	$string = str_replace("{tableinbordercolor}", "#000000", $string);
	$string = str_replace("{inposttablecolor}", "#eeeeee", $string);
	return $string;
}


	$sql = "SELECT p.threadid, p.userid, p.username, p.posttime, t.topic, p.message 
			FROM bb".$n."_posts p,bb".$n."_threads t, bb".$n."_boards b
			WHERE b.invisible = 0 AND b.boardid = t.boardid ";
	
	if($bs != ""){
	$sql .=	"AND t.boardid IN (".$bs.") 
			AND p.threadid=t.threadid 
			ORDER BY p.posttime DESC 
			LIMIT 0,".$bc." ";
	}else{
	$sql .=	"AND p.threadid=t.threadid 
			ORDER BY p.posttime DESC 
			LIMIT 0,".$bc." ";	
	}
	$result = $db->query($sql);

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>
<rss version=\"2.0\">";



echo "<channel>
<title>".$master_board_name; if($bs != "")echo " (Foren: ".$bs.")"; echo"</title>
<link>".$url2board."</link>
<description></description>
<language>de-de</language>
<copyright>".date("Y")." ".$master_board_name."</copyright>
<image>
<url>".$url2board."/images/icons/eye.gif</url>
<title>".$master_board_name." Neuigkeiten</title>
<link>".$url2board."</link>
</image>";


while ($row = $db->fetch_array($result)){
	$mes = $parse->doparse(parse_pre(substr($row['message'], 0, 200)."... "),1, 1 ,1 ,1);
	echo"
	<item>
	<title>".$row['username'].": ".$row['topic']."</title>
	<link>".$url2board."/thread.php?threadid=".$row['threadid']."</link>
	<description>".parse_post($mes)."</description>
	<pubDate>".date("D, j M Y G:i:s O",$row["posttime"])."</pubDate>
	</item>
	";
}

echo "</channel></rss>";

?>