<?php
session_start();
$id = $_SESSION['id'];
include_once 'User.class.php';
$user = new User();
$stats = $user->getUserStats($id);
 echo "<h1>Hello ".$stats['name']."</h1><p>"
			.$stats['finished_tasks']."/"
			.$stats['total_tasks']." tasks completed</p>"
?>