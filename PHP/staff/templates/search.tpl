{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Search</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » Search</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecatcolor}" id="tablecat"><form action="search.php" method="post">
  <td colspan=2><normalfont color="{fontcolorthird}"><b>Search $master_board_name...</b></font></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><smallfont color="{fontcolorsecond}">Search for Keyword</font></td>
  <td><smallfont color="{fontcolorsecond}">Search for Username</font></td>
 </tr>
 <tr id="tablea" bgcolor="{tablecolora}">
  <td valign="top"><smallfont>
  <input type="text" name="searchstring" value="" class="input" size=40>
  <br><br>
  <b>Simple Search:</b> Seperate different search words with spaces.<br>
  <b>Advanced Search:</b> Seperate different search words using AND, OR and NOT to specify your search.<br>
  You can insert asterisks (*) to use wild cards (search for partial words). 
  </font></td>
  <td valign="top"><smallfont>
  <input type="text" name="searchuser" value="" class="input" size=20 maxlength=50>
  <br><br>
  <input type="radio" name="name_exactly" value="1" checked> Exact Name<br>
  <input type="radio" name="name_exactly" value="0"> Partial Name
  </font></td>
 </tr>
</table>
<br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tablecatcolor}" id="tablecat">
  <td colspan=3><normalfont color="{fontcolorthird}"><b>Search Options</b></font></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><smallfont color="{fontcolorsecond}">Search Forums</font></td>
  <td><smallfont color="{fontcolorsecond}">Search for Content</font></td>
  <td><smallfont color="{fontcolorsecond}">Results Display</font></td>
 </tr>
 <tr id="tablea" bgcolor="{tablecolora}">
  <td rowspan=3><select name="boardids[]" style="width:100%;" size=10 multiple>
   <option value="*" selected>Search in all Forums</option>
   <option value="-1">--------------------</option>
   $board_options
  </select><br><smallfont>(Hold the "Ctrl/Shift" key and click to select multiple forums.)</font></td>
  <td><smallfont>
  <input type="radio" name="topiconly" value="0" checked> Search in whole post<br>
  <input type="radio" name="topiconly" value="1"> Search in subjects
  </font></td>
  <td><smallfont>
  <input type="radio" name="showposts" value="1"> Show results as posts<br>
  <input type="radio" name="showposts" value="0" checked> Show results as threads
  </font></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td><smallfont color="{fontcolorsecond}">Search by Date</font></td>
  <td><smallfont color="{fontcolorsecond}">Results Sorting</font></td>
 </tr>
 <tr id="tableb" bgcolor="{tablecolorb}">
  <td><smallfont>
  <select name="searchdate">
   <option value="0">All dates</option>
   <option value="1">From yesterday</option>
   <option value="7">From last week</option>
   <option value="14">From last 2 weeks</option>
   <option value="30">From last month</option>
   <option value="90">From last 3 months</option>
   <option value="180">From last 6 months</option>
   <option value="365">From last year</option>
  </select><br><br>
  <input type="radio" name="beforeafter" value="after" checked> and newer<br>
  <input type="radio" name="beforeafter" value="before"> and older
  </font></td>
  <td><smallfont>
   <select name="sortby">
    <option value="topic">Subject</option>
    <option value="replycount">Number of Replies</option>
    <option value="views">Number of Views</option>
    <option value="lastpost" selected>Last Post</option>
    <option value="author">Author</option>
    <option value="board">Forum</option>
   </select><br><br>
  <input type="radio" name="sortorder" value="asc"> in ascending order<br>
  <input type="radio" name="sortorder" value="desc" checked> in descending order
  </font></td>
 </tr>
</table>
<p align="center">
 <input type="hidden" name="send" value="send">
 <input type="hidden" name="sid" value="$session[hash]">
 <input class="input" type="submit" name="submit" accesskey="S" value="Search">
 <input class="input" type="reset" accesskey="R" value="Reset">
</p></form>
$footer
</body>
</html>   