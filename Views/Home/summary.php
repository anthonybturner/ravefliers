<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css" rel="stylesheet" />
<style>
	.table tr.success2, .table tr.success2 td{
		background-color: #00FF00 !important; 
	}
	
	#table-wrapper{
		transition: width .5s;
		-webkit-transition: width .5s;
	}
	
	#summary{
		
		
		margin-top: 40px;
	}
	
	#total-col{
		font-size: large;
		background-color: #C0C0C0;
		float: right;
	}
	
	.container #summary-text{
		
		background-color: #00FF00;
	}
</style>
<div class="container">
	
	<h2><?=$title?></h2>
	
	<p class="col-md-10" id="summary-text">
		Your order has been submitted.<br>
		An email will be sent to the address you provided when your order has been confirmed.<br>
		Thank you.
	</p>
	
	
	<!-- Triggered when saving -->
	<? if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Removed'): ?>
		<div class="alert alert-success">
			<button type="button" class="close" aria-hidden="true">&times;</button>
			<b>Item removed!</b> 
		</div>
	<? endif; ?>
		
	<div id="table-wrapper" class="col-md-12">
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
				
				
			
		</table>

	</div>
	
	<div id="summary" class="container">
						
		<span id="total-col"> Price</span>

	</div>
</div>



<script id="row-template" type="text/x-handlebars-template">
		<td>{{Name}}</td>
		<td>{{Description}}</td>
		<td>{{Price}}</td>
	
</script>

<script id="tbody-template" type="text/x-handlebars-template">
	{{#each .}}
		<tr>
			{{> row-template}}
		</tr>
	{{/each}}
</script>

  <? function Scripts(){ ?>
  	
  	<? 
  		global $model;
  		global $total; 
  		
		foreach ($model as $key => $item) {
			
			$total+= $item['Price'];
			
		}
  	?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript">
	$(function(){
			var curDialogAction = null;
			var templateRow = Handlebars.compile($("#row-template").html());
			Handlebars.registerPartial("row-template", templateRow);				
			var tableTemplate = Handlebars.compile($("#tbody-template").html());
								
			$(".table tbody").html(tableTemplate(<?=json_encode($model);?>))	
			
			$(".table").dataTable();
			$("#total-col").html("Total: $"+<?=$total;?>);
												
			 		
			$(".table a").click(function(){
						
				if($(this).closest("tr").hasClass("success2")){
					HideDialog();
				}else{
					curDialogAction = "update";
					ShowDialog(this.href, $(this).closest("tr"))
				}
				
				return false;
			});
			
			var ShowDialog = function(url, /*optional*/selectedRow){
				
				$(".success2").removeClass("success2");
				if(selectedRow){
						selectedRow.addClass("success2");
				}
				
				$("#details").load(url, {format: "plain"}, function(){
					$("#details form").submit(HandleSubmit);					
				});		

				$.post(url,function(results){
					
					if(results.errors){
						
						toastr.error(results.errors, "Error");	
			
					}else{
						
						toastr.success("Submitting", "Success");
	
						if(curDialogAction == "add"){
	
							toastr.success("Adding", "Success");
							
						}else{
							
							
							$(".success2").html(templateRow(results.model));					
							toastr.success("Item removed!", "Success");
						}
					}
					
				});
								
				header("Location: ?status=Removed&id=$_REQUEST[id]");
				die();
				
			return false;
						
		}
		
		var HideDialog = function(){
				$(".success2").removeClass("success2");
				$("#table-wrapper").removeClass("col-md-6").addClass("col-md-12");
				$("#details").html('');						
		}

		})
		
	</script>
<? } ?>












