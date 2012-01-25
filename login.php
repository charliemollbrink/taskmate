<?php
include_once 'functions/User.class.php';
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user->check_login($_POST['emailusername'], $_POST['password']);
	header("location:index.php");
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