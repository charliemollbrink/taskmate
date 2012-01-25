<?php
session_start();
include_once 'functions/User.class.php';
$user = new User();
$id = $_SESSION['id'];
if (!$user->get_session()){
	header("location:login.php");
}
if (isset ($_GET['q']) && $_GET['q'] == 'logout')	{
	$user->user_logout();
	header("location:login.php");
}
?>