<?php 
$id = $_SESSION['id'];
?>

<a href="?q=logout">LOGOUT</a>
<div id="userinfo">
	<h1> Hello <?php $user->get_fullname($id); ?></h1>
</div>
<div id="listcontainer">
	<ul id="list">
	<p>Loading list...</p>
	</ul>

	<img src="images/plus.png" alt="add" id="add" />
	<div id ="newItem">
		<form action="functions/addNewItem.php" method = "post">
			<p><input type='text' name='newItem' class ='newItem'/></p>
			<p><button type='submit'>Lägg till</button></p>
		</form>
	</div>
	
</div>