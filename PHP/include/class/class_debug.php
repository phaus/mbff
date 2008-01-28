<?php
class c_debug {
	var $debug_id = "";
	var $filename = "";
	var $handle = "";
	var $version = "";
	var $app = "";
	var $UID = 0;
	function c_debug(){
		global $sys_conf;
		$this->filename = $sys_conf['path_tmp']."/debug_".date("Y_m_j").".log";
		$this->version = $sys_conf['version'];
		$this->app = $sys_conf['title'];
		if(file_exists($this->filename)){
			if(is_readable($this->filename)){
				$this->handle = fopen ($this->filename, "r");
			}
		}else{
			$this->handle = @fopen ($this->filename, "w");
			fclose ($this->handle);
			$this->add(date("Y_m_j")." ".$this->app." ".$this->version." LOGGING START");
		}
	}
	
	function setUID($user_id = -1){
		$this->UID = $user_id;
	}
	function add($entry = ""){
		$this->handle = @fopen ($this->filename, "a");
		$entry = str_replace("\n", "", $entry);
		$entry = str_replace("\r", "", $entry);
		fwrite($this->handle, date("H:i:s")."/U".$this->UID.": ".$entry."\n");
		fclose($this->handle);		
	}
	
	function show_name(){
		return "DEBUG: ".date("Y_m_j")."<hr />\n";
	}
	
	function show($count = 100, $header = "", $footer = ""){
		$index = file($this->filename);
		$size = sizeof($index);
		if($count > $size) $count = $size;
		$end = $size - $count - 1;
		
		$zerocount = strlen($size);
		
		echo "<html><head><title>".$this->app." ".$this->version."::DEBUG: ".date("Y_m_j")."</title></head><body style=\"background-color:#000000; color:#eeeeee;\" >";
		krsort($index);
		echo $header;
		echo "<table style=\"font-size: 11px;\">";
		
		for($i = $size-1; $i > $end; $i--){
			echo "<tr><td style=\"color: #000000; background-color:#dddddd;\">".sprintf("%0".$zerocount."d",$i+1).":</td><td nowrap> ".$index[$i]."</td></tr>";
		}
		echo "</table>\n";
		echo "<hr /><table width=\"100%\"><tr><td>Log Größe insegesamt: ".$size."</td><td align=\"right\">".$footer."</td></tr></table><hr />";
		echo "</body></html>";
	}
}
?>