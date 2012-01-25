<?php
include_once 'User.class.php';
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$new_user_data = array(	'name'=>$_POST['name'],
							'username'=>$_POST['username'], 
							'password1'=>$_POST['password1'],
							'password2'=>$_POST['password2'], 
							'email'=>$_POST['email']	);
	$register = $user->register_user($new_user_data);
	if ($register){ 
		//Registration Success
		echo 'Registration successful <a href="../login.php">Click here</a> to login';
	} else { 
		//Registration Failed
		echo 'Registration failed. Email or Username already exits please try again';
	}
 }
?>