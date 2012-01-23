<?php
include_once 'User.class.php';
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{
header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$new_user_data = array(	'name'=>$_POST['name'],
							'username'=>$_POST['username'], 
							'password1'=>$_POST['password1'],
							'password2'=>$_POST['password2'], 
							'email'=>$_POST['email']	);
	$register = $user->register_user($new_user_data);
	if ($register){ //Registration Success
		echo 'Registration successful <a href="login.php">Click here</a> to login';
	} else { //Registration Failed
		echo 'Registration failed. Email or Username already exits please try again';
	}
 }
?>

<form method="POST" action="registration.php" name='reg' >
Full Name
<input type="text" name="name"/>
Username
<input type="text" name="username"/>
Password
<input type="password" name="password1"/>
Repeat Password 
<input type="password" name="password2"/>
Email
<input type="text" name="email"/>
<input type="submit" value="Register"/>
</form> 