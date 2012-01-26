<?php
include_once 'DBlogin.class.php';

class User {
	//Database connect 
	public function __construct() {
	$db = new DBlogin();
	}
	//Registration process 
	public function registerUser($new_user_data) { // array contains name, username, password1, password2,email
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
	public function checkLogin($emailusername, $password) {
		$sql = mysql_query("	SELECT id, password, salt 
								FROM users WHERE email = '$emailusername' 
								or username='$emailusername' 
								LIMIT 1	");
		$user_data = mysql_fetch_assoc($sql);
		
		if (!$user_data){
			echo 'Username does not exist';
		}else{
			$hash = hash('sha1', $user_data['salt'] . hash('sha1', $password) );
			if($hash == $user_data['password']){
				$_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
				return true;
			} else {
				echo 'Username / password wrong';
			}
		}
	}
	// Getting stats
	public function getUserStats($id)
	{
	$sql = mysql_query("SELECT COUNT( t.id ) AS total_tasks, 
						SUM( t.status ) AS finished_tasks, 
						COUNT( t.id ) - SUM( t.status )
						AS unfinished_tasks, 
						u.name AS name
						FROM users AS u
						LEFT JOIN tasks AS t ON t.user_id = u.id
						WHERE u.id = $id
						GROUP BY u.name
						LIMIT 0 , 1");
	$user_data = mysql_fetch_assoc($sql);
	return $user_data;
	}
	// Getting session 
	public function getSession() {
	if (isset($_SESSION['login'])){
			return $_SESSION['login'];
		}else {
			return false;
		}
	}
	// Logout 
	public function userLogout()
	{
	$_SESSION['login'] = false;
	session_destroy();
	}

}
?>