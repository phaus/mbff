<div class="container" style=" width:600px; position:absolute; z-index:0; left:140px;top:70px; background-color: #5c5e5c; text-align:center;">
<h3>Neues Avatarbild hochladen</h3>
Bisher verwendetes Bild:<br />
<img src="$img_url" /><br /><br />

<form name="image" method="post" action="$PHP_SELF" enctype="multipart/form-data">
<input type="hidden" name="action" value="avatar_image_set" />
<input type="hidden" name="avatar_id" value="$avatar_id" />
<input type="hidden" name="sid" value="$sid" />
Neues Bild: <input name="image" type="file" /><br />

<input class="button" type="submit" name="upload" value="Avatar hochladen" />
</form>