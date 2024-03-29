# WoltLab Burning Board 2.0 Database Backup
# generated: ---

INSERT INTO bb1_bbcodes VALUES (1,'b','<b>\\1</b>','[B]Text[/B]','With this code, you can make the text be bold.',1,1);
INSERT INTO bb1_bbcodes VALUES (2,'i','<i>\\1</i>','[I]Text[/I]','With this code, you can make the text be italic.',1,1);
INSERT INTO bb1_bbcodes VALUES (3,'email','<a href=\"mailto:\\1\">\\1</a>','[EMAIL]name@email.com[/EMAIL]','With this code, you can turn an email address into a link.',1,1);
INSERT INTO bb1_bbcodes VALUES (4,'email','<a href=\"mailto:\\2\">\\3</a>','[EMAIL=name@email.com]Name[/EMAIL]','With this code, you can turn an email address into a link. (However, you can define the name of the link yourself.)',2,1);
INSERT INTO bb1_bbcodes VALUES (5,'size','<font size=\"\\2\">\\3</font>','[SIZE=3]Text[/SIZE]','With this code, you can change the size of the text.',2,3);
INSERT INTO bb1_bbcodes VALUES (6,'quote','<table align=\"center\" width=\"90%\"><tr><td><normalfont><b>quote:</b></font></td></tr><tr><td><table cellpadding=4 cellspacing=1 width=\"100%\" bgcolor=\"{tableinbordercolor}\"><tr><td bgcolor=\"{inposttablecolor}\" id=\"inposttable\"><smallfont>\\1</font></td></tr></table></td></tr></table>','[QUOTE]This text is quoted.[/QUOTE]','With this code, you can insert quoted text.',1,10);
INSERT INTO bb1_bbcodes VALUES (7,'u','<u>\\1</u>','[U]Text[/U]','With this code, you can make the text be underlined.',1,1);
INSERT INTO bb1_bbcodes VALUES (8,'color','<font color=\"\\2\">\\3</font>','[COLOR=#0000FF]Text[/COLOR]','With this code, you can change the color of the text.',2,3);
INSERT INTO bb1_bbcodes VALUES (9,'font','<font face=\"\\2\">\\3</font>','[FONT=ARIAL]Text[/FONT]','With this code, you can change the font of the text.',2,3);
INSERT INTO bb1_bbcodes VALUES (12,'align','<div align=\"\\2\">\\3</div>','[ALIGN=right]Aligned Text[/ALIGN]','With this code, you can change the alignement of the text, images, etc. The possible options are \"right\", \"left\", \"center\" and \"justify\".',2,1);
INSERT INTO bb1_bbcodes VALUES (11,'center','<center>\\1</center>','[CENTER]Centered Text[/CENTER]','With this code, you can make the text be centered.',1,1);


INSERT INTO bb1_groups VALUES (1, 'Administrators', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, -1, -1, 1000, 'gif\njpg\njpeg', 100, 100, 10000, 'gif\njpg\njpeg\npng\nbmp\nzip\ntxt', 20480, 1000, 0);
INSERT INTO bb1_groups VALUES (2, 'Super Moderators', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, -1, -1, 500, 'gif\njpg\njpeg', 100, 100, 10000, 'gif\njpg\njpeg\npng\nbmp\nzip\ntxt', 204800, 500, 0);
INSERT INTO bb1_groups VALUES (3, 'Moderators', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, -1, -1, 500, 'gif\njpg\njpeg', 100, 100, 10000, 'gif\njpg\njpeg\npng\nbmp\nzip\ntxt', 20480, 500, 0);
INSERT INTO bb1_groups VALUES (4, 'Users', 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, -1, 1, 250, 'gif\njpg\njpeg', 100, 100, 10000, 'gif\njpg\njpeg\npng\nbmp\nzip\ntxt', 20480, 250, 2);
INSERT INTO bb1_groups VALUES (5, 'Guests', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 0, 1);

INSERT INTO bb1_icons VALUES (1,'{imagefolder}/icons/icon1.gif','',0);
INSERT INTO bb1_icons VALUES (2,'{imagefolder}/icons/icon2.gif','Wink',0);
INSERT INTO bb1_icons VALUES (3,'{imagefolder}/icons/icon3.gif','Attention',0);
INSERT INTO bb1_icons VALUES (4,'{imagefolder}/icons/icon4.gif','Question',0);
INSERT INTO bb1_icons VALUES (5,'{imagefolder}/icons/icon5.gif','Big Grin',0);
INSERT INTO bb1_icons VALUES (6,'{imagefolder}/icons/icon6.gif','Mad',0);
INSERT INTO bb1_icons VALUES (7,'{imagefolder}/icons/icon7.gif','Cool',0);
INSERT INTO bb1_icons VALUES (8,'{imagefolder}/icons/icon8.gif','Shocked',0);
INSERT INTO bb1_icons VALUES (9,'{imagefolder}/icons/icon9.gif','Frown',0);
INSERT INTO bb1_icons VALUES (10,'{imagefolder}/icons/icon10.gif','Lamp',0);
INSERT INTO bb1_icons VALUES (11,'{imagefolder}/icons/icon11.gif','Angry',0);
INSERT INTO bb1_icons VALUES (12,'{imagefolder}/icons/icon12.gif','Arrow',0);
INSERT INTO bb1_icons VALUES (13,'{imagefolder}/icons/icon13.gif','Smile',0);
INSERT INTO bb1_icons VALUES (14,'{imagefolder}/icons/icon14.gif','Text',0);
INSERT INTO bb1_icons VALUES (15,'{imagefolder}/icons/icon15.gif','Sad',0);
INSERT INTO bb1_icons VALUES (16,'{imagefolder}/icons/icon16.gif','Thumb Up!',0);
INSERT INTO bb1_icons VALUES (17,'{imagefolder}/icons/icon17.gif','Thumb Down!',0);
INSERT INTO bb1_icons VALUES (18,'{imagefolder}/icons/icon18.gif','Tongue',0);


INSERT INTO bb1_optiongroups VALUES (1,'Turn Forum On/Off',1);
INSERT INTO bb1_optiongroups VALUES (2,'General Options',2);
INSERT INTO bb1_optiongroups VALUES (3,'Main Page',3);
INSERT INTO bb1_optiongroups VALUES (4,'Registration',8);
INSERT INTO bb1_optiongroups VALUES (5,'Posting & Editing',7);
INSERT INTO bb1_optiongroups VALUES (6,'Categories and Forum',4);
INSERT INTO bb1_optiongroups VALUES (7,'Threads List',5);
INSERT INTO bb1_optiongroups VALUES (8,'Thread Display',6);
INSERT INTO bb1_optiongroups VALUES (9,'Members',9);
INSERT INTO bb1_optiongroups VALUES (10,'Private Messages',10);
INSERT INTO bb1_optiongroups VALUES (11,'Templates Output/Options',13);
INSERT INTO bb1_optiongroups VALUES (12,'Date & Time',14);
INSERT INTO bb1_optiongroups VALUES (13,'Search Function',11);
INSERT INTO bb1_optiongroups VALUES (14,'Censorship & Banning',15);
INSERT INTO bb1_optiongroups VALUES (16,'Flood Control',16);
INSERT INTO bb1_optiongroups VALUES (17,'Other',17);


INSERT INTO bb1_options VALUES (1,0,'rekordtime',0,'','','',0);
INSERT INTO bb1_options VALUES (2,0,'rekord',0,'','','',0);
INSERT INTO bb1_options VALUES (3,12,'dateformat','m-d-Y','Date Format:','Enter the standard date format for the board.','text',0);
INSERT INTO bb1_options VALUES (4,12,'timeformat','H:i','Time Format:','Enter the standard time format for the board.','text',0);
INSERT INTO bb1_options VALUES (7,3,'index_depth',2,'Forum Depth:','Enter the number of levels of forums/categories to be displayed on the main page. If the number is high, the load time will increase.','text',2);
INSERT INTO bb1_options VALUES (8,3,'show_subboards',0,'Show Subforums?','If this option is activated, there will be a link to a board\'s subforums. If you have a lot of subforums, it might increase the load speed, but it still will be better than to have a higher forum depth.','truefalse',3);
INSERT INTO bb1_options VALUES (9,3,'showlastposttitle',1,'Show Last Post Title?','If this option is activated, in the \"Last Post\" table on the main page, it will show, in addition to the time and author, the title and icon of the last post. Deactivating this option will lower the load time.','truefalse',4);
INSERT INTO bb1_options VALUES (10,2,'master_board_name','Name of Forums','Board Name:','Enter the name of the board.','text',1);
INSERT INTO bb1_options VALUES (12,3,'showuseronline',1,'Show \"Users Online\"?','Do you want to display which users are currently browing the forums?','truefalse',7);
INSERT INTO bb1_options VALUES (13,3,'showpmonindex',0,'Show the \"Private Messages\" box?','Do you want to display the summary of your private messages on the main page?','truefalse',6);
INSERT INTO bb1_options VALUES (17,4,'emailverifymode',1,'Email Verification:','Select the method you want to use to check an email address\' validity.','<select name=\\\"option[$row[optionid]]\\\">\r\n <option value=\\\"0\\\">No Verification - Immediate Activation</option>\r\n <option value=\\\"1\\\"\".ifelse($row[value]==1,\" selected\").\">Send Activation Code</option>\r\n <option value=\\\"2\\\"\".ifelse($row[value]==2,\" selected\").\">Manual Activation</option>\r\n <option value=\\\"3\\\"\".ifelse($row[value]==3,\" selected\").\">Send Random Password</option>\r\n</select>',3);
INSERT INTO bb1_options VALUES (19,5,'dostopshooting',1,'Prevent uppercases only titles?','If this option is activated, post title which consist of uppercase letters only, will be turned into lowercases, except for the first letter of each word.','truefalse',2);
INSERT INTO bb1_options VALUES (20,5,'showpostsinreply',10,'Posts in Reply:','How many posts do you want displayed when posting a reply?','text',6);
INSERT INTO bb1_options VALUES (21,5,'smilie_table_cols',3,'Number of columns for the Smilies table:','How many columns do you want displayed in the Smilies table?','text',3);
INSERT INTO bb1_options VALUES (22,5,'smilie_table_rows',15,'Max. number of smilies in the Smilies table:','How many smilies do you want to display in the smilies table when posting a new message?','text',4);
INSERT INTO bb1_options VALUES (23,17,'maxpolloptions',10,'Max. Poll Options:','Enter the maximum number of options a poll can have.','text',0);
INSERT INTO bb1_options VALUES (24,5,'postmaxchars',10000,'Max. Message Length:','Enter the maximum number of characters a post can contain.','text',1);
INSERT INTO bb1_options VALUES (25,5,'newthread_default_checked_0',1,'New Thread - Options Box 1:','Always check the \"Convert URLs\" box when posting a new thread?','truefalse',8);
INSERT INTO bb1_options VALUES (27,5,'newthread_default_checked_2',0,'New Thread - Options Box 2:','Always check the \"Deactivate Smilies.\" box when posting a new thread?','truefalse',10);
INSERT INTO bb1_options VALUES (28,5,'newthread_default_checked_3',1,'New Thread - Options Box 3:','Always check the \"Add Signature\" box when posting a new thread?','truefalse',11);
INSERT INTO bb1_options VALUES (29,17,'maxnotifymails',3,'Max. Notifications','Enter the maximum number of notifications for a thread/forum will recieve without subscribing to it.','text',0);
INSERT INTO bb1_options VALUES (30,2,'frommail','xyz@xyz.com','From Email Address:','Enter the from address for all the emails automatically sent by the forums.','text',4);
INSERT INTO bb1_options VALUES (32,5,'addreply_default_checked_0',1,'New Reply - Options Box 1:','Always check the \"Convert URLs\" box when posting a new reply?','truefalse',11);
INSERT INTO bb1_options VALUES (34,5,'addreply_default_checked_2',0,'New Reply - Options Box 2:','Always check the \"Deactivate Smilies.\" box when posting a new reply?','truefalse',13);
INSERT INTO bb1_options VALUES (35,5,'addreply_default_checked_3',1,'New Reply - Options Box 3:','Always check the \"Add Signature\" box when posting a new reply?','truefalse',15);
INSERT INTO bb1_options VALUES (36,2,'useronlinetimeout',15,'User Online Timeout:','Enter the number of minutes after inactivity a user is to be taken off of \"Users Online\".','text',6);
INSERT INTO bb1_options VALUES (37,6,'board_depth',2,'Forum Depth:','Enter the number of levels of forums/categories to be displayed in a forum/category. If the number is high, the load time will increase.','text',1);
INSERT INTO bb1_options VALUES (39,7,'default_threadsperpage',20,'Threads per page:','Enter the number of threads to be displayed per page when viewing a forum.','text',1);
INSERT INTO bb1_options VALUES (40,7,'default_daysprune',100,'Standard Threads Display:','Select how the threads are to be filtered.','<select name=\\\"option[$row[optionid]]\\\">\r\n <option value=\\\"1500\\\">Show new threads since last visit</option>\r\n <option value=\\\"1\\\"\".ifelse($row[value]==1,\" selected\").\">Show threads from the last day</option>\r\n <option value=\\\"2\\\"\".ifelse($row[value]==2,\" selected\").\">Show threads from the last 2 days</option>\r\n <option value=\\\"5\\\"\".ifelse($row[value]==5,\" selected\").\">Show threads from the last 5 days</option>\r\n <option value=\\\"10\\\"\".ifelse($row[value]==10,\" selected\").\">Show threads from the last 10 days</option>\r\n <option value=\\\"20\\\"\".ifelse($row[value]==20,\" selected\").\">Show threads from the last 20 days</option>\r\n <option value=\\\"30\\\"\".ifelse($row[value]==30,\" selected\").\">Show threads from the last 30 days</option>\r\n <option value=\\\"45\\\"\".ifelse($row[value]==45,\" selected\").\">Show threads from the last 45 days</option>\r\n <option value=\\\"60\\\"\".ifelse($row[value]==60,\" selected\").\">Show threads from the last 60 days</option>\r\n <option value=\\\"75\\\"\".ifelse($row[value]==75,\" selected\").\">Show threads from the last 75 days</option>\r\n <option value=\\\"100\\\"\".ifelse($row[value]==100,\" selected\").\">Show threads from the last 100 days</option>\r\n <option value=\\\"365\\\"\".ifelse($row[value]==365,\" selected\").\">Show threads from the last year</option>\r\n <option value=\\\"1000\\\"\".ifelse($row[value]==1000,\" selected\").\">Show all threads</option>\r\n</select>',2);
INSERT INTO bb1_options VALUES (41,8,'default_postsperpage',20,'Posts per page:','Enter the number of posts to be displayed per page when viewing a thread.','text',1);
INSERT INTO bb1_options VALUES (42,7,'showmultipages',4,'How many links?','Enter the maximum number of links to the other pages of a thread can be displayed.','text',4);
INSERT INTO bb1_options VALUES (43,9,'showavatar',1,'Show Avatar?','Do you want to display the avatars?','truefalse',5);
INSERT INTO bb1_options VALUES (45,8,'showregdateinthread',1,'Show Reg. Date in Threads?','Do you want to display the registration date of a user in his/her posts?','truefalse',4);
INSERT INTO bb1_options VALUES (46,8,'showuserpostsinthread',1,'Show Post Count in Threads?','Do you want to display the number of posts a user has made in his/her posts?','truefalse',5);
INSERT INTO bb1_options VALUES (48,8,'showgenderinthread',1,'Show Gender?','Do you want to display the gender of a user when viewing a thread?','truefalse',7);
INSERT INTO bb1_options VALUES (49,8,'showonlineinthread',1,'Show Online Status?','Do you want to display the status (whether he/she is online or not) of a user when viewing a thread?','truefalse',8);
INSERT INTO bb1_options VALUES (52,5,'editpost_default_checked_0',1,'Edit Post - Options Box 1:','Always check the \"Convert URLs\" box when editing a post?','truefalse',16);
INSERT INTO bb1_options VALUES (54,9,'membersperpage',30,'Members per page:','Enter the number of members to be displayed per page when viewing the members list.','text',11);
INSERT INTO bb1_options VALUES (55,9,'showlastpostinprofile',1,'Show Last Post?','Do you want to display the last post made by a user in his/her profile?','truefalse',9);
INSERT INTO bb1_options VALUES (56,4,'allowregister',1,'Accept New Registrations?','If you select no, registrations will be closed.','truefalse',1);
INSERT INTO bb1_options VALUES (57,4,'showdisclaimer',1,'Show Disclaimer?','Do you want to show the disclaimer before someone registers?','truefalse',2);
INSERT INTO bb1_options VALUES (59,12,'default_timezoneoffset',1,'Timezone Offset:','Enter the time difference, in hours, between your timezone and GMT.','text',0);
INSERT INTO bb1_options VALUES (61,9,'allowsightml',0,'Allow HTML in signatures?','Do you want to allow your members to use HTML in their signatures?','truefalse',1);
INSERT INTO bb1_options VALUES (62,9,'allowsigbbcode',1,'Allow BBCode in signatures?','Do you want to allow your members to use BBCode in their signatures?','truefalse',2);
INSERT INTO bb1_options VALUES (63,9,'allowsigsmilies',1,'Allow smilies in signatures?','Do you want to allow your members to use smilies in their signatures?','truefalse',3);
INSERT INTO bb1_options VALUES (64,9,'maxsigimage',1,'Max. number of pictures in users signature:','How many pictures want to allow your members to be able to use in their signatures?','text',4);
INSERT INTO bb1_options VALUES (65,9,'avatarsperpage',25,'Avatars per page','Enter the number of avatars to be displayed per page when choosing an avatar.','text',7);
INSERT INTO bb1_options VALUES (66,11,'gzip',0,'Use GZip Compression?','Do you want to compress pages in GZip format when they are output? This could reduce the traffic of your forums substantially.','truefalse',0);
INSERT INTO bb1_options VALUES (67,11,'gziplevel',1,'GZip Compression Level:','Enter the level of the GZip compression.','text',0);
INSERT INTO bb1_options VALUES (69,13,'minwordlength',3,'Min. Word Length:','Enter the minimum length of a word when searching the forums.','text',0);
INSERT INTO bb1_options VALUES (70,13,'maxwordlength',20,'Max. Word Length:','Enter the maximum length of a word when searching the forums.','text',0);
INSERT INTO bb1_options VALUES (71,3,'showstats',0,'Show Statistics?','Do you want to show stats on the main page?','truefalse',10);
INSERT INTO bb1_options VALUES (72,8,'usecode',1,'Allow Code tags?','Do you want to allow the PHP&Code tags in threads?','truefalse',3);
INSERT INTO bb1_options VALUES (73,8,'showpagelinks',3,'Number of pages links:','Enter the maximum number of links to the other pages of a thread can be displayed.','text',2);
INSERT INTO bb1_options VALUES (74,0,'modids',3,'','','',0);
INSERT INTO bb1_options VALUES (75,0,'smodids',2,'','','',0);
INSERT INTO bb1_options VALUES (76,0,'adminids',1,'','','',0);
INSERT INTO bb1_options VALUES (78,2,'url2board','http://www.xyz.com/wbb','URL of Forum','Enter the url to the board directory (with no final \"/\").<br>\r\n<b>Right: http://www.xyz.com/wbblite</b><br>\r\nWrong: http://www.xyz.com/wbblite/<br>\r\nWrong: http://www.xyz.com/wbblite/index.php','text',2);
INSERT INTO bb1_options VALUES (79,2,'webmastermail','xyz@xyz.com','Contact Email:','Enter the email address of the contact person or the administrator.','text',3);
INSERT INTO bb1_options VALUES (80,11,'sendheaders',0,'Send Standard Headers?','With some web servers, this option can cause problems, with others, it is needed. ','truefalse',0);
INSERT INTO bb1_options VALUES (81,11,'sendnocacheheaders',0,'Deactivate Cache Headers?','With this option you can prevent caching of the page by the browser.','truefalse',0);
INSERT INTO bb1_options VALUES (82,7,'default_hotthread_reply',20,'Replies needed for becoming a hot thread:','Enter the number of replies a thread needs for becoming a hot thread.','text',5);
INSERT INTO bb1_options VALUES (83,7,'default_hotthread_view',100,'Views needed for becoming a hot thread:','Enter the number of views a thread needs for becoming a hot thread.','text',6);
INSERT INTO bb1_options VALUES (84,10,'maxpms',50,'Max. PMs:','Enter the maximum number of private messages a user can have.','text',2);
INSERT INTO bb1_options VALUES (85,6,'showboardjump',1,'Show \"Go to:\" box?','Do you want to show the forum jump select box?','truefalse',2);
INSERT INTO bb1_options VALUES (86,10,'maxfolders',2,'Max. Folders:','Enter here the maximum number of folders a user can have (does not include the Inbox & Outbox).','text',3);
INSERT INTO bb1_options VALUES (87,10,'pm_allowsmilies',1,'Allow Smilies?','Do you want to allow smilies in private messages?','truefalse',4);
INSERT INTO bb1_options VALUES (88,10,'pm_allowbbcode',1,'Allow BBCode?','Do you want to allow BBCode in private messages?','truefalse',5);
INSERT INTO bb1_options VALUES (89,10,'pm_allowhtml',0,'Allow HTML?','Do you want to allow HTML in private messages?','truefalse',6);
INSERT INTO bb1_options VALUES (90,10,'pm_allowimages',1,'Allow Images?','Do you want to allow images in private messages?','truefalse',7);
INSERT INTO bb1_options VALUES (91,10,'pmmaxchars',10000,'Max. PM Length:','Enter the maximum number of characters a private message can contain.','text',1);
INSERT INTO bb1_options VALUES (92,10,'newpm_default_checked_0',1,'New PM - Options Box 1:','Always check the \"Convert URLs\" box when writing a new pm?','truefalse',8);
INSERT INTO bb1_options VALUES (93,10,'newpm_default_checked_1',0,'New PM - Options Box 2:','Always check the \"Deactivate Smilies.\" box when writing a new pm?','truefalse',9);
INSERT INTO bb1_options VALUES (94,10,'newpm_default_checked_2',1,'New PM - Options Box 3:','Always check the \"Add Signature\" box when writing a new pm?','truefalse',10);
INSERT INTO bb1_options VALUES (95,10,'newpm_default_checked_3',1,'New PM - Options Box 4:','Always check the \"Keep a Copy\" box when writing a new pm?','truefalse',11);
INSERT INTO bb1_options VALUES (96,10,'newpm_default_checked_4',1,'New PM - Options Box 5:','Always check the  \"Message Tracking\" box when writing a new pm?','truefalse',12);
INSERT INTO bb1_options VALUES (97,14,'docensor',0,'Activate censors?','Do you want to censor certain words in posts?','truefalse',0);
INSERT INTO bb1_options VALUES (107,1,'offlinemessage','','Offline Message:','Enter the reason for turning the board offline, it will be displayed if your forum is offline. ','textarea',2);
INSERT INTO bb1_options VALUES (108,1,'offline',0,'Forum Status:','','<select name=\\\"option[$row[optionid]]\\\">\r\n <option value=\\\"0\\\">Online</option>\r\n <option value=\\\"1\\\"\".ifelse($row[value],\" selected\").\">Offline</option>\r\n</select>',1);
INSERT INTO bb1_options VALUES (109,16,'dpvtime',86400,'Double Post Control Time:','Enter the number of seconds between which 2 identical posts can be posted in the same thread.','text',2);
INSERT INTO bb1_options VALUES (110,16,'fctime',30,'Flood Control Time:','Enter the number of seconds before a user can post another message.','text',1);
INSERT INTO bb1_options VALUES (111,5,'showsmiliesrandom',0,'Show smilies randomly?','Do you want the smilies to be arranged randomly in the smilies box?','truefalse',5);
INSERT INTO bb1_options VALUES (112,13,'badsearchwords','a\'s\r\nable\r\nabout\r\nabove\r\naccording\r\naccordingly\r\nacross\r\nactually\r\nafter\r\nafterwards\r\nagain\r\nagainst\r\nain\'t\r\nall\r\nallow\r\nallows\r\nalmost\r\nalone\r\nalong\r\nalready\r\nalso\r\nalthough\r\nalways\r\namong\r\namongst\r\nand\r\nanother\r\nany\r\nanybody\r\nanyhow\r\nanyone\r\nanything\r\nanyway\r\nanyways\r\nanywhere\r\napart\r\nappear\r\nappreciate\r\nappropriate\r\nare\r\naren\'t\r\naround\r\naside\r\nask\r\nasking\r\nassociated\r\navailable\r\naway\r\nawfully\r\nbecame\r\nbecause\r\nbecome\r\nbecomes\r\nbecoming\r\nbeen\r\nbefore\r\nbeforehand\r\nbehind\r\nbeing\r\nbelieve\r\nbelow\r\nbeside\r\nbesides\r\nbest\r\nbetter\r\nbetween\r\nbeyond\r\nboth\r\nbrief\r\nbut\r\nc\'mon\r\nc\'s\r\ncame\r\ncan\r\ncan\'t\r\ncannot\r\ncant\r\ncause\r\ncauses\r\ncertain\r\ncertainly\r\nchanges\r\nclearly\r\ncom\r\ncome\r\ncomes\r\nconcerning\r\nconsequently\r\nconsider\r\nconsidering\r\ncontain\r\ncontaining\r\ncontains\r\ncorresponding\r\ncould\r\ncouldn\'t\r\ncourse\r\ncurrently\r\ndefinitely\r\ndescribed\r\ndespite\r\ndid\r\ndidn\'t\r\ndifferent\r\ndoes\r\ndoesn\'t\r\ndoing\r\ndon\'t\r\ndone\r\ndown\r\ndownwards\r\nduring\r\neach\r\nedu\r\neight\r\neither\r\nelse\r\nelsewhere\r\nenough\r\nentirely\r\nespecially\r\netc\r\neven\r\never\r\nevery\r\neverybody\r\neveryone\r\neverything\r\neverywhere\r\nexactly\r\nexample\r\nexcept\r\nfar\r\nfew\r\nfifth\r\nfirst\r\nfive\r\nfollowed\r\nfollowing\r\nfollows\r\nfor\r\nformer\r\nformerly\r\nforth\r\nfour\r\nfrom\r\nfurther\r\nfurthermore\r\nget\r\ngets\r\ngetting\r\ngiven\r\ngives\r\ngoes\r\ngoing\r\ngone\r\ngot\r\ngotten\r\ngreetings\r\nhad\r\nhadn\'t\r\nhappens\r\nhardly\r\nhas\r\nhasn\'t\r\nhave\r\nhaven\'t\r\nhaving\r\nhe\'s\r\nhello\r\nhelp\r\nhence\r\nher\r\nhere\r\nhere\'s\r\nhereafter\r\nhereby\r\nherein\r\nhereupon\r\nhers\r\nherself\r\nhim\r\nhimself\r\nhis\r\nhither\r\nhopefully\r\nhow\r\nhowbeit\r\nhowever\r\ni\'d\r\ni\'ll\r\ni\'m\r\ni\'ve\r\nignored\r\nimmediate\r\ninasmuch\r\ninc\r\nindeed\r\nindicate\r\nindicated\r\nindicates\r\ninner\r\ninsofar\r\ninstead\r\ninto\r\ninward\r\nisn\'t\r\nit\'d\r\nit\'ll\r\nit\'s\r\nits\r\nitself\r\njust\r\nkeep\r\nkeeps\r\nkept\r\nknow\r\nknows\r\nknown\r\nlast\r\nlately\r\nlater\r\nlatter\r\nlatterly\r\nleast\r\nless\r\nlest\r\nlet\r\nlet\'s\r\nlike\r\nliked\r\nlikely\r\nlittle\r\nlook\r\nlooking\r\nlooks\r\nltd\r\nmainly\r\nmany\r\nmay\r\nmaybe\r\nmean\r\nmeanwhile\r\nmerely\r\nmight\r\nmore\r\nmoreover\r\nmost\r\nmostly\r\nmuch\r\nmust\r\nmyself\r\nname\r\nnamely\r\nnear\r\nnearly\r\nnecessary\r\nneed\r\nneeds\r\nneither\r\nnever\r\nnevertheless\r\nnew\r\nnext\r\nnine\r\nnobody\r\nnon\r\nnone\r\nnoone\r\nnor\r\nnormally\r\nnot\r\nnothing\r\nnovel\r\nnow\r\nnowhere\r\nobviously\r\noff\r\noften\r\nokay\r\nold\r\nonce\r\none\r\nones\r\nonly\r\nonto\r\nother\r\nothers\r\notherwise\r\nought\r\nour\r\nours\r\nourselves\r\nout\r\noutside\r\nover\r\noverall\r\nown\r\nparticular\r\nparticularly\r\nper\r\nperhaps\r\nplaced\r\nplease\r\nplus\r\npossible\r\npresumably\r\nprobably\r\nprovides\r\nque\r\nquite\r\nrather\r\nreally\r\nreasonably\r\nregarding\r\nregardless\r\nregards\r\nrelatively\r\nrespectively\r\nright\r\nsaid\r\nsame\r\nsaw\r\nsay\r\nsaying\r\nsays\r\nsecond\r\nsecondly\r\nsee\r\nseeing\r\nseem\r\nseemed\r\nseeming\r\nseems\r\nseen\r\nself\r\nselves\r\nsensible\r\nsent\r\nseriously\r\nseven\r\nseveral\r\nshall\r\nshe\r\nshould\r\nshouldn\'t\r\nsince\r\nsix\r\nsome\r\nsomebody\r\nsomehow\r\nsomeone\r\nsomething\r\nsometime\r\nsometimes\r\nsomewhat\r\nsomewhere\r\nsoon\r\nsorry\r\nspecified\r\nspecify\r\nspecifying\r\nstill\r\nsub\r\nsuch\r\nsup\r\nsure\r\nt\'s\r\ntake\r\ntaken\r\ntell\r\ntends\r\nthan\r\nthank\r\nthanks\r\nthanx\r\nthat\r\nthat\'s\r\nthats\r\nthe\r\ntheir\r\ntheirs\r\nthem\r\nthemselves\r\nthen\r\nthence\r\nthere\r\nthere\'s\r\nthereafter\r\nthereby\r\ntherefore\r\ntherein\r\ntheres\r\nthereupon\r\nthese\r\nthey\r\nthey\'d\r\nthey\'ll\r\nthey\'re\r\nthey\'ve\r\nthink\r\nthird\r\nthis\r\nthorough\r\nthoroughly\r\nthose\r\nthough\r\nthree\r\nthrough\r\nthroughout\r\nthru\r\nthus\r\ntogether\r\ntoo\r\ntook\r\ntoward\r\ntowards\r\ntried\r\ntries\r\ntruly\r\ntry\r\ntrying\r\ntwice\r\ntwo\r\nunder\r\nunfortunately\r\nunless\r\nunlikely\r\nuntil\r\nunto\r\nupon\r\nuse\r\nused\r\nuseful\r\nuses\r\nusing\r\nusually\r\nvalue\r\nvarious\r\nvery\r\nvia\r\nviz\r\nwant\r\nwants\r\nwas\r\nwasn\'t\r\nway\r\nwe\'d\r\nwe\'ll\r\nwe\'re\r\nwe\'ve\r\nwelcome\r\nwell\r\nwent\r\nwere\r\nweren\'t\r\nwhat\r\nwhat\'s\r\nwhatever\r\nwhen\r\nwhence\r\nwhenever\r\nwhere\r\nwhere\'s\r\nwhereafter\r\nwhereas\r\nwhereby\r\nwherein\r\nwhereupon\r\nwherever\r\nwhether\r\nwhich\r\nwhile\r\nwhither\r\nwho\r\nwho\'s\r\nwhoever\r\nwhole\r\nwhom\r\nwhose\r\nwhy\r\nwill\r\nwilling\r\nwish\r\nwith\r\nwithin\r\nwithout\r\nwon\'t\r\nwonder\r\nwould\r\nwould\r\nwouldn\'t\r\nyes\r\nyet\r\nyou\r\nyou\'d\r\nyou\'ll\r\nyou\'re\r\nyou\'ve\r\nyour\r\nyours\r\nyourself\r\nyourselves\r\nzero','Forbidden Search Words:','Enter words forbidden when searching the forums. These words should usually be ones we often use when writing.<br>\r\n(one word per line)','textarea',0);
INSERT INTO bb1_options VALUES (113,17,'turnoff_formmail',0,'Deactivate Form Mailer?','','truefalse',0);
INSERT INTO bb1_options VALUES (120,0,'installdate',1029794749,'','','',0);
INSERT INTO bb1_options VALUES (121,11,'cookiepath','','Cookie Path:','Enter the path to where your forum is located.','text',6);
INSERT INTO bb1_options VALUES (122,11,'cookiedomain','','Cookie Domain:','Enter the domain under which the cookies should be stored.','text',7);
INSERT INTO bb1_options VALUES (123,14,'ban_ip','','Banned IP Adresses:','Enter the IPs to be blocked from the site.<br>\r\n- One IP per line<br>\r\n- Add \"*\" at the end of an IP to block partial IPs (ie: 34.546.54.* will also block 34.546.54.4,34.546.54.798, etc)','textarea',4);
INSERT INTO bb1_options VALUES (124,14,'censorwords','','Censored Words:','Enter a word per line according to the following standards:<br><br>\r\n- Exact match with a replacement word: {badword=goodword}<br>\r\n- Exact match replaced by standard replacing char: {badword}<br>\r\n- Inaccurate match (also replaces word parts): badword<br>\r\n- Inaccurate match with a replacement word: badword=goodword<br>','textarea',2);
INSERT INTO bb1_options VALUES (125,14,'censorcover','*','Standard Replacement Char:','Enter the character that should replace censored words.','text',3);
INSERT INTO bb1_options VALUES (126,14,'ban_name','','Reserved Names:','Enter the reserved/forbidden usernames, no one will be able to register with them.<br>- One name per line<br>- This is not case sensitive','textarea',5);
INSERT INTO bb1_options VALUES (127,14,'ban_email','','Reserved Email Addresses:','Enter the reserved/forbidden email addresses, no one will be able to register with them.<br>- One email per line<br>- To lock domains, you could use \"*\". (Example: \"*@woltlab.de\" locks all email addresses ending with \"@woltlab.de\")','textarea',6);
INSERT INTO bb1_options VALUES (128,0,'boardversion','1.0.1','','','',0);
INSERT INTO bb1_options VALUES (132,4,'default_register_nosessionhash',1,'Default: \"Use Cookies?\"','Default value for \"Use Cookies?\" in the registration form.','truefalse',9);
INSERT INTO bb1_options VALUES (133,4,'default_register_usecookies',1,'Default: \"Remember Me?\"','Default value for \"Remember Me?\" in the registration form.','truefalse',10);
INSERT INTO bb1_options VALUES (134,4,'default_register_admincanemail',1,'Default: \"Can the Admins email you?\"','Default value for \"Can the Admins email you?\" in the registration form.','truefalse',11);
INSERT INTO bb1_options VALUES (135,4,'default_register_showemail',0,'Default: \"Hide email address?\"','Default value for \"Hide email address?\" in the registration form.','truefalse',12);
INSERT INTO bb1_options VALUES (136,4,'default_register_usercanemail',1,'Default: \"Can members email you using the formmailer?\"','Default value for \"Can members email you using the formmailer?\" in the registration form.','truefalse',13);
INSERT INTO bb1_options VALUES (137,4,'default_register_emailnotify',0,'Default: \"Enable email notification by default?\"','Default value for \"Enable email notification by default?\" in the registration form.','truefalse',14);
INSERT INTO bb1_options VALUES (138,4,'default_register_receivepm',1,'Default: \"Can members send you private messages?\"','Default value for \"Can members send you private messages?\" in the registration form.','truefalse',15);
INSERT INTO bb1_options VALUES (139,4,'default_register_emailonpm',0,'Default: \"Email Notification on new PM?\"','Default value for \"Email Notification on new PM?\" in the registration form.','truefalse',16);
INSERT INTO bb1_options VALUES (140,4,'default_register_pmpopup',0,'Default: \"Pop Up Notification on new PM?\"','Default value for \"Pop Up Notification on new PM?\" in the registration form.','truefalse',17);
INSERT INTO bb1_options VALUES (141,4,'default_register_showsignatures',1,'Default: \"Show other members\' signatures?\"','Default value for \"Show other members\' signatures?\" in the registration form.','truefalse',18);
INSERT INTO bb1_options VALUES (142,4,'default_register_showavatars',1,'Default: \"Show other members\' avatars?\"','Default value for \"Show other members\' avatars?\" in the registration form.','truefalse',19);
INSERT INTO bb1_options VALUES (143,4,'default_register_showimages',1,'Default: \"Show images in posts?\"','Default value for \"Show images in posts?\" in the registration form.','truefalse',20);
INSERT INTO bb1_options VALUES (144,4,'default_register_threadview',0,'Default: \"Threads Structure Display:\"','Default value for \"Threads Structure Display:\" in the registration form.','<select name=\\\"option[$row[optionid]]\\\">\r\n <option value=\\\"1\\\">Tree Structure</option>\r\n <option value=\\\"0\\\"\".ifelse($row[value]==0,\" selected\").\">Board Structure</option>\r\n</select>',21);
INSERT INTO bb1_options VALUES (145,2,'sessiontimeout',1800,'Session Length:','After how much time, in seconds, should a session be deleted?','text',8);
INSERT INTO bb1_options VALUES (146,2,'adminsession_timeout',1800,'Session Length for Admin:','After how much time, in seconds, should a session be deleted in the Admin/Mod CP?','text',9);
INSERT INTO bb1_options VALUES (147,17,'picmaxwidth',600,'Max. width of an attached image in a post:','Enter the maximum width an uploaded image can have in order to be displayed in a post.<br>\r\nPut 0 if you want to accept any width.','text',6);
INSERT INTO bb1_options VALUES (148,17,'picmaxheight',600,'Max. heigth of an attached image in a post:','Enter the maximum height an uploaded image can have in order to be displayed in a post.<br>\r\nPut 0 if you want to accept any height.','text',7);
INSERT INTO bb1_options VALUES (149,5,'default_prefix','','Default Prefix:','Enter the default prefixes. The default can be overwritten depending on the settings of each forums. Enter one prefix per line.','textarea',7);
INSERT INTO bb1_options VALUES (150,4,'regnotify',0,'eMail notification at new registration?','','truefalse',7);


INSERT INTO bb1_profilefields VALUES (1,'Location','Where do you come from?',0,1,0,250,25,1);
INSERT INTO bb1_profilefields VALUES (2,'Interests','What are your hobbies? What interests you?',0,0,0,250,25,2);
INSERT INTO bb1_profilefields VALUES (3,'Occupation','What is your occupation?',0,0,0,250,25,3);


INSERT INTO bb1_ranks VALUES (1,1,0,0,'Administrator','{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif');
INSERT INTO bb1_ranks VALUES (2,2,0,0,'Super Moderator','{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif');
INSERT INTO bb1_ranks VALUES (3,3,0,0,'Moderator','{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif');
INSERT INTO bb1_ranks VALUES (4,4,0,0,'Newbie','{imagefolder}/star.gif');
INSERT INTO bb1_ranks VALUES (5,4,0,10,'Cool Newbie','{imagefolder}/star.gif;{imagefolder}/star.gif');
INSERT INTO bb1_ranks VALUES (6,4,0,25,'Member','{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif');
INSERT INTO bb1_ranks VALUES (7,4,0,50,'Conqueror','{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif');
INSERT INTO bb1_ranks VALUES (8,4,0,75,'Forum As','{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif;{imagefolder}/star.gif');
INSERT INTO bb1_ranks VALUES (9,4,0,100,'Double As','{imagefolder}/star2.gif');
INSERT INTO bb1_ranks VALUES (10,4,0,150,'Triple As','{imagefolder}/star2.gif;{imagefolder}/star2.gif');
INSERT INTO bb1_ranks VALUES (11,4,0,250,'Lord','{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif');
INSERT INTO bb1_ranks VALUES (12,4,0,500,'Viking','{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif');
INSERT INTO bb1_ranks VALUES (13,4,0,750,'King','{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif;{imagefolder}/star2.gif');
INSERT INTO bb1_ranks VALUES (14,4,0,1000,'Emperor','{imagefolder}/star3.gif');
INSERT INTO bb1_ranks VALUES (15,4,0,1500,'Forum Legend','{imagefolder}/star3.gif;{imagefolder}/star3.gif');
INSERT INTO bb1_ranks VALUES (16,4,0,2000,'Forum God','{imagefolder}/star3.gif;{imagefolder}/star3.gif;{imagefolder}/star3.gif');


INSERT INTO bb1_smilies VALUES (1,'{imagefolder}/smilies/biggrin.gif','Big Grin',':D',0);
INSERT INTO bb1_smilies VALUES (2,'{imagefolder}/smilies/redface.gif','Red Face',':O',0);
INSERT INTO bb1_smilies VALUES (3,'{imagefolder}/smilies/confused.gif','Confused','?(',0);
INSERT INTO bb1_smilies VALUES (4,'{imagefolder}/smilies/cool.gif','Cool','8)',0);
INSERT INTO bb1_smilies VALUES (5,'{imagefolder}/smilies/crying.gif','Crying',';(',0);
INSERT INTO bb1_smilies VALUES (6,'{imagefolder}/smilies/eek.gif','Shocked','8o',0);
INSERT INTO bb1_smilies VALUES (7,'{imagefolder}/smilies/pleased.gif','Pleased',':]',0);
INSERT INTO bb1_smilies VALUES (8,'{imagefolder}/smilies/frown.gif','Frown',':(',0);
INSERT INTO bb1_smilies VALUES (9,'{imagefolder}/smilies/happy.gif','Happy',':))',0);
INSERT INTO bb1_smilies VALUES (10,'{imagefolder}/smilies/mad.gif','Mad','X(',0);
INSERT INTO bb1_smilies VALUES (11,'{imagefolder}/smilies/smile.gif','Smile',':)',0);
INSERT INTO bb1_smilies VALUES (12,'{imagefolder}/smilies/tongue.gif','Tongue',':P',0);
INSERT INTO bb1_smilies VALUES (13,'{imagefolder}/smilies/wink.gif','Wink',';)',0);
INSERT INTO bb1_smilies VALUES (14,'{imagefolder}/smilies/rolleyes.gif','Roll Eyes',':rolleyes:',0);
INSERT INTO bb1_smilies VALUES (15,'{imagefolder}/smilies/baby.gif','Baby',':baby:',0);
INSERT INTO bb1_smilies VALUES (16,'{imagefolder}/smilies/evil.gif','Evil',':evil:',0);
INSERT INTO bb1_smilies VALUES (17,'{imagefolder}/smilies/tongue2.gif','Tongue',':tongue:',0);