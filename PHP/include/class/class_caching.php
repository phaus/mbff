<?php
class c_caching {
	
	var $caf_contents = "";
	var $filename = "";
	
	function c_caching($cache_name = "dummy"){
		global $sys_conf;
		$this->filename = $sys_conf['cache_folder']."/html/".$cache_name."_".$sys_conf['usr_lvl'].".html";
		if(file_exists($this->filename)){
			if(is_readable($this->filename)){
				$handle = fopen ($this->filename, "r");
				$this->caf_contents = fread ($handle, filesize ($this->filename));
				fclose ($handle);
			}
		}
	}

	function is_exist(){
		if(file_exists($this->filename) && filesize ($this->filename) > 0)
			return true;
		else
			return false;
	}
	
	function delete(){
		if(unlink($this->filename))
			return true;
		else
			return false;
	}
	
	function replace($string){
		global $sid, $sys_conf, $hp;
		foreach($sys_conf as $key => $part)
			$string = str_replace('{SYS_CONF:'.$key.'}', '$sys_conf['.$key.']', $string);
		foreach($hp as $key => $part)
			$string = str_replace('{HP:'.$key.'}', '$hp['.$key.']', $string);			
		$string = str_replace($sid, '$sid', $string);
		$string = str_replace("\r\n", "\n", $string);
		return $string;
	}
	
	function build_caf($cache_name = "dummy", $cache_content = "", $write = true){
		global $sys_conf;
		if(_debug){
			global $_debug;
			$_debug->add("<b>CACHING:</b> ".$cache_name."_".$sys_conf['usr_lvl'].".html");
		}
		//$this->filename = $sys_conf['cache_folder']."/tpls/".$cache_name."_".$sys_conf['usr_lvl'].".html";
		$this->caf_contents = $this->replace($cache_content);
		if($write)
		if($handle = @fopen ($this->filename, "w")){
			if(fwrite($handle,  $this->caf_contents))
		 		return true;
			else
				return false;
			fclose ($handle);
		}
	}

	function get_content($hp = ""){
		return  str_replace("\"","\\\"",$this->caf_contents);
	}
	
	function output($hp = ""){
		echo $this->caf_contents;
	}
}
?>