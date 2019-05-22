<?php
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '87554404');
	define('DBNAME', 'evolutec_ous'); 
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
	