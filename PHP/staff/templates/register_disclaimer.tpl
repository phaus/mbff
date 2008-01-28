{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Register</title>
  $headinclude
 </head>
 <body id="bg">
  $header
  </table><br>
  <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td align="center"><normalfont COLOR="{fontcolorsecond}"><b>$master_board_name - Disclaimer</b></font></td>
   </tr>
   <tr bgcolor="{tablecolorb}" id="tableb">
    <td><normalfont>
     <p>The registration and use of this forum is completely free for you. Press "Accept" if you agree with the rules mentioned below. You will then be able to register.</p>
     <p>Even though Administrators and Moderators from $master_board_name try to delete or edit all the unwanted posts, it is impossible for them to check all the posts. All the posts express the opinion of the author, the owners of $master_board_name and WoltLab GmbH (developers of wBB) cannot be held responsible for the content of those posts.</p>    
     <p>By registering, you agree not to post messages that are vulgar, impolite, disrespectful or that express (extreme) political views or (verbal) law offences.</p>
     <p>Additionally, the Administrators and Moderators of this board can edit or even delete your account for any reason.</p>
     <p>Enjoy your stay at $master_board_name!</p>
    </font></td>
   </tr>
   <tr bgcolor="{tablecolorb}" id="tableb">
    <td><normalfont>
   	<p>Die Registrierung und Benutzung unserer Foren ist völlig kostenlos für Sie. Klicken Sie auf "Akzeptieren", wenn Sie die hier genannten Regeln und Erklärungen anerkennen. Danach können Sie Sich registrieren.</p>
	<p>Obwohl die Administratoren und Moderatoren von $master_board_name versuchen, alle unerwünschten Beiträge/Nachrichten von diesem Forum fernzuhalten, ist es unmöglich, alle Beiträge/Nachrichten zu überprüfen. Alle Beiträge/Nachrichten drücken die Ansichten des Autors aus und die Eigentümer von $master_board_name oder WoltLab GmbH (Entwickler des wBB Lite) können nicht für den Inhalt jedes Beitrags verantwortlich gemacht werden.</p>
	<p>Mit dem Vollenden der Registrierung erklären Sie Sich damit einverstanden, das Forum nicht für Obzönitäten, Vulgäres, Beleidigungen, Propaganda (extremer) politischer Ansichten oder (verbaler) Verstöße gegen das Gesetz zu missbrauchen.</p>
	<p>Weiterhin können Einträge sowie Accounts durch Moderatoren und Administratoren des Boards u.a. aus Gründen des Verstoßes gegen gute Sitten ohne weitere Begründung editiert oder gelöscht werden.</p>
 	<p>Viel Spaß beim Nutzen vom $master_board_name!</p>
    </font></td>
   </tr>
   <tr bgcolor="{tablecolorb}" id="tableb">
    <td><normalfont>
		<b>WICHTIG BITTE LESEN:</b>
		<p>Beiträgen, welche Verweise auf illegale Inhalte oder Inhalte zweifelhaften Ursprungs beinhalten, werden von den Moderatoren kommentarlos gelöscht.</p>
		<p>Wir können nicht alle Beiträge überprüfen, so distanzieren wir uns hiermit ausdrücklich von den Inhalten externer Links.</p>
		<p></p>
		<p>Viel Erfolg beim Studieren !</p>
    </font></td>
   </tr>
  </table>

  <p align="center">
   <FORM ACTION="register.php" METHOD="POST" name="sform">
    <input type="HIDDEN" name="disclaimer" value="viewed">
    <input type="HIDDEN" name="sid" value="$session[hash]">   
    <INPUT class="input" TYPE="SUBMIT" name="submitbtn" VALUE="Accept">
   </form>
   <FORM ACTION="index.php" METHOD="get">
    <input type="HIDDEN" name="sid" value="$session[hash]">
    <INPUT class="input" TYPE="SUBMIT" VALUE="Refuse">
   </form>
  </p>
$footer
</body>

<script language="javascript">
<!--
var secs = 10;
var wait = secs * 1000;
document.sform.submitbtn.disabled=true;
 
for(i=1;i<=secs;i++) {
 window.setTimeout("update(" + i + ")", i * 1000);
}

window.setTimeout("timer()", wait);

function update(num) {
 if(num == (wait/1000)) {
  document.sform.submitbtn.value = "Accept";
 }
 else {
  printnr = (wait/1000)-num;
  document.sform.submitbtn.value = "Accept (" + printnr + ")";
 }
}

function timer() {
 document.sform.submitbtn.disabled=false;
}
//-->
</script>
</html> 