<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$usuario = "evolutec_site";
$senha = "87554404.Void";
$banco = "evolutec_site";
$conn = mysql_connect($host, $usuario, $senha) or die(mysql_error());
$db = mysql_select_db($banco, $conn) or die(mysql_error()); 
mysql_set_charset('utf8');
?>