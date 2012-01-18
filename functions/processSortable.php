<?php
include("dblogin.php");

foreach ($_GET['listItem'] as $position => $item){
	 $query = "UPDATE tasks SET position = $position WHERE id = $item AND user_id = 4";
	 mysql_query($query) or die (mysql_error());
}


?>