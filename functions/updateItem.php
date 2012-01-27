<?php
include_once 'DBlogin.class.php';
$db = new DBlogin();
session_start();
$id = $_SESSION['id'];

if(isset($_GET['complete']) && $_GET['complete']){
	$list_item = $_GET['complete'];
	$list_item = explode('_',$list_item );
	$query = "UPDATE tasks SET status = '1' WHERE id = '{$list_item[1]}' AND user_id = '{$id}'";
	mysql_query($query) or die (mysql_error());
}
?>