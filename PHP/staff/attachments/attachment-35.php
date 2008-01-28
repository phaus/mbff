<?php
class c_formular {
	var $name;
	var $action;
	var $method;
	var $enctype;
	
	var $tbl_width;
	var $is_reset = false;

	var $pool_fields = array();
	var $reset_fields = array();
	var $input_fields = array();
	var $hidden_fields = array();

	var $content;
	
	function c_formular($name = "", $method = "post", $action = "", $enctype = ""){
		if($name == "")	
			$this->name = "formular";
		else
			$this->name = $name;		
		
		$this->method = $method;		
		
		if($action != "")
			$this->action = $action;
		if($enctype != "")
			$this->enctype = $enctype;
	}

	function add_pool($name = "", $value = "", $title = "", $descr = "", $size = "", $visible = true){
		if($visible){
			if($name == "")
				$name = $this->feld_name("input");
			if($size == "")
				$size = 3;
			$input['type'] = "input";

			$input['name'] = $name;
			$input['value'] = $value;
			$input['size'] = $size;
			$input['title'] = $title;
			$input['descr'] = $descr;
			$input['readonly'] = 'readonly = "readonly"';

			$this->input_fields[] = $input;
		}else{
			if($name == "")
				$name = $this->feld_name("hidden");
			$input['type'] = "hidden";
			$input['name'] = $name;
			$input['value'] = $value;
			$this->hidden_fields[] = $input;
		}
		$pool_fields[] = $input['name'];
	}
	
	function add_hidden_field($name = "", $value = ""){
		$input['type'] = "hidden";
		if($name == "")
			$name = $this->feld_name("hidden");
		$input['name'] = $name;
		$input['value'] = $value;
		$this->hidden_fields[] = $input;
	}
		
	function add_input_field($name = "", $value = "", $title = "", $descr = "", $size = 20, $maxsize = 100, $readonly = false){
		$input['type'] = "text";
		if($name == "")
			$name = $this->feld_name("input");
		
		$input['name'] = $name;
		$input['size'] = $size;
		$input['maxsize'] = $maxsize;	
		$input['value'] = $value;

		$input['title'] = $title;
		$input['descr'] = $descr;

		if($readonly)
			$input['readonly'] = 'readonly = "readonly"';
			
		$this->input_fields[] = $input;
	}
	
	function add_textarea($name = "", $value = "", $title = "", $descr = "", $rows = 4, $cols = 40, $readonly = false, $count = false){
		$input['type'] = "textarea";
		if($name == "")
			$name = $this->feld_name("input");
		
		$input['name'] = $name;
		$input['value'] = $value;
		$input['rows'] = $rows;
		$input['cols'] = $cols;
		$input['count'] = $count;	
		$input['title'] = $title;
		$input['descr'] = $descr;

		if($readonly)
			$input['readonly'] = 'readonly = "readonly"';

		$this->input_fields[] = $input;
	}
	
	function add_pass_field($name = "", $value = "", $title = "", $descr = "", $size = 20, $maxlenght = 100){
		$input['type'] = "password";
		if($name == "")
			$name = $this->feld_name("input");
			
		$input['name'] = $name;
		$input['size'] = $size;
		$input['maxlenght'] = $maxlenght;	
		$input['value'] = $value;
		$input['title'] = $title;
		$input['descr'] = $descr;

		$this->input_fields[] = $input;
	}

	function add_submit_button($name = "submit", $value = "senden"){
		$input['type'] = "submit";
		$input['name'] = $name;
		$input['value'] = $value;
		$this->input_fields[] = $input;
	}

	function add_reset_button($name = "reset", $value = "abbrechen"){
		$input['type'] = "reset";
		$input['name'] = $name;
		$input['value'] = $value;
		$this->input_fields[] = $input;
	}
	
	function add_radio_field($name = "", $options_array = "", $checked = "", $title = "", $descr = ""){
		$i = 0;
		$input['type'] = "radio";
		if($options_array == "" || !is_array($options_array))
			$options_array = array();
			
		foreach($options_array as $key => $part){
			$input['options'][$i]['label'] = $part;
			$input['options'][$i]['value'] = $key+1;
			if($input['options'][$i]['value'] == $checked)
				$input['options'][$i]['checked'] = 'checked="checked"';
			$i++;
		}

		if($name == "")
			$name = $this->feld_name("input");
		
		$input['name'] = $name;
		$input['size'] = $size; 

		if($title != "")
			$input['title'] = $title;

		if($descr != "")
			$input['descr'] = $descr;

		$this->input_fields[] = $input;	
	}
	
	function add_select_field($name = "", $options_array = "", $selected_array = "", $title = "", $descr = "", $size = 1, $multi = false){
		$i = 0;
		$input['type'] = "select";
		if($options_array == "" || !is_array($options_array))
			$options_array = array();
		if($selected_array == "" || !is_array($selected_array))	
			$selected_array = array();
			
		foreach($options_array as $key => $part){
			$input['options'][$i]['label'] = $part;
			$input['options'][$i]['value'] = $key+1;
			if(in_array($input['options'][$i]['value'], $selected_array))
				$input['options'][$i]['selected'] = 'selected = "selected"';
			$i++;
		}

		if($name == "")
			$name = $this->feld_name("input");
		if($multi){
			$input['name'] = $name."[]";
			$input['multiple'] = "multiple";
		}else{
			$input['name'] = $name;
		}
		$input['size'] = $size; 

		if($title != "")
			$input['title'] = $title;

		if($descr != "")
			$input['descr'] = $descr;

		$this->input_fields[] = $input;
	}

	function build_form(){
		$content = "<form name=\"".$this->name."\" method=\"".$this->method."\" action=\"".$this->action."\" enctype=\"".$this->enctype."\">\n\r";
		for($i = 0; $i < sizeof($this->hidden_fields); $i++){
			$content .= "<input type=\"hidden\" name=\"".$this->hidden_fields[$i]['name']."\" value=\"".$this->hidden_fields[$i]['value']."\" />\n\r";		
		}
		$content .= "<table ".$this->tbl_width.">\n\r";
		$content .= "<tr>\n\r\t<td width=\"10\"></td><td><!--\n\r Form ".$this->name." generiert:\n\r am: ".date("d.m.Y, H:i")."\n\r von: ".getenv("REQUEST_URI")."\n\r --></td>\n\r</tr>\n\r";
		for($i = 0; $i < sizeof($this->input_fields); $i++){
			$input = $this->input_fields[$i];
			$type = $input['type'];
			
			switch($type){
			case"radio":
				$content .="<tr>\n\r\t<td nowrap valign = \"top\">".$input['title']."</td>\n\t<td>\n\r";
					if(is_array($input['options']))
						foreach($input['options'] as $part){
							$content .= "\t\t<input type=\"radio\" name=\"".$input['name']."\" value=\"".$part['value']."\" ".$part['checked']." />&nbsp;".$part['label']."<br  />\n\r";
						}
				$content .= "</td>\n\r</tr>\n\r";
				break;
				
			case"select":
				$content .="<tr>\n\r\t<td nowrap valign = \"top\">".$input['title']."</td>\n\t<td>\n\r";
				$content .= "<select name=\"".$input['name']."\" size=\"".$input['size']."\" ".$input['multiple'].">\n\r";
					if(is_array($input['options']))
						foreach($input['options'] as $part){
							$content .= "\t\t<option value=\"".$part['value']."\" ".$part['selected'].">".$part['label']."</option>\n\r";
						}
				$content .= "\t</select>";				
				$content .= "</td>\n\r</tr>\n\r";
				break;
				
			case"reset":
				$this->is_reset = true;
				$this->reset_fields = $input;
				break;
			
			case"textarea":
				$content .= "<tr>\n\r\t<td nowrap valign = \"top\">".$input['title']."</td>\n\t<td><textarea cols=\"".$input['cols']."\" rows=\"".$input['rows']."\" name=\"".$input['name']."\" ".$input['readonly'].">".$input['value']."</textarea></td>\n\r</tr>\n\r";
				break;
				
			case"submit":
				$content .= "<tr>\n\r\t<td colspan=\"2\" align=\"right\">";
				if($this->is_reset && is_array($this->reset_fields))
					$content .="<input type=\"reset\" name=\"".$this->reset_fields['name']."\" value=\"".$this->reset_fields['value']."\" />";
				$content .="<input type=\"submit\" name=\"".$input['name']."\" value=\"".$input['value']."\" />";
				$content .="</td>\n\r</tr>\n\r";				
				break;
				
			default:
				$content .= "<tr>\n\r\t<td nowrap valign = \"top\">".$input['title']."</td>\n\t<td><input type=\"".$input['type']."\" name=\"".$input['name']."\" value=\"".$input['value']."\" size=\"".$input['size']."\" maxlenght=\"".$input['maxlenght']."\" ".$input['readonly']." /></td>\n\r</tr>\n\r";
			}
		}
		
		$content .= "</table>\n\r";
		$content .= "</form>\n\r";
		$this->content = $content;
	}

	function feld_name($field_type){
		$field = $field_type."_fields";
		$out = sizeof($this->$field)+1;
		return $field."_".$out;
	}
	
	function show_form(){
		echo $this->content;
	}
}
?>