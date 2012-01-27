<?php
include_once 'DBlogin.class.php';
$db = new DBlogin();
session_start();
$id = $_SESSION['id'];

$query = "SELECT id, task, position FROM tasks WHERE user_id = $id AND status = 0 ORDER BY position ASC";
$sql = mysql_query($query);
while ($row = mysql_fetch_assoc($sql)){
echo "<li id='listItem_".$row['id']."'>".$row['task']."<img src='images/x.png' class='delete' /><img src='images/check.png' class='complete' /></li>";
}


?>