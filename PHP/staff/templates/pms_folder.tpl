{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - $folder[title]</title>
  $headinclude
 <script language="javascript">
  <!--
  function select_all(status) {
   for (i=0;i<document.bbform.length;i++) {
    if(document.bbform.elements[i].name=="pmid[]") document.bbform.elements[i].checked = status;
   }
  }

  //-->
 </script>
 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » <a href="pms.php?sid=$session[hash]">Private Messages</a> » $folder[title]</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
  <table cellpadding=5 cellspacing=0 border=0 width="{tableinwidth}">
   <tr>
    <td width="200" valign="top">
     <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="200">
      <tr bgcolor="{tabletitlecolor}" id="tabletitle">
       <td colspan=3 align="center"><normalfont color="{fontcolorsecond}"><b>Folders</b></font></td>
      </tr>
      <tr>
       <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/msg-folder.gif"></td>
       <td id="tableb" bgcolor="{tablecolorb}" width="100%" colspan=2><normalfont><a href="pms.php?folderid=0&sid=$session[hash]">Inbox</a></font></td>
      </tr>
      $folder_bit
      <tr>
       <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/msg-folder.gif"></td>
       <td id="tableb" bgcolor="{tablecolorb}" width="100%" colspan=2><normalfont><a href="pms.php?folderid=outbox&sid=$session[hash]">Outbox</a></font></td>
      </tr>
     </table><br>
     <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="200">
      <tr bgcolor="{tabletitlecolor}" id="tabletitle"><FORM ACTION="pms.php" METHOD="POST">
       <td colspan=2 align="center"><normalfont color="{fontcolorsecond}"><b>Create Folder</b></font></td>
      </tr>
      <tr>
       <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/msg-folder.gif"></td>
       <td id="tableb" bgcolor="{tablecolorb}" width="100%"><input type="text" name="foldertitle" maxlength=100 value="" class="input"> <input src="{imagefolder}/go.gif" type="image" border=0></td>
      </tr>
      <input type="hidden" name="sid" value="$session[hash]">
      <input type="hidden" name="action" value="createfolder">
      </form>
     </table><br>
     $folder_rename
    </td>
    <td width="100%" valign="top"><FORM ACTION="pms.php" METHOD="POST" name="bbform">
     <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="100%">
      <tr bgcolor="{tabletitlecolor}" id="tabletitle" align="center">
       <td colspan=3 width="60%"><normalfont color="{fontcolorsecond}"><b>Subject</b></font></td>
       <td width="20%"><normalfont color="{fontcolorsecond}"><b>From</b></font></td>
       <td width="20%"><normalfont color="{fontcolorsecond}"><b>Date</b></font></td>
       <td><input type="checkbox" name="all" value="1" onclick="select_all(this.checked)"></td>
      </tr>
      $pms_bit
     </table>
     <table width="100%">
      <tr>
       <td><a href="pms.php?action=newpm&sid=$session[hash]"><img src="{imagefolder}/newpm.gif" border=0 alt="Compose New Message"></a></td>
       <td width="100%"><select name="daysprune">
        <option value="1000">Show all messages</option>
        <option value="1500"$d_select[1500]>Show messages since last visit</option>
        <option value="1"$d_select[1]>Show messages since 1 day</option>
        <option value="2"$d_select[2]>Show messages since 2 days</option>
        <option value="5"$d_select[5]>Show messages since 5 days</option>
        <option value="10"$d_select[10]>Show messages since 10 days</option>
        <option value="20"$d_select[20]>Show messages since 20 days</option>
        <option value="30"$d_select[30]>Show messages since 30 days</option>
        <option value="45"$d_select[45]>Show messages since 45 days</option>
        <option value="60"$d_select[60]>Show messages since 60 days</option>
        <option value="75"$d_select[75]>Show messages since 75 days</option>
        <option value="100"$d_select[100]>Show messages since 100 days</option>
        <option value="365"$d_select[365]>Show messages since 1 year</option>
      </select>&nbsp;<input src="{imagefolder}/go.gif" type="image" border=0></td>
       <td align="right"><select name="action">
        <option value="">Choose action...</option>
        <option value="delmark">delete</option>
        $moveto_options
        <option value="">----------------------------</option>
        <option value="delall">delete all messages</option>
       </select>&nbsp;<input src="{imagefolder}/go.gif" type="image" border=0></td>
      </tr>
     </table>
    </td>
   </tr>
  </table><br>
   <input type="hidden" name="folderid" value="$folderid">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>
