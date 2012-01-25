<?php
class DBlogin {

	private $db_hostname = 'localhost';
	private $db_database = 'shakenmake';
	private $db_username = 'root';
	private $db_password = '';


	public function __construct(){
	$this->connect();
	$this->selectDb();
	mysql_query('SET NAMES utf8');
	date_default_timezone_set('Europe/Berlin');
	}
	public function connect(){
	$db_server = mysql_connect($this->db_hostname, $this->db_username, $this->db_password);
	if (!$db_server){
		die("Unable to connect to MySQL: " . mysql_error());
		}
	}
	private function selectDb(){
	mysql_select_db($this->db_database) or die("Unable to select database: " . mysql_error());	

	}
}

?>