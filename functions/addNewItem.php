<?php
include("dblogin.php");
if (isset($_POST['newItem']) && $_POST['newItem']){
	$query = "INSERT INTO tasks (task, user_id, position) 
			VALUES ('{$_POST['newItem']}','4','10')
			";
	mysql_query($query)or die(mysql_error());
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>