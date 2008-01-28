<?php
global $hp;
$hp['class'][] = "c_avatar";
class c_avatar extends data {

	function c_avatar($avatar_id = ""){
		
		$this->base_data = array('avatar_id', 'user_id', 'avatar_name', 'date', 'activ');
		$this->db_level = "db_level2";
		$this->index_id = "avatar_id";
		$this->db_prefix = "avatar_";
		return $this->data($avatar_id);
	}
	
	function activ_avatar(){
		$sql = "UPDATE `".$this->db_prefix."index`
				SET activ = 0
				WHERE ".$this->index_id." = '".$this->data_id."' ";
		$this->class_db->unbuffered_query($sql);
	}
	
	function new_avatar(){
		$string = strtoupper(substr(getnewsid(),0,10));
		$sql = "SELECT avatar_id 
				FROM `".$this->db_prefix."index` 
				WHERE avatar_name = '".$this->data['avatar_name']."' ";
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) > 0){
			return false;
		}else{
			$sql = "INSERT INTO `".$this->db_prefix."index`
					(".$this->index_id.", user_id, avatar_name, date, activ)
					VALUES
					('".$this->data_id."', '".$this->data['user_id']."', '".$this->data['avatar_name']."', '".time()."', '".$string."')";
			$this->class_db->unbuffered_query($sql);
			$this->save_data();
		}
		$this->class_db->free_result($result);
	}
	
	function list_avatars(){
		$sql = "SELECT avatar_id
				FROM ".$this->db_prefix."index
				WHERE user_id = '".$this->data['user_id']."'";
		$list = array();
		$result = $this->class_db->query($sql);
		if($this->class_db->num_rows($result) == 0){
			return false;
		}else{
			while($row = $this->class_db->fetch_array($result, MYSQL_ASSOC)){
				$list[] = $row['avatar_id'];
			}
			return $list;
		}
	}
	
	function build_image($old_picture, $new_picture, $maxx = 100, $maxy = 100){
		global $sys_conf; //Pfad zu Bildern
		
		//Abfangen von Pfaden auf höherliegende Verzeichnisse
		if(strstr($new_picture, '../'))
			return false;
	
		//Endung ermitteln und Pfad für temp. Bild erstellen
		$ext = explode(".", $_FILES[$old_picture]['name']);
		$ext = $ext[sizeof($ext)-1];
		$tmpfname = $sys_conf['img_path']['upload'].$new_picture.'.tmp.'.$ext;
		
		//Prüfen, ob temp. Datei erstellt werden kann
		if(move_uploaded_file($_FILES[$old_picture]['tmp_name'], $tmpfname)){
			$imgsrcsz = getimagesize($tmpfname);
			
			if($imgsrcsz[0] > $maxx || $imgsrcsz[1] > $maxy){
				//entweder X oder Y überschreitet Maximalwert; welcher Wert überschreitet (stärker)?
				if(($imgsrcsz[0] / $maxx) >= $imgsrcsz[1] / $maxy){
					$multi = $imgsrcsz[0] / $maxx;
					$newx = $maxx;
					$newy = $imgsrcsz[1] / $multi;
				}elseif($imgsrcsz[0] / $maxx < ($imgsrcsz[1] / $maxy)){
					$multi = $imgsrcsz[1] / $maxy;
					$newx = $imgsrcsz[0] / $multi;
					$newy = $newx;
				}
			}else{
				//Grafik ist kleiner als die Maximalwerte, keine Skalierung
				$newx = $maxx;
				$newy = $maxy;
			}
			
			$thumb = imagecreatetruecolor($newx, $newy);
		
			//unterschiedliche Befehle nach Dateiformat
			switch($imgsrcsz[2]){
				case"1":
					$imgsrc = imagecreatefromgif($tmpfname);
					break;
				case"2":
					$imgsrc = imagecreatefromjpeg($tmpfname);
					break;
				case"3":
					$imgsrc = imagecreatefrompng($tmpfname);
					break;
				default:
					echo "kein zugelassenes Format";
					//Abbruch, wenn Dateiformat nicht gif, jpeg oder png
					return false;
			}
		
			//Bild als png abspeichern und temp. Datei entfernen
			imagecopyresampled($thumb,$imgsrc,0,0,0,0,$newx,$newy,$imgsrcsz[0],$imgsrcsz[1]);
			imageinterlace($thumb,1);
			imagepng($thumb, $sys_conf['img_path']['upload'].$new_picture.".png");
			imagedestroy($thumb);
			@unlink($tmpfname);
			return $new_picture.".png";
		}else{
			echo "hochgeladene Datei konnte nicht verschoben werden<br />\n"
			.$old_picture."<br />\n"
			.$tmpfname;
			//Abbruch, wenn temp. Datei nicht erstellt werden kann
			return false;
		}
	}
	
	function upload_image($ul_image = "image"){
		global $sys_conf; //Pfad zu Avatar-Bildern
		
		//Prüfen, ob Endung "bmp" ist, wenn ja, false
		$ext = explode(".", $_FILES[$ul_image]['name']);
		$ext = $ext[sizeof($ext)-1];
		$ext = strtolower($ext);
		if($ext == "bmp")
			return false;

		//wenn Bild erstellt, wird Eintrag hinzugefügt und Dateiname (oder -Pfad) ausgegeben, sonst false
		//bei Erfolg erhält man den Pfad zum Bild mit $sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars'].return-Wert
		if($img = $this->build_image($ul_image, $sys_conf['img_path']['avatars'].uniqid("").$this->data_id, $sys_conf['img_upload']['maxx'], $sys_conf['img_upload']['maxy'])){

			//altes Bild löschen, wenn vorhanden
			if($this->data_status['image'])
				@unlink($sys_conf['img_path']['upload'].$sys_conf['img_path']['avatars'].$this->data['image']);			
			
			$img = substr($img, strlen($sys_conf['img_path']['avatars']));
			$this->set_entry("image", $img);
			$this->save_data();
			
			return $img;
		}else{
			return false;
		}
	}
}
?>