﻿<?php
include("dblogin.php");
//$user_id = $_GET['user_id'];
$query = "SELECT id, task, position FROM tasks WHERE user_id = 4 ORDER BY position ASC";
$sql = mysql_query($query);
while ($row = mysql_fetch_assoc($sql)){
echo "<li id='listItem_".$row['id']."' ><img src='arrow.png' alt='move' width='16' height='16' class='handle' />".$row['task']."</li>";
}


?>