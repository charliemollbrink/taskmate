<?php
session_start();
include_once 'functions/User.class.php';
$user = new User();

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>taskmate</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>

<div id="wrapper">
	<div id="header"></div>
	<?php

	if ($user->get_session()){
		include ("home.php");
		if (isset ($_GET['q']) && $_GET['q'] == 'logout')	{
			$user->user_logout();
			header("location:index.php?q=login");
		}
	} else {
		if (isset ($_GET['q']) && $_GET['q'] == 'register'){
		include ("register.php");
		}else{
		include ("login.php");
		}
	}	

	?>
</div>
</body>
</html>