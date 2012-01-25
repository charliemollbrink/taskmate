<?php
include_once 'DBlogin.class.php';

class User {
	//Database connect 
	public function __construct() {
	$db = new DBlogin();
	}
	//Registration process 
	public function register_user($new_user_data) { // array contains name, username, password1, password2,email
	$username = $new_user_data['username'];
	$pass1 = $new_user_data['password1'] ;
	$pass2 = $new_user_data['password2'];
	if($pass1 != $pass2){
		return false;
	} else if (strlen($username) > 30){
		return false;
	}else{
	$hash = hash('sha1', $pass1);
	$salt = $this->createSalt();
	$password = hash('sha1', $salt . $hash);
	$username = mysql_real_escape_string($username);
	$email = mysql_real_escape_string($new_user_data['email']);
	$name = mysql_real_escape_string($new_user_data['name']);
	$sql = mysql_query("SELECT id from users WHERE username = '$username' or email = '$email'");
	$no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) {
			$result = mysql_query("INSERT INTO users(username, password, salt, name, email) values ('$username', '$password', '$salt','$name','$email')") or die(mysql_error());
			return $result;
			}
			else {
			return false;
			}
		}
	}
	//creates a 3 character sequence
	private function createSalt() {
		$string = sha1(uniqid(mt_rand()));
		return substr($string, 0, 3);
	}

	// Login process
	public function check_login($emailusername, $password) {
	$sql = mysql_query("	SELECT id, password, salt 
							FROM users WHERE email = '$emailusername' 
							or username='$emailusername' 
							LIMIT 1	");
	$user_data = mysql_fetch_assoc($sql);
	if (!$user_data){
		echo 'Username does not exist';
		//return false;
	}else{
		$hash = hash('sha1', $user_data['salt'] . hash('sha1', $password) );
		if($hash == $user_data['password']){
			$_SESSION['login'] = true;
			$_SESSION['id'] = $user_data['id'];
			return true;
		} else {
			echo 'Username / password wrong';
			//return false;
		}
		
	}
	
	}
	// Getting name
	public function get_fullname($id)
	{
	$sql = mysql_query("SELECT name FROM users WHERE id = $id LIMIT 1");
	$user_data = mysql_fetch_assoc($sql);
	echo $user_data['name'];
	}
	// Getting session 
	public function get_session() {
	if (isset($_SESSION['login'])){
			return $_SESSION['login'];
		}else {
			return false;
		}
	}
	// Logout 
	public function user_logout()
	{
	$_SESSION['login'] = false;
	session_destroy();
	}

}
?>