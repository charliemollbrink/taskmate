<?php
include_once 'DBlogin.class.php';
$db = new DBlogin();

if (isset($_POST['newItem']) && $_POST['newItem']){
	$query = "INSERT INTO tasks (task, user_id, position, status) 
			VALUES ('{$_POST['newItem']}','{$_GET['id']}','-1','0')
			";
	mysql_query($query)or die(mysql_error());
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>