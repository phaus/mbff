{!DOCTYPE}
<html>
<head>
<title>$master_board_name - BBCodes</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » BBCodes</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
<tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2 align="center"></a><normalfont><b>What are BBCodes?</b></font></td>
 </tr>
 <tr>
  <td colspan=2 id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>Many of you probably asked yourselves the question: "What actually are BBCodes?"</p>
<p>BBCodes are a simple way to format your posts in the forums. 
They are codes easy to understand. An overview of the available BBCodes and their uses is presented below. 
Click on one of the BBCodes for an explanation and an example of it.
</p>
  </font></td>
 </tr>
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2 align="center"><normalfont><b>BBCodes Usage and Examples</b></font></td>
 </tr>
$faq_bbcode_links_bit
  <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#1">[IMG]images/email.gif[/IMG]</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#2">[URL]http://www.woltlab.de[/URL]</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#3">[URL=http://www.woltlab.de]WoltLab[/URL]</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#4">[PHP]Syntax[/PHP]</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#5">[CODE]Syntax[/CODE]</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#6">[LIST]List[/LIST]</a></font></td>
 </tr>
</table><br>
$faq_bbcode_content
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="1"></a><normalfont><b>[IMG]images/email.gif[/IMG]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can insert an image.</p>
  <p>The code [IMG]images/email.gif[/IMG] becomes <img src="./images/email.gif" border="0"></img></p>
  </font></td>
 </tr>
</table><br>

<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="2"></a><normalfont><b>[URL]http://www.woltlab.de[/URL]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can turn a URL into a link.</p>
  <p>The code [URL]http://www.woltlab.de[/URL] becomes <a href="http://www.woltlab.de" target="_blank">http://www.woltlab.de</a></p>
  </font></td>
 </tr>
</table><br>

<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="3"></a><normalfont><b>[URL=http://www.woltlab.de]WoltLab[/URL]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can turn a URL into a link. (However, you can define the name of the link yourself.)</p>
  <p>The code [URL=http://www.woltlab.de]WoltLab[/URL] becomes <a href="http://www.woltlab.de" target="_blank">WoltLab</a></p>
  </font></td>
 </tr>
</table><br>

<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="4"></a><normalfont><b>[PHP]Syntax[/PHP]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can insert syntax-highlighted PHP code.</p>
  <p>The code [PHP]Syntax[/PHP] becomes<p>
<table align="center" width="90%">
 <tr>
  <td><font face="Tahoma,Helvetica" size=2><b>php:</b></font></td>
 </tr>
 <tr>
  <td>
   <table cellpadding=4 cellspacing=1 width="100%" bgcolor="#000000">
    <tr>
     <td bgcolor="#ffffff" id="inposttable">
     <font face="Tahoma,Helvetica" size=1><font color="#000000">
<br /><br /><font color="#0000CC">< ? php
<br /><br /></font><font color="#006600">echo </font><font color="#CC0000">"Syntax"</font><font color="#006600">;
<br /><br /></font><font color="#0000CC">? >
</font>
<br /><br /></font>
</font>
     </td>
    </tr>
   </table>
  </td>
 </tr>
</table>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="5"></a><normalfont><b>[CODE]Syntax[/CODE]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can insert codes (like html).</p>
  <p>The code [CODE]Syntax[/CODE] becomes</p>
<table align="center" width="90%">
 <tr>
  <td><font face="Tahoma,Helvetica" size=2><b>code:</b></font></td>
 </tr>
 <tr>
  <td>
   <table cellpadding=4 cellspacing=1 width="100%" bgcolor="#000000">
    <tr>
     <td bgcolor="#ffffff" id="inposttable">
     <font face="Tahoma,Helvetica" size=1>
Syntax
</font>
     </td>
    </tr>
   </table>
  </td>
 </tr>
</table>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="6"></a><normalfont><b>[LIST]List[/LIST]</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>With this code, you can insert a list which can contain multiple items.</p>
  <p>The code</p>
[list]<br>
[*]Item 1<br>
[*]Item 2<br>
[*]Item 3<br>
[/list]<br>
<p>becomes</p>
<ul>
<br />
<li>Item 1
<br />
<li>Item 2
<br />
<li>Item 3
</ul>
  </font></td>
 </tr>
</table>
$footer
</body>
</html>