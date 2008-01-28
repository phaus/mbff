<div class="container" style=" width:600px; position:absolute; z-index:0; left:140px;top:70px; background-color: #5c5e5c; text-align:center;">
<h3>Neuen Avatar erstellen</h3>
<form name="avatar" method="post" action="$PHP_SELF">
<input type="hidden" name="action" value="avatar_new_set" />
<input type="hidden" name="sid" value="$sid" />
Name: <input class="input" name="name" /><br />
St&auml;rke: <input class="input" name="str" /><br />
Autorit&auml;t: <input class="input" name="aut" /><br />
Intelligenz: <input class="input" name="int" /><br />
Titel: <input class="input" name="title" /><br />
Beruf: <input class="input" name="prof" /><br />

<input class="button" type="submit" name="erstellen" value="Avatar erstellen" />
</form>