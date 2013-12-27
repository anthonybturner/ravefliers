var search = $('#search');
search.keyup(function(){
	
	
	var inputResult = search.val();
	
	$.getJSON("?action=terms&format=json", {'data': inputResult}, function(results){

	
	});
});
