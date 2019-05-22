<?php
	// Block access direct
	if (!isset($GLOBALS['KEY']))
		exit('Without direct access to the file');
	
	// Message to Redirect
	function MessageRedir($msg, $time = 3, $url) {
		die("$msg <meta http-equiv='refresh' content='$time;URL=$url'>");	
	}
	
	// Variables 
	$GetCurrentDir = realpath(dirname(__FILE__) . '/../../'); 
	
	// Control time for refill
	$Years	= 0;
	$Month	= 0;
	$Days	= 0;
	$Hours	= 2;
	$Seconds =0;
	
	// Site Info
	define('SITE_NAME','OuSystem');
	
	// DataBase configs
	define('DATABASE_HOST','localhost');
	define('DATABASE_USER','root');
	define('DATABASE_PASS','87554404');
	define('DATABASE_NAME','evolutec_ous'); 
	
 	// Includes
	require_once('DBPDO.php');
		
	// Create Classes
	$DB 		= new DBPDO();

	// Set time location
	date_default_timezone_set('America/Sao_Paulo');

	// Result date and hour minus current date 
	function SecondsVIP($d){ return strtotime($d) - time("d/m/Y H:i:s"); }
	
	// Check time remaining
	function CheckVIP($d) {
		if (SecondsVIP($d) > 0) return true;
		else return false;	
	}
?>

