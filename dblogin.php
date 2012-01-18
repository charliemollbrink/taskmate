<?php
$db_hostname = 'localhost';
$db_database = 'shakenmake';
$db_username = 'root';
$db_password = 'root';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server){
	die("Unable to connect to MySQL: " . mysql_error());
}
mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
mysql_query('SET NAMES utf8');
date_default_timezone_set('Europe/Berlin');
?>