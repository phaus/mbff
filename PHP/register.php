<?php
##################################################################################
$modules = array("user", "system", "caching");
$funcs = array("login");
$request = array("action", "s", "user_id");
$post = array("action", "r_username", "r_password", "r_email");
##################################################################################
require("./session.php");

$hp['style'] = "background-image: url(images/t.space.gif);";


switch($action){
	case"activate":
		$user = new c_user($user_id);
		$user->get_data();
		$userdata = $user->return_data_array();					
		if($s == $userdata['activ']){
			$user->set_activ();
			$username = $userdata['username'];
			eval("\$hp['content']  = \"".hp_gettemplate("register_activ", $sys_conf['lang'])."\";");
		}else{
			$hp[error] = "Der Account konnte nicht aktiviert werden ! Vielleicht ist er bereits aktiv, oder Sie haben die falschen Daten benutzt !";
			eval("\$hp['content']  = \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
		}
		break;
		
	case"register":
		if($r_username && $r_password && $r_email){
			$user = new c_user();
			$user->set_entry("user_name", $r_username);
			$user->set_entry("password", md5($r_password));
			$user->set_entry("email", $r_email);
			$user->set_entry("lang", get_session_var("lang"));
			
			
			if($user->new_user()){
				$user->save_data();	
				if(_register_email){
					$user->get_data();
					$user_id = $user->get_id();
					$url = $sys_conf['url'];
					$s_activ = $user->data['activ'];
					eval("\$message  = \"".hp_gettemplate("register_email", $sys_conf['lang'])."\";");
					eval("\$subject  = \"".hp_gettemplate("register_email_subject", $sys_conf['lang'])."\";");
					$headers .= "From: ".$url." <".$sys_conf['email'].">\r\n";
					mail($r_email, $subject, $message, $headers);
				}
				eval("\$hp['content']  = \"".hp_gettemplate("register_finish", $sys_conf['lang'])."\";");
			}else{
				$hp[error] = "Benutzername schon vorhanden !";
				eval("\$hp['content']  .= \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
				eval("\$hp['content']  .= \"".hp_gettemplate("register", $sys_conf['lang'])."\";");
			}
		}else{
				$hp[error] = "Es fehlen noch Eingaben !";
				eval("\$hp['content']  .= \"".hp_gettemplate("error", $sys_conf['lang'])."\";");
				eval("\$hp['content']  .= \"".hp_gettemplate("register", $sys_conf['lang'])."\";");
		}
		break;	
		
	default:
		eval("\$hp['content']  = \"".hp_gettemplate("register", $sys_conf['lang'])."\";");
	//inputfelder
}
eval("\$output = \"".hp_gettemplate("index", $sys_conf['lang'])."\";");
echo $output;
?>