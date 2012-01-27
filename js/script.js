$(document).ready(function() {
	refresh();
	
	function refresh(){
	loadList();
	loadlOldList();
	stats();
	};
	function loadList(){ 
		$( '#list' ).load('functions/fetchListFromDB.php', function(){
			$( '.complete' ).live('click', function() {
				var list_item = $(this).parent().attr('id');
				$.post('functions/updateItem.php?complete=' + list_item, function() {
				refresh();
				});
			});
			$( '.delete' ).live('click', function() {
				var list_item = $(this).parent().attr('id');
				$.post('functions/deleteItem.php?delete=' + list_item , function() {
				refresh();
				});
			});
		});
	};
	function loadlOldList(){ 
		$( '#completedTasks' ).load('functions/fetchOldTasksFromDB.php', function(){
			$( '.delete' ).live('click', function() {
				var list_item = $(this).parent().attr('id');
				$.post('functions/deleteItem.php?delete=' + list_item, function() {
				refresh();
				});
				
			});
		});
	};
	function stats(){
		$( '#userinfo' ).load('functions/userStats.php');
	};
	$( '#list' ).sortable({
		placeholder: 'ui-state-highlight',
		update : function () {
			var order = $( '#list' ).sortable('serialize');
			$.post('functions/processSortable.php?'+order);
		}
	});
	$( '#list' ).disableSelection();
	
	$( '#add' ).click(function () {
		$( '#newItem' ).toggle('blind','slow');
	});
});
