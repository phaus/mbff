<?php
class c_formular {
	private $name;
	private $action;
	private $method;
	private $enctype;
	
	private $main_js = "";
		
	private $css_fields = array();
	private $tbl_width;
	private $is_reset = false;

	private $pool_fields = array();
	private $pool_js = array();

	private $reset_fields = array();
	private $input_fields = array();
	private $hidden_fields = array();
	
	
	private $hp;	
	private $content;
	private $protected_names = array("int", "float", "value", "action");
	
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
		$this->css_field["button"]='class="button"';
		$this->css_field["input"]='class="input"';
		$this->css_field["formular"]='class="formular"';
	}

	function set_css($key, $value){
		$this->css_field[$key] = $value;
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
		$this->pool_fields[] = $input['name'];
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

	function add_file_upload($name = "", $title = "", $descr = ""){
		$input['type'] = "file";
		if($name == "")
			$name = $this->feld_name("input");
		
		$this->enctype = "multipart/form-data";	

		$input['name'] = $name;
		$input['title'] = $title;
		$input['descr'] = $descr;

		$this->input_fields[] = $input;	
	}
	
	function add_plusminus_field($name = "", $value = 10, $title = "", $descr = "", $min = 0, $max = 999, $pool = ""){
		$input['type'] = "plusminus";
		if($name == "")
			$name = $this->feld_name("input");

		if($pool == "")
			$pool = $this->pool_fields[0];
		
		$input['pool'] = $pool;
		$input['name'] = $name;
		$input['value'] = $value;
		$input['max'] = $max;	
		$input['min'] = $min;
		$input['title'] = $title;
		$input['descr'] = $descr;

		if($readonly)
			$input['readonly'] = 'readonly = "readonly"';
			
		$this->input_fields[] = $input;
	}
		
	function add_textarea($name = "", $value = "", $title = "", $descr = "", $rows = 4, $cols = 40, $readonly = false, $count = false, $count_limit = 5000){
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

		if($count){
			$input['count_limit'] = $count_limit;
			$this->main_js .= "function count_letters(field, countfield, limit){

countfield.value = field.value.length;
if(field.value.length < limit)
{
    countfield.style.backgroundColor=\"red\";
} else {
    countfield.style.backgroundColor=\"mediumspringgreen\";
}
}";
		}
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
				$input['options'][$i]['checked']='checked="checked"';
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

	function add_checkbox_field($name = "", $options_array = "", $checked = "", $title = "", $descr = ""){
		$i = 0;
		$input['type'] = "checkbox";
		if($options_array == "" || !is_array($options_array))
			$options_array = array();
			
		foreach($options_array as $key => $part){
			$input['options'][$i]['label'] = $part;
			$input['options'][$i]['value'] = $key+1;
			if(in_array($input['options'][$i]['label'], $checked))
				$input['options'][$i]['checked']='checked="checked"';
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
				$input['options'][$i]['selected']='selected = "selected"';
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
		
		//Setze Formulardaten
		$this->hp['form_name'] = $this->name;
		$this->hp['form_method'] = $this->method;
		$this->hp['form_action'] = $this->action;
		$this->hp['form_enctype'] = $this->enctype;
		
		//Erstelle Javascript 
		if($this->main_js != "")
			$this->hp['js'] = $this->main_js;	
		
		//versteckte Felder
		for($i = 0; $i < sizeof($this->hidden_fields); $i++)
			if(in_array($this->hidden_fields[$i]['name'], $this->pool_fields)){
				$this->build_pool_script($this->hidden_fields[$i]['name']);
				$hidden .= "<input type=\"hidden\" name=\"".$this->hidden_fields[$i]['name']."\" value=\"".$this->hidden_fields[$i]['value']."\" onfocus=\"blur()\" onchange=\"".$this->pool_js[$this->hidden_fields[$i]['name']]."\" />\n\r";		
			}else
				$hidden .= "<input type=\"hidden\" name=\"".$this->hidden_fields[$i]['name']."\" value=\"".$this->hidden_fields[$i]['value']."\" />\n\r";
		$this->hp['form_hidden'] = $hidden;
		
		//Formularfelder erstellen
		for($i = 0; $i < sizeof($this->input_fields); $i++){
			$input = $this->input_fields[$i];
			if(in_array($input['name'],$this->protected_names))
				die("Name ".$input['name']." (Feld ".$input['title'].") darf nicht verwendet werden !");		
			$type = $input['type'];
			$content = "";
			$this->hp[$input['name'].'_title'] = $input['title'];
			$this->hp[$input['name'].'_descr'] = $input['descr'];
			
			switch($type){
				case"radio":
					if(is_array($input['options']))
						foreach($input['options'] as $part)
							$content .= "<input ".$this->css_field["radio"]." type=\"radio\" name=\"".$input['name']."\" value=\"".$part['value']."\" ".$part['checked']." />&nbsp;".$part['label']."<br  />\n";
					$this->hp[$input['name']] = $content;
					break;
				case"checkbox":
					if(is_array($input['options']))
						foreach($input['options'] as $part)
							$content .= "<input ".$this->css_field["checkbox"]." type=\"checkbox\" name=\"".$input['name']."[]\" value=\"".$part['value']."\" ".$part['checked']." />&nbsp;".$part['label']."<br  />\n";
					$this->hp[$input['name']] = $content;
					break;	
				case"select":
					$content .= "<select ".$this->css_field["select"]." name=\"".$input['name']."\" size=\"".$input['size']."\" ".$input['multiple'].">\n";
					if(is_array($input['options']))
						foreach($input['options'] as $part)
							$content .= "\t\t<option value=\"".$part['value']."\" ".$part['selected'].">".$part['label']."</option>\n";
					$content .= "\t</select>";				
					$this->hp[$input['name']] = $content;
					break;
					
				case"reset":
					$this->is_reset = true;
					$this->reset_fields = $input;
					break;
				
				case"textarea":
					if($input['count']){
						$this->hp[$input['name']] = "<textarea ".$this->css_field["textarea"]." cols=\"".$input['cols']."\" rows=\"".$input['rows']."\" name=\"".$input['name']."\" ".$input['readonly']." onKeyDown=\"count_letters();\" onKeyUp=\"count_letters(".$this->name.".".$input['name'].",".$this->name.".".$input['name']."_count, ".$input['count_limit'].");\">".$input['value']."</textarea>\n";				
						$this->hp[$input['name'].'_counter'] = "<input ".$this->css_field["input"]." style=\"background: red;\" readonly=\"readonly\" type=\"text\" name=\"".$input['name']."_count\" size=\"4\" value=\"0\"> Zeichen gezählt.\n";
					}else{
						$this->hp[$input['name']] = "<textarea ".$this->css_field["textarea"]." cols=\"".$input['cols']."\" rows=\"".$input['rows']."\" name=\"".$input['name']."\" ".$input['readonly'].">".$input['value']."</textarea>\n";
					}
					break;
					
				case"submit":
					if($this->is_reset && is_array($this->reset_fields))
						$this->hp['reset'] = "<input ".$this->css_field["button"]." type=\"reset\" name=\"".$this->reset_fields['name']."\" value=\"".$this->reset_fields['value']."\" />\n";
					$this->hp['submit'] = "<input ".$this->css_field["button"]." type=\"submit\" name=\"".$input['name']."\" value=\"".$input['value']."\" />\n";
					break;
	
				case"plusminus":
					$content .= "<script language=\"JavaScript\" type=\"text/javascript\">if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true;</script>\n";
					$content .="<input name=\"range_sub".$input['name']."\" type=\"Button\" value=\"-\" onclick=\"if (".$this->name.".".$input['name'].".value > ".$input['min'].") { ".$this->name.".".$input['name'].".value--;{ ".$this->name.".".$input['pool'].".value++; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; ".$this->name.".range_add".$input['name'].".disabled = false; }\" OnDblClick=\"if (".$this->name.".".$input['name'].".value > ".$input['min'].") { ".$this->name.".".$input['name'].".value--;{ ".$this->name.".".$input['pool'].".value++; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; ".$this->name.".range_add".$input['name'].".disabled = false; }\" />\n";
					$content .="<input name=\"".$input['name']."\" type=\"text\" value=\"".$input['value']."\" size=\"3\" onfocus=\"blur()\" />\n\r";					
					$content .="<input name=\"range_add".$input['name']."\" type=\"Button\" value=\"+\" onclick=\"if (".$this->name.".".$input['name'].".value < ".$input['max']." && !(".$this->name.".".$input['pool'].".value == 0)) { ".$this->name.".".$input['name'].".value++; { ".$this->name.".".$input['pool'].".value--; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true; ".$this->name.".range_sub".$input['name'].".disabled = false; }\" ondblclick=\"if (".$this->name.".".$input['name'].".value < ".$input['max']." && !(".$this->name.".".$input['pool'].".value == 0)) {  ".$this->name.".".$input['name'].".value++; { ".$this->name.".".$input['pool'].".value--; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true; ".$this->name.".range_sub".$input['name'].".disabled = false; }\" />\n";
					$this->hp[$input['name']] = $content;
					break;
				case"file":
					$content .= "<input type=\"".$input['type']."\" name=\"".$input['name']."\" />\n";
					$this->hp[$input['name']] = $content;
					break;
				default:
					if(in_array($input['name'], $this->pool_fields)){
						$this->build_pool_script($input['name']);
						$content .= "<input type=\"".$input['type']."\" ".$this->css_field["input"]." name=\"".$input['name']."\" value=\"".$input['value']."\" size=\"".$input['size']."\" ".$input['readonly']." onfocus=\"blur()\" onchange=\"".$this->pool_js[$input['name']]."\" />\n";
					}else
						$content .= "<input type=\"".$input['type']."\" ".$this->css_field["input"]." name=\"".$input['name']."\" value=\"".$input['value']."\" size=\"".$input['size']."\" maxlenght=\"".$input['maxlenght']."\" ".$input['readonly']." />\n";
					$this->hp[$input['name']] = $content;
			}			
		}
	}						
	
	function build_static_form(){
		if($this->main_js != "")
			$content = "<script language=\"javascript\" type=\"text/javascript\">".$this->main_js."</script>";
		$content .= "<form name=\"".$this->name."\" method=\"".$this->method."\" action=\"".$this->action."\" enctype=\"".$this->enctype."\">\n\r";
		for($i = 0; $i < sizeof($this->hidden_fields); $i++)
			if(in_array($this->hidden_fields[$i]['name'], $this->pool_fields)){
				$this->build_pool_script($this->hidden_fields[$i]['name']);
				$content .= "<input type=\"hidden\" name=\"".$this->hidden_fields[$i]['name']."\" value=\"".$this->hidden_fields[$i]['value']."\" onfocus=\"blur()\" onchange=\"".$this->pool_js[$this->hidden_fields[$i]['name']]."\" />\n\r";		
			}else
				$content .= "<input type=\"hidden\" name=\"".$this->hidden_fields[$i]['name']."\" value=\"".$this->hidden_fields[$i]['value']."\" />\n\r";
		
		$content .= "<table ".$this->tbl_width.">\n\r";
		$content .= "<tr>\n\r\t<td width=\"10\"></td><td><!--\n\r Form ".$this->name." generiert:\n\r am: ".date("d.m.Y, H:i")."\n\r von: ".getenv("REQUEST_URI")."\n\r --></td>\n\r</tr>\n\r";
		for($i = 0; $i < sizeof($this->input_fields); $i++){
			$input = $this->input_fields[$i];
			if(in_array($input['name'],$this->protected_names))
				die("Name ".$input['name']." (Feld ".$input['title'].") darf nicht verwendet werden !");		

			$type = $input['type'];
			
			switch($type){
			case"radio":
				$content .="<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td>\n\r";
					if(is_array($input['options']))
						foreach($input['options'] as $part){
							$content .= "\t\t<input type=\"radio\" name=\"".$input['name']."\" value=\"".$part['value']."\" ".$part['checked']." />&nbsp;".$part['label']."<br  />\n\r";
						}
				$content .= "</td>\n\r</tr>\n\r";
				break;

			case"checkbox":
				$content .="<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td>\n\r";
					if(is_array($input['options']))
						foreach($input['options'] as $part){
							$content .= "\t\t<input type=\"checkbox\" name=\"".$input['name']."[]\" value=\"".$part['value']."\" ".$part['checked']." />&nbsp;".$part['label']."<br  />\n\r";
						}
				$content .= "</td>\n\r</tr>\n\r";
				break;
				
			case"select":
				$content .="<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td>\n\r";
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
				if($input['count']){
					$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td><textarea cols=\"".$input['cols']."\" rows=\"".$input['rows']."\" name=\"".$input['name']."\" ".$input['readonly']." onKeyDown=\"count_letters();\" onKeyUp=\"count_letters(".$this->name.".".$input['name'].",".$this->name.".".$input['name']."_count, ".$input['count_limit'].");\">".$input['value']."</textarea></td>\n\r</tr>\n\r";				
					$content .= "<tr><td colspan=\"2\" align=\"right\"><input style=\"background: red;\" readonly=\"readonly\" type=\"text\" name=\"".$input['name']."_count\" size=\"4\" value=\"0\"> Zeichen gezählt.</td>\n\r</tr>\n\r";
				}else{
					$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td><textarea cols=\"".$input['cols']."\" rows=\"".$input['rows']."\" name=\"".$input['name']."\" ".$input['readonly'].">".$input['value']."</textarea></td>\n\r</tr>\n\r";
				}
				break;
				
			case"submit":
				$content .= "<tr>\n\r\t<td colspan=\"2\" align=\"right\">";
				if($this->is_reset && is_array($this->reset_fields))
					$content .="<input type=\"reset\" name=\"".$this->reset_fields['name']."\" value=\"".$this->reset_fields['value']."\" />";
				$content .="<input type=\"submit\" name=\"".$input['name']."\" value=\"".$input['value']."\" />";
				$content .="</td>\n\r</tr>\n\r";				
				break;

			case"plusminus":
				$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t";
				$content .= "<td><script language=\"JavaScript\" type=\"text/javascript\">if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true;</script>\n\r";
				$content .="<input name=\"range_sub".$input['name']."\" type=\"Button\" value=\"-\" onclick=\"if (".$this->name.".".$input['name'].".value > ".$input['min'].") { ".$this->name.".".$input['name'].".value--;{ ".$this->name.".".$input['pool'].".value++; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; ".$this->name.".range_add".$input['name'].".disabled = false; }\" OnDblClick=\"if (".$this->name.".".$input['name'].".value > ".$input['min'].") { ".$this->name.".".$input['name'].".value--;{ ".$this->name.".".$input['pool'].".value++; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['min'].") ".$this->name.".range_sub".$input['name'].".disabled = true; ".$this->name.".range_add".$input['name'].".disabled = false; }\" />\n\r";
				$content .="<input name=\"".$input['name']."\" type=\"text\" value=\"".$input['value']."\" size=\"3\" onfocus=\"blur()\" />\n\r";					
				$content .="<input name=\"range_add".$input['name']."\" type=\"Button\" value=\"+\" onclick=\"if (".$this->name.".".$input['name'].".value < ".$input['max']." && !(".$this->name.".".$input['pool'].".value == 0)) { ".$this->name.".".$input['name'].".value++; { ".$this->name.".".$input['pool'].".value--; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true; ".$this->name.".range_sub".$input['name'].".disabled = false; }\" ondblclick=\"if (".$this->name.".".$input['name'].".value < ".$input['max']." && !(".$this->name.".".$input['pool'].".value == 0)) {  ".$this->name.".".$input['name'].".value++; { ".$this->name.".".$input['pool'].".value--; ".$this->name.".".$input['pool'].".onchange(); } if (".$this->name.".".$input['name'].".value == ".$input['max'].") ".$this->name.".range_add".$input['name'].".disabled = true; ".$this->name.".range_sub".$input['name'].".disabled = false; }\" />\n\r";
				$content .="</td>\n\r</tr>\n\r";
				break;
			case"file":
					$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td><input type=\"".$input['type']."\" name=\"".$input['name']."\" /></td>\n\r</tr>\n\r";
				break;
			default:
				if(in_array($input['name'], $this->pool_fields)){
					$this->build_pool_script($input['name']);
					$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td><input type=\"".$input['type']."\" name=\"".$input['name']."\" value=\"".$input['value']."\" size=\"".$input['size']."\" ".$input['readonly']." onfocus=\"blur()\" onchange=\"".$this->pool_js[$input['name']]."\" /></td>\n\r</tr>\n\r";
				}else
					$content .= "<tr>\n\r\t<td nowrap valign=\"top\">".$input['title']."</td>\n\t<td><input type=\"".$input['type']."\" name=\"".$input['name']."\" value=\"".$input['value']."\" size=\"".$input['size']."\" maxlenght=\"".$input['maxlenght']."\" ".$input['readonly']." /></td>\n\r</tr>\n\r";
			}
		}
		
		$content .= "</table>\n\r";
		$content .= "</form>\n\r";
		$this->content = $content;
	}
	
	function build_pool_script($pool = ""){
		$fields = array();
		
		if($pool == "")
			$pool = $this->pool_fields[0];
			
		$temp = "if (".$this->name.".".$pool.".value == 0) {";
		foreach($this->input_fields as $part)
			if($part['pool'] == $pool)
				$fields[] = $part;	
		
		foreach($fields as $part)
			$temp .= " ".$this->name.".range_add".$part['name'].".disabled = true; ";
		
		$temp .= "} else if (".$this->name.".".$pool.".value == 1)  ";
		
		foreach($fields as $part)
			$temp .= " if (".$this->name.".".$part['name'].".value < ".$part['max'].") ".$this->name.".range_add".$part['name'].".disabled = false; ";	
		
		$this->pool_js[$pool] = $temp;
	}
	
	function feld_name($field_type){
		$field = $field_type."_fields";
		$out = sizeof($this->$field)+1;
		return $field."_".$out;
	}
	
	function show_static_form(){
		echo $this->content;
	}
	
	function show_class(){
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}
	
	function show_form($template = "dummy", $lang = "de"){
		global $sys_config;
		$hp = $this->hp;
		$templatefolder = "templates/";
		eval("\$out  = \"".str_replace("\"","\\\"",implode("",file("templates/".$lang."/".$template.".tpl")))."\";");
		return $out;
	}
}
?>