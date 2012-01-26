<?php
session_start();
//include_once 'User.class.php';
//$user = new User();
$id = $_SESSION['id'];
include("dblogin.php");
//$user_id = $_GET['user'];
$query = "SELECT id, task, position FROM tasks WHERE user_id = $id AND status = 0 ORDER BY position ASC";
$sql = mysql_query($query);
while ($row = mysql_fetch_assoc($sql)){
echo "<li id='listItem_".$row['id']."'>".$row['task']."<img src='images/x.png' class='delete' /><img src='images/check.png' class='complete' /></li>";
}


?>