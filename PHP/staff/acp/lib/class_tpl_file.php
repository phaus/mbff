<?php
class tpl {

 var $templates   = array();
 var $subvariablepackid = 0;
 var $templatefolder = "";

 /* constuctor */
 function tpl($templatepackid=0,$subvariablepackid=1,$prefix="") {
  $this->subvariablepackid = $subvariablepackid;
  $this->templatefolder = $prefix."templates";
 }

 /* get template */
 function get($templatename) {
  if(!isset($this->templates[$templatename])) {
   if(file_exists($this->templatefolder."/$templatename.tpl")) $this->templates[$templatename]=str_replace("\"","\\\"",implode("",file($this->templatefolder."/$templatename.tpl")));
  }
  return $this->templates[$templatename];
 }

 /* print template */
 function output($template) {
  headers::send();
  $template = $this->replacevars($template);
  print($template);
 }

 /* replace vars */
 function replacevars($template) {
  global $db, $n, $pmpopup, $PHP_SELF;

  $hash="";
  if(strstr($template,"<title>")) {

   $hash = md5(uniqid(microtime()));
   $x = strpos($template,"<title>");
   $y = strpos($template,"</title>");

   $temp = substr($template,$x,$y-$x+8);
   $template = substr($template,0,$x) . $hash . substr($template,$y+8);
  }

  $result = $db->query("SELECT variable,substitute FROM bb".$n."_subvariables WHERE subvariablepackid = '".$this->subvariablepackid."'");
  while($row = $db->fetch_array($result)) {
   switch($row['variable']) {
    case "<body": $template = $this->str_replace($row['variable'],$row['substitute'],$template); break;
    case "{css}": $template = $this->str_replace($row['variable'],$row['substitute'],$template); break;
    case "{cssfile}": $template = $this->str_replace($row['variable'],$row['substitute'],$template); break;
    case "{imagelogo}": $template = $this->str_replace($row['variable'],$row['substitute'],$template); break;
    case "{!DOCTYPE}": $template = $this->str_replace($row['variable'],$row['substitute'],$template); break;
    default: $template = str_replace($row['variable'],$row['substitute'],$template);
   }
  }

  if($hash!="") $template = str_replace($hash,$temp,$template);
  return $template;
 }

 function str_replace($search,$replace,$text) {
  if(strstr($text,$search)) {
   $x = strpos($text,$search);
   return substr($text,0,$x) . $replace . substr($text,$x+strlen($search));
  }
  else return $text;
 }
}
?>