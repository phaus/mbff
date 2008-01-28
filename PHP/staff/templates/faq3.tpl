{!DOCTYPE}<html>
<head>
<title>$master_board_name - Frequently Asked Questions</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="misc.php?action=faq&sid=$session[hash]">Frequently Asked Questions</a> » Reading and Writing Messages</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2 align="center"><normalfont><b>Reading and Writing Messages</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#1">Are there any codes I can use to format my posts?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#2">What are smilies?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#3">Quick BBCodes buttons and clickable smilies</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#5">What are post icons?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#6">How can I edit my posts?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#7">Why are some words censored in my posts?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#8">What is email notification?</a></font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="1"></a><normalfont><b>Are there any codes I can use to format my posts?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>In most cases, your posts contain normal text, but sometimes you want to emphasize certain words by indicating them, for example, in bold or italic.</p>
  <p>Depending on the settings of this forum, you can use HTML to achieve this effect. However, Administrators usually have deactivated HTML and decided to use BBCode: a set of codes that allow you to produce common text effects. BBCode has the advantage of being easy to use, and of being immune to javascript and layout interruptions.</p>
  <p>The Administrator may also have activated <b>Smilies</b>, which permits you to use small graphics to transmit feelings, and the <b>[img]</b> Code, which permits you to insert images in your posts.</p>
  <p>For more information on BBCode, click <a href="misc.php?sid=$session[hash]&action=bbcode"><b>here</b></a>.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="2"></a><normalfont><b>What are smilies?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>Smilies are small graphics you can use to express feelings, e.g. a joke or embarrassment. For example, if you have posted a sarcastic comment, instead of writing 'I was joking' you can use the 'wink' smilie.</p>
  <p>If you have used emails or chats in the past, then you probably already are familiar with this concept. Some standard codes or strings are automatically converted into smilies. For example, the code <b>:)</b> is turned into a smiling face. To more easily understand smilies code, turn your head on the side and use your imagination: You can see that <b>:)</b> represents two eyes and smile.</p>
  <p>For a complete list of the smilies used in this forum, click <a href="misc.php?sid=$session[hash]&action=showsmilies"><b>here</b></a>.</p>
  <p>Sometimes you don't want the smilie code in your post to be transformed into images. In this case, when you are posting your message, you must check the 'Deactivate smilies in this post.' box in the options.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="3"></a><normalfont><b>Quick BBCodes buttons and clickable smilies</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>These buttons allow you to quickly and easily add BBCodes to your messages. You simply need to click the button you want to use and then enter the text you want to format.</p>
  <p>There are two different editing modes: <i>Normal</i> and <i>Enhanced Mode</i>.</p>
  <p>If you are using the <i>normal</i> mode, pressing a button will open a popup asking you to enter the tet you want to format. It will then insert the BBCode at the last position of your cursor in the text area.</p>
  <p>If you are using the <i>enhanced</i> mode, pressing a button will insert the opening tag for this BBCode at the end of your message. Once you are done typing the text and want to close the tag, press the <i>close current tag</i> button (alt+c). In enhanced mode, you can also insert another tag in the current tag, and then press the <i>close all tags</i> button (alt+x) to close all the open tags. Note: the 'close tag' buttons only close tags inserted using the code buttons.</p>
  <p>To use the clickable smilies, you simply need to click the one you wish to insert in your message, or press the <i>More</i> button (if it exists) to view the complete list of smilies.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="5"></a><normalfont><b>What are post icons?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>The Administrator can activate the use of posticons in new threads, posts and private messages. Posticons are small graphics you can use to express the emotion or content of your message. If you do not see a list of posticons while writing a message, then the Administrator has probably deactivated this function.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="6"></a><normalfont><b>How can I edit my posts?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>If you are a registered member of the forums, you can edit or delete your own posts. However, this function can be deactivated by the Administrator.</p>
  <p>To edit or delete one of your post, you simply need to click the <img src="{imagefolder}/editpost.gif"> image in the appropriate post. If the post is the only one in the thread, deleting the post will probably delete the whole thread.</p>
  <p>After you have edited your post, a note, notifying other members that you have edited your post, will be displayed. Administrators and Moderators can also edit your post, however, they can choose whether or not they want this note to be displayed.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="7"></a><normalfont><b>Why are some words censored in my posts?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>The Administrator can choose to censor certain words. If your post contains any of those words, they will be replaced by another word or by asterisks (*).</p>
  <p>Every user groups have the same censored words and censoring is done automatically. The Censoring System searches for the words and replace them.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="8"></a><normalfont><b>What is email notification?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>If you are posting a new thread or reply, you can choose to be notified by email if someone else posts a message in this thread. If you wish to receive notifications about a thread you didn't post in, it can also be done, you simply need to add the thread to your favorites.</p>
  <p>If don't want to receive any notifications about a thread anymore, you can either deactivate the option by editing your post or by deleting the thread from your favorites <a href="usercp.php?sid=$session[hash]&action=favorites">here</a>.</p>
  <p>Only registered members of this forum can receive email notifications and they can choose whether or not to activate this option automatically in all their posts by editing their <a href="usercp.php?sid=$session[hash]&action=options_change">Options</a>.</p>
  <p>Email notifications are also called 'Subscriptions' or 'Favorites'.</p>
  </font></td>
 </tr>
</table>
$footer
</body>
</html>
