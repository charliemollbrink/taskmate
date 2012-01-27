<?php
include_once 'DBlogin.class.php';
$db = new DBlogin();
session_start();
$id = $_SESSION['id'];

if (isset($_POST['newItem']) && $_POST['newItem']){
	$query = "INSERT INTO tasks (task, user_id, position, status) 
			VALUES ('{$_POST['newItem']}','{$id}','-1','0')
			";
	mysql_query($query)or die(mysql_error());
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>