{!DOCTYPE}
<html>
<head>
<title>$master_board_name - Frequently Asked Questions</title>
$headinclude
</head>

<body id="bg">
 $header
 <tr bgcolor="{tablecolora}" id="tablea">
  <td><table cellpadding=0 cellspacing=0 border=0 width="100%">
   <tr>
    <td><smallfont><b><a href="index.php?sid=$session[hash]">$master_board_name</a> » <a href="misc.php?action=faq&sid=$session[hash]">Frequently Asked Questions</a> » Forum Functions Usage</b></font></td>
    <td align="right"><smallfont><b>$usercbar</b></font></td>
   </tr>
  </table></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td colspan=2 align="center"><normalfont><b>Forum Functions Usage</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#1">How can I search the forums?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#2">Can I email other members?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#3">What are private messages?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#4">How can I use the members list?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#6">What are announcements?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#7">How can I start polls and participate in them?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#8">How can I rate threads?</a></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont><b>»</b></font></td>
  <td id="tableb" bgcolor="{tablecolorb}" width="100%"><normalfont><a href="#10">What are moderators?</a></font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="1"></a><normalfont><b>How can I search the forums?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>You can search for a username or for keywords, in the whole posts or just in the subjects, by date and within specific forums. To use this function, click on the "Search" button on top of every pages. You can only search forums to which you have access rights - you cannot search private forums unless the Administrator has given you the necessary rights.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="2"></a><normalfont><b>Can I email other members?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>Yes! To email another member, you can search for the member in the <a href="memberslist.php?sid=$session[hash]">Members List</a> or click the <img src="{imagefolder}/email.gif"> button in any of the member's posts.</p>
  <p>This will usually bring you to a page with a form where you can enter your message. Once you are done writing your message, press the "Send" button and your email will be sent. For privacy reasons, the recipient's email address will not be displayed.</p>
  <p>If you can't find the "email" link or button in the member's post or in the Members List, then the member has selected that he doesn't want to receive emails from other members.</p>
  <p>Another useful function is the possibility to send a link to a thread to somebody. When viewing a thread, you will see a link called "Recommend to Friend", it will bring you to a page where you can send a short message to whomever you want.</p>
  <p>Registered members can also send messages to other members using the <a href="pms.php?sid=$session[hash]">Private Messages</a> system. For more information about privates messages, click <a href="#3">here</a>.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="3"></a><normalfont><b>What are private messages?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>If the Administrator has activated <a href="pms.php?sid=$session[hash]">Private Messages</a>, registered members can send each other private messages (also known as PM).</p>
  <p><b>Sending Private Messages</b></p>
  <p>Private Messages work almost like emails, but they are limited to the members of the forums. You can also use BBCode, smilies and add images to your messages.</p>
  <p>To send a new private message, you must click the "<a href="pms.php?sid=$session[hash]&action=newpm">New PM</a>" button in the private messages section of your control panel or the <img src="{imagefolder}/pm.gif"> button in any of a member's posts.</p>
  <p>When writing a new message, you can choose to keep/store a copy of it in your Outbox folder.</p>
  <p><b>Private Messages Folders</b></p>
  <p>Usually, you have two folders for your private messages: the Inbox and the Outbox.</p>
  <p>Your Inbox folder contains all the new messages you receive, you can then read them and view which user sent it.</p>
  <p>Your Outbox folder contains a copy of all the messages you sent and in which you selected to keep a copy.</p>
  <p>You can create new folders for your private messages using the "Create Folder" box.</p>
  <p>In all the folders, you have the ability to select messages in order to move them to another folder or delete them.</p>
  <p>You must regularly delete old messages because the Administrator has probably set a limit to the number of private messages you may have in all your folders. If you pass the number of allowed private messages, you will not be able to receive any new messages until you delete a few old messages. In your folder overview, you will find an estimate of how much space you are using.</p>
  <p>When reading a message, you will have the option to reply to the message or to forward it to one or multiple other members.</p>
  <p><b>PM Tracking</b></p>
  <p>When sending a new private message, you can select to track this message. This option will allow you to check whether or not the recipient has read your message.</p>
  <p>The tracking page is seperated in two parts: unread messages and read messages.</p>
  <p>The <b>Unread Messages</b> part displays the messages you decided to track and that have not yet been read by the recipient. Unread messages can be cancelled at any time if, for example, you think the content of the message is not relevant anymore.</p>
  <p>The <b>Read Messages</b> part displays the messages you decided to track and that have already been read by the recipient. In addition, the date and time at which the message was read will be indicated.</p>
  <p>You can also choose to stop tracking any message.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="4"></a><normalfont><b>How can I use the members list?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>The <a href="memberslist.php?sid=$session[hash]">Members List</a> contains a complete list of all the registered members of this forum. You can sort the list alphabetically by username, registration date, email address, homepage or number of posts in either ascending or descending order.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="6"></a><normalfont><b>What are announcements?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>Announcements are important messages posted by an Administrators or a Moderators. They are used to transmit certain news, indications or rules to the users. Announcements are just like other threads, except that they are displayed at the top of the threads list in a forum.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="7"></a><normalfont><b>How can I start polls and participate in them?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>You can create a poll for your thread. This is how it can be done:</p>
  <p><b>Creating a Poll</b></p>
  <p>This function allows you to ask a question and indicate a few possible answers. The other members can then vote for the answer they prefer and the results will be shown in the thread.</p>
  <p>For example, a poll could be:</p>
  <blockquote>
   <p>What is your favorite color?</p>
   <ol>
    <li>Yellow</li>
    <li>Red</li>
    <li>Green</li>
    <li>Blue</li>
   </ol>
  </blockquote>
  <p>To add a poll when posting a new thread, press the "add..." button. A new page with the poll editor will then open</p>
  <p>In the poll editor, you can indicate the question and a list of answers the members can choose from.</p>
  <p>You can also indicate the time limit for the poll, for example, you can set the poll to stay open for a week.</p>
  <p><b>Participating in a Poll</b></p>
  <p>To participate in a poll, select the answer(s) for which you would like to vote and press the "Vote" button. You can also view the results before voting by pressing the "Results" button. Participating in a poll is optional. You can vote for any answer available, or not vote at all.</p>
  <p>Choose carefully your answer, because once you have voted, you cannot change your answer.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="8"></a><normalfont><b>How can I rate threads?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>At the bottom of a thread, you will find a pull-down menu you can use to rate this thread with a number between 1-5.</p>
  <p>Rating a thread is optional, but if you think the thread is excellent, you can give it 5 stars, however, if you think the thread is terrible, you can give it only 1 star.</p>
  </font></td>
 </tr>
</table><br>
<table cellpadding=4 cellspacing=1 border=0 width="{tableinwidth}" bgcolor="{tableinbordercolor}">
 <tr bgcolor="{tabletitlecolor}" id="tabletitle">
  <td align="center"><a name="10"></a><normalfont><b>What are moderators?</b></font></td>
 </tr>
 <tr>
  <td id="tablea" bgcolor="{tablecolora}"><normalfont>
  <p>Moderators supervise certain forums. They use their administrative powers to delete or edit unwanted messages. Moderators for a certain forum were usually normal users who were especially useful and experienced in the subject of that forum.</p>
  </font></td>
 </tr>
</table><br>
$footer
</body>
</html>
