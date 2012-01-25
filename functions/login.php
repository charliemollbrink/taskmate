<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$login = $user->check_login($_POST['emailusername'], $_POST['password']);
	if ($login) header("location:../index.php");
}
?>