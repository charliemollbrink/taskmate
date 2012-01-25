<?php
session_start();
$id = $_SESSION['id'];
include("dblogin.php");

foreach ($_GET['listItem'] as $position => $item){
	 $query = "UPDATE tasks SET position = $position WHERE id = $item AND user_id = $id";
	 mysql_query($query) or die (mysql_error());
}


?>