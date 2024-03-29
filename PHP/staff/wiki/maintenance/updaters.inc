<?php
/**
 * @package MediaWiki
 * @subpackage Maintenance
 */
 
 /** */

require_once 'convertLinks.inc';
require_once 'InitialiseMessages.inc';
require_once 'userDupes.inc';

$wgRenamedTables = array(
#           from             to                  patch file
#	array( 'group',         'groups',           'patch-rename-group.sql' ),
);

$wgNewTables = array(
#            table          patch file (in maintenance/archives)
	array( 'hitcounter',    'patch-hitcounter.sql' ),
	array( 'querycache',    'patch-querycache.sql' ),
	array( 'objectcache',   'patch-objectcache.sql' ),
	array( 'categorylinks', 'patch-categorylinks.sql' ),
	array( 'logging',       'patch-logging.sql' ),
	array( 'validate',      'patch-validate.sql' ),
	array( 'user_newtalk',  'patch-usernewtalk2.sql' ),
	array( 'transcache',	'patch-transcache.sql' ),
	array( 'trackbacks',	'patch-trackbacks.sql' ),
);

$wgNewFields = array(
#           table            field             patch file (in maintenance/archives)
	array( 'ipblocks',      'ipb_id',           'patch-ipblocks.sql' ),
	array( 'ipblocks',      'ipb_expiry',       'patch-ipb_expiry.sql' ),
	array( 'recentchanges', 'rc_type',          'patch-rc_type.sql' ),
	array( 'recentchanges', 'rc_ip',            'patch-rc_ip.sql' ),
	array( 'recentchanges', 'rc_id',            'patch-rc_id.sql' ),
	array( 'recentchanges', 'rc_patrolled',     'patch-rc-patrol.sql' ),
	array( 'user',          'user_real_name',   'patch-user-realname.sql' ),
	array( 'user',          'user_token',       'patch-user_token.sql' ),
	array( 'user',          'user_email_token', 'patch-user_email_token.sql' ),
 	array( 'logging',       'log_params',       'patch-log_params.sql' ),
 	array( 'archive',       'ar_rev_id',        'patch-archive-rev_id.sql' ),
 	array( 'archive',       'ar_text_id',       'patch-archive-text_id.sql' ),
 	array( 'page',          'page_len',         'patch-page_len.sql' ),
 	array( 'revision',      'rev_deleted',      'patch-rev_deleted.sql' ),
	array( 'image',         'img_width',        'patch-img_width.sql' ),
	array( 'image',         'img_metadata',     'patch-img_metadata.sql' ),
	array( 'image',         'img_media_type',   'patch-img_media_type.sql' ),
	array( 'validate',      'val_ip',           'patch-val_ip.sql' ),
	array( 'site_stats',    'ss_total_pages',   'patch-ss_total_articles.sql' ),
	array( 'interwiki',	'iw_trans',	    'patch-interwiki-trans.sql' ),
);

function rename_table( $from, $to, $patch ) {
	global $wgDatabase;
	if ( $wgDatabase->tableExists( $from ) ) {
		if ( $wgDatabase->tableExists( $to ) ) {
			echo "...can't move table $from to $to, $to already exists.\n";
		} else {
			echo "Moving table $from to $to...";
			dbsource( "maintenance/archives/$patch", $wgDatabase );
			echo "ok\n";
		}
	} else {
		// Source table does not exist
		// Renames are done before creations, so this is typical for a new installation
		// Ignore silently
	}
}

function add_table( $name, $patch ) {
	global $wgDatabase;
	if ( $wgDatabase->tableExists( $name ) ) {
		echo "...$name table already exists.\n";
	} else {
		echo "Creating $name table...";
		dbsource( "maintenance/archives/$patch", $wgDatabase );
		echo "ok\n";
	}
}

function add_field( $table, $field, $patch ) {
	global $wgDatabase;
	if ( !$wgDatabase->tableExists( $table ) ) {
		echo "...$table table does not exist, skipping new field patch\n";
	} elseif ( $wgDatabase->fieldExists( $table, $field ) ) {
		echo "...have $field field in $table table.\n";
	} else {
		echo "Adding $field field to table $table...";
		dbsource( "maintenance/archives/$patch" , $wgDatabase );
		echo "ok\n";
	}
}

function do_revision_updates() {
	global $wgSoftwareRevision;
	if ( $wgSoftwareRevision < 1001 ) {
		update_passwords();
	}
}

function update_passwords() {
	wfDebugDieBacktrace( "This function needs to be updated or removed.\n" );
	
	global $wgDatabase;
	$fname = "Update script: update_passwords()";
	print "\nIt appears that you need to update the user passwords in your\n" .
	  "database. If you have already done this (if you've run this update\n" .
	  "script once before, for example), doing so again will make all your\n" .
	  "user accounts inaccessible, so be sure you only do this once.\n" .
	  "Update user passwords? (yes/no)";

	$resp = readconsole();
    if ( ! ( "Y" == $resp{0} || "y" == $resp{0} ) ) { return; }

	$sql = "SELECT user_id,user_password FROM user";
	$source = $wgDatabase->query( $sql, $fname );

	while ( $row = $wgDatabase->fetchObject( $source ) ) {
		$id = $row->user_id;
		$oldpass = $row->user_password;
		$newpass = md5( "{$id}-{$oldpass}" );

		$sql = "UPDATE user SET user_password='{$newpass}' " .
		  "WHERE user_id={$id}";
		$wgDatabase->query( $sql, $fname );
	}
}

function do_interwiki_update() {
	# Check that interwiki table exists; if it doesn't source it
	global $wgDatabase;
	if( $wgDatabase->tableExists( "interwiki" ) ) {
		echo "...already have interwiki table\n";
		return true;
	}
	echo "Creating interwiki table: ";
	dbsource( "maintenance/archives/patch-interwiki.sql" );
	echo "ok\n";
	echo "Adding default interwiki definitions: ";
	dbsource( "maintenance/interwiki.sql" );
	echo "ok\n";
}

function do_index_update() {
	# Check that proper indexes are in place
	global $wgDatabase;
	$meta = $wgDatabase->fieldInfo( "recentchanges", "rc_timestamp" );
	if( $meta->multiple_key == 0 ) {
		echo "Updating indexes to 20031107: ";
		dbsource( "maintenance/archives/patch-indexes.sql" );
		echo "ok\n";
		return true;
	}
	echo "...indexes seem up to 20031107 standards\n";
	return false;
}

function do_image_name_unique_update() {
	global $wgDatabase;
	if( $wgDatabase->indexExists( 'image', 'PRIMARY' ) ) {
		echo "...image primary key already set.\n";
	} else {
		echo "Making img_name the primary key... ";
		dbsource( "maintenance/archives/patch-image_name_primary.sql", $wgDatabase );
		echo "ok\n";
	}
}

function do_watchlist_update() {
	global $wgDatabase;
	if( $wgDatabase->fieldExists( 'watchlist', 'wl_notificationtimestamp' ) ) {
		echo "The watchlist table is already set up for email notification.\n";
	} else {
		echo "Adding wl_notificationtimestamp field for email notification management.";
		/* ALTER TABLE watchlist ADD (wl_notificationtimestamp varchar(14) binary NOT NULL default '0'); */
		dbsource( "maintenance/archives/patch-email-notification.sql", $wgDatabase );
		echo "ok\n";
	}
}

function do_copy_newtalk_to_watchlist() {
	global $wgDatabase;
	global $wgCommandLineMode;	# this needs to be saved while getID() and getName() are called

	$res = $wgDatabase->safeQuery( 'SELECT user_id, user_ip FROM !',
		$wgDatabase->tableName( 'user_newtalk' ) );
	$num_newtalks=$wgDatabase->numRows($res);
	echo "Now converting ".$num_newtalks." user_newtalk entries to watchlist table entries ... \n";

	$user = new User();
	for ( $i = 1; $i <= $num_newtalks; $i++ ) {
		$wluser = $wgDatabase->fetchObject( $res );
		if ($wluser->user_id == 0) { # anonymous users ... have IP numbers as "names"
			if ($user->isIP($wluser->user_ip)) { # do only if it really looks like an IP number (double checked)
				$wgDatabase->replace( 'watchlist',
					array(array('wl_user','wl_namespace', 'wl_title', 'wl_notificationtimestamp' )),
					  array('wl_user' 			=> 0,
						'wl_namespace' 			=> NS_USER_TALK,
						'wl_title' 			=> $wluser->user_ip,
						'wl_notificationtimestamp' 	=> '19700101000000'
						), 'updaters.inc::do_watchlist_update2'
					);
			}
		} else { # normal users ... have user_ids
			$user->setID($wluser->user_id);
			$wgDatabase->replace( 'watchlist',
				array(array('wl_user','wl_namespace', 'wl_title', 'wl_notificationtimestamp' )),
				  array('wl_user' 			=> $user->getID(),
					'wl_namespace' 			=> NS_USER_TALK,
					'wl_title' 			=> $user->getName(),
					'wl_notificationtimestamp' 	=> '19700101000000'
					), 'updaters.inc::do_watchlist_update3'
				);
		}
	}
	echo "Done.\n";
}


function do_user_update() {
	global $wgDatabase;
	if( $wgDatabase->fieldExists( 'user', 'user_emailauthenticationtimestamp' ) ) {
		echo "User table contains old email authentication field. Dropping... ";
		dbsource( "maintenance/archives/patch-email-authentication.sql", $wgDatabase );
		echo "ok\n";
	} else {
		echo "...user table does not contain old email authentication field.\n";
	}
}

/**
 * 1.4 betas were missing the 'binary' marker from logging.log_title,
 * which causes a collation mismatch error on joins in MySQL 4.1.
 */
function do_logging_encoding() {
	global $wgDatabase;
	$logging = $wgDatabase->tableName( 'logging' );
	$res = $wgDatabase->query( "SELECT log_title FROM $logging LIMIT 0" );
	$flags = explode( ' ', mysql_field_flags( $res, 0 ) );
	$wgDatabase->freeResult( $res );
	
	if( in_array( 'binary', $flags ) ) {
		echo "Logging table has correct title encoding.\n";
	} else {
		echo "Fixing title encoding on logging table... ";
		dbsource( 'maintenance/archives/patch-logging-title.sql', $wgDatabase );
		echo "ok\n";
	}
}

function do_schema_restructuring() {
	global $wgDatabase;
	$fname="do_schema_restructuring";
	if ( $wgDatabase->tableExists( 'page' ) ) {
		echo "...page table already exists.\n";
	} else {
		echo "...converting from cur/old to page/revision/text DB structure.\n"; flush();
		echo wfTimestamp();
		echo "......checking for duplicate entries.\n"; flush();
		
		extract( $wgDatabase->tableNames( 'cur', 'old', 'page', 'revision', 'text' ) );

		$rows = $wgDatabase->query( "SELECT cur_title, cur_namespace, COUNT(cur_namespace) AS c
				FROM $cur GROUP BY cur_title, cur_namespace HAVING c>1", $fname );

		if ( $wgDatabase->numRows( $rows ) > 0 ) {
			echo wfTimestamp();
			echo "......<b>Found duplicate entries</b>\n";
			echo ( sprintf( "<b>      %-60s %3s %5s</b>\n", 'Title', 'NS', 'Count' ) );
			while ( $row = $wgDatabase->fetchObject( $rows ) ) {
				if ( ! isset( $duplicate[$row->cur_namespace] ) ) {
					$duplicate[$row->cur_namespace] = array();
				}
				$duplicate[$row->cur_namespace][] = $row->cur_title;
				echo ( sprintf( "      %-60s %3s %5s\n", $row->cur_title, $row->cur_namespace, $row->c ) );
			}
			$sql = "SELECT cur_title, cur_namespace, cur_id, cur_timestamp FROM $cur WHERE ";
			$firstCond = true; 
			foreach ( $duplicate as $ns => $titles ) {
				if ( $firstCond ) {
					$firstCond = false;
				} else {
					$sql .= ' OR ';
				}
				$sql .= "( cur_namespace = {$ns} AND cur_title in (";
				$first = true;
				foreach ( $titles as $t ) {
					if ( $first ) {
						$sql .= $wgDatabase->addQuotes( $t );
						$first = false;
					} else {
						$sql .= ', ' . $wgDatabase->addQuotes( $t );
					}
				}
				$sql .= ") ) \n";
			}
			# By sorting descending, the most recent entry will be the first in the list.
			# All following entries will be deleted by the next while-loop.
			$sql .= 'ORDER BY cur_namespace, cur_title, cur_timestamp DESC';

			$rows = $wgDatabase->query( $sql, $fname );

			$prev_title = $prev_namespace = false;
			$deleteId = array();

			while ( $row = $wgDatabase->fetchObject( $rows ) ) {
				if ( $prev_title == $row->cur_title && $prev_namespace == $row->cur_namespace ) {
					$deleteId[] = $row->cur_id;
				}
				$prev_title     = $row->cur_title;
				$prev_namespace = $row->cur_namespace;
			}
			$sql = "DELETE FROM $cur WHERE cur_id IN ( " . join( ',', $deleteId ) . ')';
			$rows = $wgDatabase->query( $sql, $fname );
			echo wfTimestamp();
			echo "......<b>Deleted</b> ".$wgDatabase->affectedRows()." records.\n";
		}
		

		echo wfTimestamp();
		echo "......Creating tables.\n";
		$wgDatabase->query("CREATE TABLE $page (
  			page_id int(8) unsigned NOT NULL auto_increment,
  			page_namespace int NOT NULL,
  			page_title varchar(255) binary NOT NULL,
  			page_restrictions tinyblob NOT NULL default '',
  			page_counter bigint(20) unsigned NOT NULL default '0',
  			page_is_redirect tinyint(1) unsigned NOT NULL default '0',
  			page_is_new tinyint(1) unsigned NOT NULL default '0',
  			page_random real unsigned NOT NULL,
  			page_touched char(14) binary NOT NULL default '',
  			page_latest int(8) unsigned NOT NULL,
  			page_len int(8) unsigned NOT NULL,

  			PRIMARY KEY page_id (page_id),
  			UNIQUE INDEX name_title (page_namespace,page_title),
  			INDEX (page_random),
  			INDEX (page_len)
			) TYPE=InnoDB", $fname );
		$wgDatabase->query("CREATE TABLE $revision (
  			rev_id int(8) unsigned NOT NULL auto_increment,
  			rev_page int(8) unsigned NOT NULL,
  			rev_comment tinyblob NOT NULL default '',
  			rev_user int(5) unsigned NOT NULL default '0',
  			rev_user_text varchar(255) binary NOT NULL default '',
  			rev_timestamp char(14) binary NOT NULL default '',
  			rev_minor_edit tinyint(1) unsigned NOT NULL default '0',
			rev_deleted tinyint(1) unsigned NOT NULL default '0',
  
  			PRIMARY KEY rev_page_id (rev_page, rev_id),
  			UNIQUE INDEX rev_id (rev_id),
  			INDEX rev_timestamp (rev_timestamp),
  			INDEX page_timestamp (rev_page,rev_timestamp),
  			INDEX user_timestamp (rev_user,rev_timestamp),
  			INDEX usertext_timestamp (rev_user_text,rev_timestamp)
			) TYPE=InnoDB", $fname );

		echo wfTimestamp();
		echo "......Locking tables.\n";
		$wgDatabase->query( "LOCK TABLES $page WRITE, $revision WRITE, $old WRITE, $cur WRITE", $fname );

		$maxold = intval( $wgDatabase->selectField( 'old', 'max(old_id)', '', $fname ) );
		echo wfTimestamp();
		echo "......maxold is {$maxold}\n";

		echo wfTimestamp();
		global $wgLegacySchemaConversion;
		if( $wgLegacySchemaConversion ) {
			// Create HistoryBlobCurStub entries.
			// Text will be pulled from the leftover 'cur' table at runtime.
			echo "......Moving metadata from cur; using blob references to text in cur table.\n";
			$cur_text = "concat('O:18:\"historyblobcurstub\":1:{s:6:\"mCurId\";i:',cur_id,';}')";
			$cur_flags = "'object'";
		} else {
			// Copy all cur text in immediately: this may take longer but avoids
			// having to keep an extra table around.
			echo "......Moving text from cur.\n";
			$cur_text = 'cur_text';
			$cur_flags = "''";
		}
		$wgDatabase->query( "INSERT INTO $old (old_namespace, old_title, old_text, old_comment, old_user, old_user_text,
    				old_timestamp, old_minor_edit, old_flags)
  			SELECT cur_namespace, cur_title, $cur_text, cur_comment, cur_user, cur_user_text, cur_timestamp, cur_minor_edit, $cur_flags
  			FROM $cur", $fname );

		echo wfTimestamp();
		echo "......Setting up revision table.\n";
		$wgDatabase->query( "INSERT INTO $revision (rev_id, rev_page, rev_comment, rev_user, rev_user_text, rev_timestamp,
    				rev_minor_edit)
			SELECT old_id, cur_id, old_comment, old_user, old_user_text,
    				old_timestamp, old_minor_edit
			FROM $old,$cur WHERE old_namespace=cur_namespace AND old_title=cur_title", $fname );

		echo wfTimestamp();
		echo "......Setting up page table.\n";
		$wgDatabase->query( "INSERT INTO $page (page_id, page_namespace, page_title, page_restrictions, page_counter,
    				page_is_redirect, page_is_new, page_random, page_touched, page_latest, page_len)
  			SELECT cur_id, cur_namespace, cur_title, cur_restrictions, cur_counter, cur_is_redirect, cur_is_new,
    				cur_random, cur_touched, rev_id, LENGTH(cur_text)
  			FROM $cur,$revision
  			WHERE cur_id=rev_page AND rev_timestamp=cur_timestamp AND rev_id > {$maxold}", $fname );

		echo wfTimestamp();
		echo "......Unlocking tables.\n";
		$wgDatabase->query( "UNLOCK TABLES", $fname );

		echo wfTimestamp();
		echo "......Renaming old.\n";
		$wgDatabase->query( "ALTER TABLE $old RENAME TO $text", $fname );
		
		echo wfTimestamp();
		echo "...done.\n";
	}
}

function do_inverse_timestamp() {
	global $wgDatabase;
	$fname="do_schema_restructuring";
	if( $wgDatabase->fieldExists( 'revision', 'inverse_timestamp' ) ) {
		echo "Removing revision.inverse_timestamp and fixing indexes... ";
		dbsource( 'maintenance/archives/patch-inverse_timestamp.sql', $wgDatabase );
		echo "ok\n";
	} else {
		echo "revision timestamp indexes already up to 2005-03-13\n";
	}
}

function do_text_id() {
	global $wgDatabase;
	if( $wgDatabase->fieldExists( 'revision', 'rev_text_id' ) ) {
		echo "...rev_text_id already in place.\n";
	} else {
		echo "Adding rev_text_id field... ";
		dbsource( 'maintenance/archives/patch-rev_text_id.sql', $wgDatabase );
		echo "ok\n";
	}
}

function do_namespace_size() {
	$tables = array(
		'page'          => 'page',
		'archive'       => 'ar',
		'recentchanges' => 'rc',
		'watchlist'     => 'wl',
		'querycache'    => 'qc',
		'logging'       => 'log',
	);
	foreach( $tables as $table => $prefix ) {
		do_namespace_size_on( $table, $prefix );
		flush();
	}
}

function do_namespace_size_on( $table, $prefix ) {
	global $wgDatabase;
	$field = $prefix . '_namespace';
	
	$tablename = $wgDatabase->tableName( $table );
	$result = $wgDatabase->query( "SHOW COLUMNS FROM $tablename LIKE '$field'" );
	$info = $wgDatabase->fetchObject( $result );
	$wgDatabase->freeResult( $result );
	
	if( substr( $info->Type, 0, 3 ) == 'int' ) {
		echo "...$field is already a full int ($info->Type).\n";
	} else {
		echo "Promoting $field from $info->Type to int... ";
		
		$sql = "ALTER TABLE $tablename MODIFY $field int NOT NULL";
		$wgDatabase->query( $sql );
		
		echo "ok\n";
	}
}

function do_pagelinks_update() {
	global $wgDatabase;
	if( $wgDatabase->tableExists( 'pagelinks' ) ) {
		echo "...already have pagelinks table.\n";
	} else {
		echo "Converting links and brokenlinks tables to pagelinks... ";
		dbsource( "maintenance/archives/patch-pagelinks.sql", $wgDatabase );
		echo "ok\n";
		flush();
		
		global $wgCanonicalNamespaceNames;
		foreach( $wgCanonicalNamespaceNames as $ns => $name ) {
			if( $ns != 0 ) {
				do_pagelinks_namespace( $ns );
			}
		}
	}
}

function do_pagelinks_namespace( $namespace ) {
	global $wgDatabase, $wgContLang;
	
	$ns = IntVal( $namespace );
	echo "Cleaning up broken links for namespace $ns... ";
	
	$pagelinks = $wgDatabase->tableName( 'pagelinks' );
	$name = $wgContLang->getNsText( $ns );
	$prefix = $wgDatabase->strencode( $name );
	$likeprefix = str_replace( '_', '\\_', $prefix);
	
	$sql = "UPDATE $pagelinks
	           SET pl_namespace=$ns,
	               pl_title=TRIM(LEADING '$prefix:' FROM pl_title)
	         WHERE pl_namespace=0
	           AND pl_title LIKE '$likeprefix:%'";
	
	$wgDatabase->query( $sql, 'do_pagelinks_namespace' );
	echo "ok\n";
}

function do_drop_img_type() {
	global $wgDatabase;
	
	if( $wgDatabase->fieldExists( 'image', 'img_type' ) ) {
		echo "Dropping unused img_type field in image table... ";
		dbsource( "maintenance/archives/patch-drop_img_type.sql", $wgDatabase );
		echo "ok\n";
	} else {
		echo "No img_type field in image table; Good.\n";
	}
}

function do_old_links_update() {
	global $wgDatabase;
	if( $wgDatabase->tableExists( 'pagelinks' ) ) {
		echo "Already have pagelinks; skipping old links table updates.\n";
	} else {
		convertLinks(); flush();
	}
}

function do_user_unique_update() {
	global $wgDatabase;
	$duper = new UserDupes( $wgDatabase );
	if( $duper->hasUniqueIndex() ) {
		echo "Already have unique user_name index.\n";
	} else {
		if( !$duper->clearDupes() ) {
			echo "WARNING: This next step will probably fail due to unfixed duplicates...\n";
		}
		echo "Adding unique index on user_name... ";
		dbsource( 'maintenance/archives/patch-user_nameindex.sql', $wgDatabase );
		echo "ok\n";
	}
}

function do_user_groups_update() {
	$fname = 'do_user_groups_update';
	global $wgDatabase;
	
	if( $wgDatabase->tableExists( 'user_groups' ) ) {
		echo "...user_groups table already exists.\n";
		return do_user_groups_reformat();
	}
	
	echo "Adding user_groups table... ";
	dbsource( 'maintenance/archives/patch-user_groups.sql', $wgDatabase );
	echo "ok\n";
	
	if( !$wgDatabase->tableExists( 'user_rights' ) ) {
		if( $wgDatabase->fieldExists( 'user', 'user_rights' ) ) {
			echo "Upgrading from a 1.3 or older database? Breaking out user_rights for conversion...";
			dbsource( 'maintenance/archives/patch-user_rights.sql', $wgDatabase );
			echo "ok\n";
		} else {
			echo "*** WARNING: couldn't locate user_rights table or field for upgrade.\n";
			echo "*** You may need to manually configure some sysops by manipulating\n";
			echo "*** the user_groups table.\n";
			return;
		}
	}
	
	echo "Converting user_rights table to user_groups... ";
	$result = $wgDatabase->select( 'user_rights',
		array( 'ur_user', 'ur_rights' ),
		array( "ur_rights != ''" ),
		$fname );
	
	while( $row = $wgDatabase->fetchObject( $result ) ) {
		$groups = array_unique(
			array_map( 'trim',
				explode( ',', $row->ur_rights ) ) );
		
		foreach( $groups as $group ) {
			$wgDatabase->insert( 'user_groups',
				array(
					'ug_user'  => $row->ur_user,
					'ug_group' => $group ),
				$fname );
		}
	}
	$wgDatabase->freeResult( $result );
	echo "ok\n";
}

function do_user_groups_reformat() {
	# Check for bogus formats from previous 1.5 alpha code.
	global $wgDatabase;
	$info = $wgDatabase->fieldInfo( 'user_groups', 'ug_group' );
	
	if( $info->type == 'int' ) {
		$oldug = $wgDatabase->tableName( 'user_groups' );
		$newug = $wgDatabase->tableName( 'user_groups_bogus' );
		echo "user_groups is in bogus intermediate format. Renaming to $newug... ";
		$wgDatabase->query( "ALTER TABLE $oldug RENAME TO $newug" );
		echo "ok\n";
		
		echo "Re-adding fresh user_groups table... ";
		dbsource( 'maintenance/archives/patch-user_groups.sql', $wgDatabase );
		echo "ok\n";
		
		echo "***\n";
		echo "*** WARNING: You will need to manually fix up user permissions in the user_groups\n";
		echo "*** table. Old 1.5 alpha versions did some pretty funky stuff...\n";
		echo "***\n";
	} else {
		echo "...user_groups is in current format.\n";
	}
	
}

function do_all_updates() {
	global $wgNewTables, $wgNewFields, $wgRenamedTables;
	
	# Rename tables
	foreach ( $wgRenamedTables as $tableRecord ) {
		rename_table( $tableRecord[0], $tableRecord[1], $tableRecord[2] );
	}

	# Add missing tables
	foreach ( $wgNewTables as $tableRecord ) {
		add_table( $tableRecord[0], $tableRecord[1] );
		flush();
	}

	# Add missing fields
	foreach ( $wgNewFields as $fieldRecord ) {
		add_field( $fieldRecord[0], $fieldRecord[1], $fieldRecord[2] );
		flush();
	}
	
	# Do schema updates which require special handling
	do_interwiki_update(); flush();
	do_index_update(); flush();
	do_old_links_update(); flush();
	do_image_name_unique_update(); flush();
	do_watchlist_update(); flush();
	do_user_update(); flush();
######	do_copy_newtalk_to_watchlist(); flush();
	do_logging_encoding(); flush();
	
	do_schema_restructuring(); flush();
	do_inverse_timestamp(); flush();
	do_text_id(); flush();
	do_namespace_size(); flush();
	
	do_pagelinks_update(); flush();
	
	do_drop_img_type(); flush();
	
	do_user_unique_update(); flush();
	do_user_groups_update(); flush();
	
	initialiseMessages(); flush();
}

?>
