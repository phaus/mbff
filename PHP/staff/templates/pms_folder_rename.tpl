<table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="200">
      <tr bgcolor="{tabletitlecolor}" id="tabletitle"><FORM ACTION="pms.php" METHOD="POST">
       <td colspan=2 align="center"><normalfont color="{fontcolorsecond}"><b>Rename Folder</b></font></td>
      </tr>
      <tr>
       <td id="tablea" bgcolor="{tablecolora}"><img src="{imagefolder}/msg-folder.gif"></td>
       <td id="tableb" bgcolor="{tablecolorb}" width="100%"><input type="text" name="foldertitle" maxlength=100 value="$folder[title]" class="input"> <input src="{imagefolder}/go.gif" type="image" border=0></td>
      </tr>
      <input type="hidden" name="folderid" value="$folderid">
      <input type="hidden" name="sid" value="$session[hash]">
      <input type="hidden" name="action" value="renamefolder">
      </form>
     </table><br>