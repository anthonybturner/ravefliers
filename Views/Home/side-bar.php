
<div>
	<? include 'search-bar.php'?>
</div>

<?Script();?>
<? function Script(){ ?>

	<? global $model; ?>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
	
		var search = $('#search');
		search.keyup(function(){
			var search_results_div = $("#search-results");//Will hold the search results
			var input_result = search.val();//Holds the users current key presses
			
			//Only process data if there isn't an empty string
				if( input_result!= null && input_result.length >0){
					
					$.ajax({
						  type: "POST",
						  url: "?action=terms",
						  data: { data: input_result, "format": "dialog"}
						})
						  .done(function( results) {
						  	//Call back, load the results in the result area
						  	search_results_div.html(results);
		  			});
  			}else if( input_result.length == 0){
  				//If there is nothing in the input search, clear results.
  				search_results_div.html("");
  				
  			}

		});
	</script>

<? } ?>