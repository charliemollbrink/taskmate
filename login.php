<?php
include_once 'functions/User.class.php';
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$emailusername = $_POST['emailusername'];
	$password = $_POST['password'];
	
	if (!$emailusername || !$password){
		echo 'Please enter both username and password';
	}else{
	$user->checkLogin($emailusername, $password);
	header("location:index.php");
	}
} 
?>
<form method="POST" action="" name="login">
Email or Username
<input type="text" name="emailusername"/>
Password
<input type="password" name="password"/>
<button type="submit" value="Login">Login</button>
</form>
<a href="register.php">Register</a>