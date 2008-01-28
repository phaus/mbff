{!DOCTYPE}
<html>
 <head>
  <title>$master_board_name - Register</title>
  $headinclude
 </head>
 <body id="bg">
  $header
  </table>$register_error
  <FORM ACTION="register.php" METHOD="POST"><table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tablecatcolor}" id="tablecat">
    <td colspan=2><normalfont color="{fontcolorthird}"><b>� Register</b></font></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Required Information</b> (All fields are required.)</font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td width="50%"><normalfont><b>Username:</b></font></td>
    <td width="50%"><normalfont><input type="text" class="input" name="r_username" value="$r_username" maxlength="50"></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Email Address:</b></font></td>
    <td><normalfont><input type="text" class="input" name="r_email" value="$r_email" maxlength="150"></font></td>
   </tr>
   $register_password
   $profilefields_required
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Optional Information</b> (All fields are optional.)</font></td>
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
    <td valign="top"><normalfont><b>Signature:</b></font><br><smallfont>Your signature is shown after your posts.</font><p><table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}">
    <tr>
     <td bgcolor="{tablecolorb}" id="tableb" nowrap><smallfont>$note</font></td>
    </tr>
   </table></p></td>
    <td><TEXTAREA NAME="r_signature" ROWS=6 COLS=40 wrap="soft">$r_signature</TEXTAREA></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td valign="top"><normalfont><b>User Text:</b></font><br><smallfont>Enter a short informative text about yourself which will be shown in your profile.</font></td>
    <td><TEXTAREA NAME="r_usertext" ROWS=6 COLS=40 wrap="soft">$r_usertext</TEXTAREA></td>
   </tr>
   $profilefields
  </table><br>
  <table cellpadding=4 cellspacing=1 border=0 bgcolor="{tableinbordercolor}" width="{tableinwidth}">
   <tr bgcolor="{tablecatcolor}" id="tablecat">
    <td colspan=2><normalfont color="{fontcolorthird}"><b>� Settings</b></font></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Registration, Cookies & Privacy</b></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td ><normalfont><b>Use Ghost-Mode?</b></font><br><smallfont>Select this option if you don't want to be seen in the online users list.</font></td>
    <td><select name="r_invisible">
     <option value="1"$invisible[1]>Yes</option>
     <option value="0"$invisible[0]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Use Cookies?</b></font><br><smallfont>Select this option if you don't want your session ID to be transfer in links. If you select no, do not give out links with your session ID or other people might be able to use your account.</font></td>
    <td><select name="r_nosessionhash">
     <option value="1"$nosessionhash[1]>Yes</option>
     <option value="0"$nosessionhash[0]>No</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Remember Me?</b></font><br><smallfont>Select this option if you want to be logged in automatically every time you come to the forums.</font></td>
    <td><select name="r_usecookies">
     <option value="1"$usecookies[1]>Yes</option>
     <option value="0"$usecookies[0]>No</option>
    </select></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Private Messages, Email & Notification</b></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Can the Admins email you?</b></font><br><smallfont>Select this option (recommended) if you want to allow Admins to inform you by email about important events or problems. For example, you might get an email in case of server issues. We will not send SPAM!</font></td>
    <td><select name="r_admincanemail">
     <option value="1"$admincanemail[1]>Yes</option>
     <option value="0"$admincanemail[0]>No</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Hide email address?</b></font><br><smallfont>Select this option if you don't want other members to see your email address in your public profile. Only administrators and moderators will be able to see it.</font></td>
    <td><select name="r_showemail">
     <option value="0"$showemail[0]>Yes</option>
     <option value="1"$showemail[1]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td ><normalfont><b>Can members email you using the formmailer?</b></font><br><smallfont>Select this option if you want to allow other members to send you emails through the formmailer (even if they don't know your email).</font></td>
    <td><select name="r_usercanemail">
     <option value="1"$usercanemail[1]>Yes</option>
     <option value="0"$usercanemail[0]>No</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td ><normalfont><b>Enable email notification by default?</b></font><br><smallfont>Select this option if you want email notification to be checked automatically when you post a new thread or reply.</font></td>
    <td><select name="r_emailnotify">
     <option value="1"$emailnotify[1]>Yes</option>
     <option value="0"$emailnotify[0]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td ><normalfont><b>Can members send you private messages?</b></font><br><smallfont>Select this option if you want to allow other members to send you private messages.</font></td>
    <td><select name="r_receivepm">
     <option value="1"$receivepm[1]>Yes</option>
     <option value="0"$receivepm[0]>No</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Email Notification on new PM?</b></font><br><smallfont>Select this option if you want to be informed by email when you recieve a new private message.</font></td>
    <td><select name="r_emailonpm">
     <option value="1"$emailonpm[1]>Yes</option>
     <option value="0"$emailonpm[0]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Pop Up Notification on new PM?</b></font><br><smallfont>Select this option if you want to be informed by a pop up when you recieve a new private message.</font></td>
    <td><select name="r_pmpopup">
     <option value="1"$spmpopup[1]>Yes</option>
     <option value="0"$spmpopup[0]>No</option>
    </select></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Forum Display Settings</b></font></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Show other members' signatures?</b></font><br><smallfont>Select this option if you want other members' personal signatures to be displayed in their posts.</font></td>
    <td><select name="r_showsignatures">
     <option value="1"$showsignatures[1]>Yes</option>
     <option value="0"$showsignatures[0]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td><normalfont><b>Show other members' avatars?</b></font><br><smallfont>Select this option if you want other members' avatars to be displayed in their posts.</font></td>
    <td><select name="r_showavatars">
     <option value="1"$showavatars[1]>Yes</option>
     <option value="0"$showavatars[0]>No</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td><normalfont><b>Show images in posts?</b></font><br><smallfont>Select this option if you want images to be displayed in posts. Otherwise there will be a link to the images.</font></td>
    <td><select name="r_showimages">
     <option value="1"$showimages[1]>Yes</option>
     <option value="0"$showimages[0]>No</option>
    </select></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td ><normalfont><b>Threads Display:</b></font><br><smallfont></font></td>
    <td><select name="r_daysprune">
     <option value="0"$sdaysprune[0]>Forum Default</option>
     <option value="1500"$sdaysprune[1500]>Show new threads since last visit</option>
     <option value="1"$sdaysprune[1]>Show threads from last day</option>
     <option value="2"$sdaysprune[2]>Show threads from the last 2 days</option>
     <option value="5"$sdaysprune[5]>Show threads from the last 5 days</option>
     <option value="10"$sdaysprune[10]>Show threads from the last 10 days</option>
     <option value="20"$sdaysprune[20]>Show threads from the last 20 days</option>
     <option value="30"$sdaysprune[30]>Show threads from the last 30 days</option>
     <option value="45"$sdaysprune[45]>Show threads from the last 45 days</option>
     <option value="60"$sdaysprune[60]>Show threads from the last 60 days</option>
     <option value="75"$sdaysprune[75]>Show threads from the last 75 days</option>
     <option value="100"$sdaysprune[100]>Show threads from the last 100 days</option>
     <option value="365"$sdaysprune[365]>Show threads from last year</option>
     <option value="1000"$sdaysprune[1000]>Show all threads</option>
    </select></td>
   </tr>
   <tr id="tablea" bgcolor="{tablecolora}">
    <td ><normalfont><b>Posts per page:</b></font><br><smallfont>Select the number of posts you want displayed on each page of a thread. 20 posts is the usual standard.</font></td>
    <td><select name="r_umaxposts">
     <option value="0"$sumaxposts[0]>Forum Default</option>
     <option value="5"$sumaxposts[5]>Show 5 posts per page</option>
     <option value="10"$sumaxposts[10]>Show 10 posts per page</option>
     <option value="20"$sumaxposts[20]>Show 20 posts per page</option>
     <option value="30"$sumaxposts[30]>Show 30 posts per page</option>
     <option value="40"$sumaxposts[40]>Show 40 posts per page</option>
    </select></td>
   </tr>
   <tr bgcolor="{tabletitlecolor}" id="tabletitle">
    <td colspan=2><smallfont color="{fontcolorsecond}"><b>� Additional Settings</b></font></td>
   </tr>
   <tr id="tableb" bgcolor="{tablecolorb}">
    <td ><normalfont><b>Select Style:</b></font><br><smallfont></font></td>
    <td><select name="r_styleid">
     <option value="0">Forum Default</option>
     $style_options
    </select></td>
   </tr>
  </table>
  <p align="center"><input class="input" type="submit" value="Register"> <input class="input" type="reset" value="Reset"></p>
   <input type="hidden" name="send" value="send">
   <input type="hidden" name="sid" value="$session[hash]">
   <input type="hidden" name="disclaimer" value="$disclaimer">
  </form>
  $footer
 </body>
</html>
