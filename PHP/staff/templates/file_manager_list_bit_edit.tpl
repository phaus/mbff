<td width="10" align="center"><smallfont>|<br />|<br />|<br />|</font></td>
<td nowrap align="center">
<a href="file_manager.php?sid=$sid&action=download&post_id=$file[post_id]&file_id=$file[file_id]" title="download $file[file_name]"><img border="0" alt="$file[file_ext]" height="30" src="$icon" /><smallfont><br />$file[file_name]

<br />
<a href="javascript:void(window.open('file_manager.php?sid=$sid&action=infofile&post_id=$file[post_id]&file_id=$file[file_id]','Statistik','WIDTH=300,HEIGHT=400,SCROLLBARS=yes,RESIZABLE=yes,TOOLBAR=NO'))" onmouseover=" self.status = 'file_manager.php?sid=$sid&action=infofile&post_id=$file[post_id]&file_id=$file[file_id]'; return true" onmouseout="self.status=''; return true" title="$file[file_name] Statistik"><smallfont><img border="0" alt="I" height="15" src="images/poll.gif" /></font></a>
<noscript><a target="_filestat" href="file_manager.php?sid=$sid&action=infofile&post_id=$file[post_id]&file_id=$file[file_id]" title="$file[file_name] Statistik"><smallfont><img border="0" alt="I" height="15" src="images/poll.gif" /></font></a></noscript>
&nbsp;|
($file[file_size] KB)</font></a>
&nbsp;|
<a href="file_manager.php?sid=$sid&action=deletefile&post_id=$file[post_id]&file_id=$file[file_id]" title="$file[file_name] löschen"><smallfont><img border="0" alt="X" height="15" src="images/file_icons/delete.gif" /></font></a>
&nbsp;	
</td>