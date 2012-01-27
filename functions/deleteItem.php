<?php
include_once 'DBlogin.class.php';
$db = new DBlogin();
session_start();
$id = $_SESSION['id'];

if(isset($_GET['delete']) && $_GET['delete']){
	$list_item = $_GET['delete'];
	$list_item = explode('_',$list_item );
	$query = "DELETE FROM tasks WHERE id = '{$list_item[1]}' AND user_id = '{$id}'";
	mysql_query($query) or die (mysql_error());
}


?>