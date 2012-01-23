<?php
session_start();
include_once 'User.class.php';
$user = new User();
if ($user->get_session())
{
header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$login = $user->check_login($_POST['emailusername'], $_POST['password']);
if ($login)
{
// Login Success
header("location:login.php");
}
else
{
// Login Failed
$msg= 'Username / password wrong';
}
}
?>
<form method="POST" action="" name="login">
Email or Username
<input type="text" name="emailusername"/>
Password
<input type="password" name="password"/>
<input type="submit" value="Login"/>
</form>
<a href="registration.php">Register</a>