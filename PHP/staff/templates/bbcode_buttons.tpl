<table cellspacing=0 cellpadding=0>
 <tr>
  <td align="left" colspan=3><smallfont>
   <input type="radio" name="mode" value="0" title="normal mode: (alt+n)" accesskey="n" onclick="setmode(this.value)" $modechecked[0]>
   normal mode
   <input type="radio" name="mode" value="1" title="enhanced mode: (alt+e)" accesskey="e" onclick="setmode(this.value)" $modechecked[1]>
   enhanced mode
  </font></td>
 </tr>
 <tr>
  <td><select id="fontselect" 
    onchange="fontformat(this.form,this.options[this.selectedIndex].value,'FONT')">
    <option value="0">FONT</option>
    $bbcode_fontbits
   </select
   ><select id="sizeselect" 
    onchange="fontformat(this.form,this.options[this.selectedIndex].value,'SIZE')">
    <option value="0">SIZE</option>
    $bbcode_sizebits
   </select
   ><select id="colorselect" 
    onchange="fontformat(this.form,this.options[this.selectedIndex].value,'COLOR')">
    <option value="0">COLOR</option>
    $bbcode_colorbits
   </select>
  </td>
  <td><a href="misc.php?sid=$session[hash]&action=bbcode" target="_blank"><img src="{imagefolder}/bbcode_help.gif" alt="Hilfe" border=0></a>&nbsp;</td>
  <td rowspan=2><smallfont><input class="input" type="button" value=" x " accesskey="c" title="close current tag (alt+c)" style="color:red; font-weight:bold" onclick="closetag(this.form)"> close current tag<br><input class="input" type="button" value=" x " accesskey="x" title="close all tags (alt+x)" style="color:red; font-weight:bold" onclick="closeall(this.form)"> close all tags</font></td>
 </tr>
 <tr>
  <td align="center" colspan=2><img src="{imagefolder}/bbcode_bold.gif" alt="Bold Text" border="0" onclick="bbcode(document.bbform,'B','')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_italic.gif" alt="Italic Text" border="0" onclick="bbcode(document.bbform,'I','')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_underline.gif" alt="Underlined Text" border="0" onclick="bbcode(document.bbform,'U','')" class="clsCursor">
  <img src="{imagefolder}/bbcode_center.gif" alt="Center Text" border="0" onclick="bbcode(document.bbform,'CENTER','')" class="clsCursor">
  <img src="{imagefolder}/bbcode_url.gif" alt="Add Link" border="0" onclick="namedlink(document.bbform,'URL')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_email.gif" alt="Add Email Address" border="0" onclick="namedlink(document.bbform,'EMAIL')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_image.gif" alt="Insert Image" border="0" onclick="bbcode(document.bbform,'IMG','http://')" class="clsCursor">
  <img src="{imagefolder}/bbcode_quote.gif" alt="Insert Quote" border="0" onclick="bbcode(document.bbform,'QUOTE','')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_list.gif" alt="Add List" border="0" onclick="dolist(document.bbform)" class="clsCursor">
  <img src="{imagefolder}/bbcode_code.gif" alt="Insert CODE" border="0" onclick="bbcode(document.bbform,'CODE','')" class="clsCursor"
  ><img src="{imagefolder}/bbcode_php.gif" alt="Insert Syntax Highlighted PHP CODE" border="0" onclick="bbcode(document.bbform,'PHP','')" class="clsCursor">
  </td>
 </tr>
</table>