$(document).ready(function() {

	$("#list").load("functions/fetchListFromDB.php");
	$( "#list" ).sortable({
		placeholder: 'ui-state-highlight',
		update : function () {
			var order = $('#list').sortable('serialize');
			$.post("functions/processSortable.php?"+order);
		}
	
	});
	$( "#test-list" ).disableSelection();
	
	$('#add').click(function () {
		$('#newItem').toggle('blind','slow');
	});
	
});