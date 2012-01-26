<?php 
$id = $_SESSION['id'];
$stats = $user->getUserStats($id);
?>


<a href="?q=logout">LOGOUT</a>
<div id="userinfo">
<?php echo "<h1>Hello ".$stats['name']."</h1><p>"
			.$stats['finished_tasks']."/"
			.$stats['total_tasks']." tasks completed</p>"
?>
</div>
<div id="listcontainer">
	<ul id="list">
	<p>Loading list...</p>
	</ul>

	<img src="images/plus.png" alt="add" id="add" />
	<div id ="newItem">
		<form action="functions/addNewItem.php?id=<?php echo $id ?>" method = "post">
			<p><input type='text' name='newItem' class ='newItem'/></p>
			<p><button type='submit'>Lägg till</button></p>
		</form>
	</div>
	
</div>