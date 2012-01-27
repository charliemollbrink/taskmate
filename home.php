<?php 
$id = $_SESSION['id'];
?>


<a href="?q=logout">LOGOUT</a>
<div id="userinfo">
</div>
<div id="listcontainer">
	<h2>ToDo:</h2>
	<ul id="list">
	<p>Loading list...</p>
	</ul>

	<img src="images/plus.png" alt="add" id="add" />
	<div id ="newItem">
		<form id="newItemForm" action="functions/addNewItem.php?id=<?php echo $id ?>" method = "post">
			<p><input type='text' name='newItem' class ='newItem'/></p>
			<p><button id="newItemButton"type='submit'>Lägg till</button></p>
		</form>
	</div>
<h2>Completed:</h2>
<ul id="completedTasks">
</ul>
	
</div>
