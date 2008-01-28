{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Edit Profile</title>
  $headinclude
 </head>
 <body id="bg">
  $header
  <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="usercp.php?sid=$session[hash]">User CP of $wbbuserdata[username]</a> » Edit Profile</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>$usercp_error
  <FORM ACTION="usercp.php" METHOD="POST"><table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tablecatcolor}" id="tablecat">
    <td colspan=2><normalfont color="{fontcolorthird}"><b>» Edit Profile</b></font></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>» Required Information</b> (All fields are required.)</font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Email Address:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_email" value="$r_email" maxlength="150"></font></td>
   </tr>
   $profilefields_required
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>» Optional Information</b> (All fields are optional.)</font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Homepage:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_homepage" value="$r_homepage" maxlength="250"></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>ICQ UIN:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_icq" value="$r_icq" maxlength="30"></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>AIM Screenname:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_aim" value="$r_aim" maxlength="30"></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>YIM Screenname:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_yim" value="$r_yim" maxlength="30"></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>MSN Screenname:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_msn" value="$r_msn" maxlength="30"></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td ><normalfont><b>Birthday:</b></font></td>
    <td><table>
     <tr>
      <td><smallfont>Day</font></td>
      <td><smallfont>Month</font></td>
      <td><smallfont>Year</font></td>
     </tr>
     <tr>
      <td><select name="r_day">
       <option value="0"></option>
       $day_options
      </select></td>
      <td><select name="r_month">
       <option value="0"></option>
       $month_options
      </select></td>
      <td><input type="text" class="input" name="r_year" value="$r_year" maxlength="4" size=5></td>
     </tr>
    </table></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td ><normalfont><b>Gender:</b></font></td>
    <td><select name="r_gender">
     <option value="0">No declaration</option>
     <option value="1"$gender[1]>Male</option>
     <option value="2"$gender[2]>Female</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td valign="top"><normalfont><b>User Text:</b></font><br><smallfont>Enter a short informative text about yourself which will be shown in your profile.</font></td>
    <td><TEXTAREA NAME="r_usertext" ROWS=6 COLS=40 wrap="soft">$r_usertext</TEXTAREA></td>
   </tr>
   $profilefields
  </table><br>
  <p align="center"><input class="input" type="submit" value="Submit"> <input class="input" type="reset" value="Reset"></p>
   <input type="hidden" name="temp_email" value="$wbbuserdata[email]">
   <input type="hidden" name="action" value="$action">
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
  </form>
  $footer
 </body>
</html>