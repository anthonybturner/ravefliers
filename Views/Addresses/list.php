<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css" rel="stylesheet" />

<style>
	.table tr.success2,	.table tr.success2 td{
		background-color: #66FF66 !important;
	}
	#table-wrapper{
		transition: width .5s;
		-webkit-transition: width .5s; 

	}
</style>


<div class="container">
	
	<h2>Addresses</h2>	
	<a href="?action=new" id="add-link" >New Address</a>
	
	<div id="table-wrapper" class="col-md-12">

		<table class="table table-hover table-bordered table-striped table-condensed">
			
			<thead>
				<tr>
					
					<!-- Always match up th with td -->
					<th>City</th>
					<th>State</th>
					<th>Zipcode</th>
					<th>User ID</th>
					<th>Address Type</th>
					<th>Action</th>
	
			</tr>
			
			</thead>
			
			<tbody>
		
			</tbody>
		</table>	
	</div>
	<!-- Holds details for each table's record -->
	<div id="details" class="col-md-6"></div>
</div><!--  End container-->

<div id="myModal" class="modal fade">
	
</div>

<script id="row-template" type="text/x-handlebars-template">
		<td>{{City}}</td>
		<td>{{State}}</td>
		<td>{{Zipcode}}</td>
		<td>{{Users_id}}</td>
		<td>{{AddressType_Name}}</td>
		<td>
			<a class="glyphicon glyphicon-file" href="?action=details&id={{id}}" ></a>
			<a class="glyphicon glyphicon-pencil" href="?action=edit&id={{id}}" ></a>
			<a class="glyphicon glyphicon-trash" href="?action=delete&id={{id}}" ></a>
		</td>
</script>

<script id="tbody-template" type="text/x-handlebars-template">
	{{#each .}}
		<tr>
			{{> row-template}}
		</tr>
	{{/each}}
</script>


<? function Scripts(){ ?> 
	
		<? global $model; ?>
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
			
			$(".alert .close").click(function(){
				$(this).closest(".alert").slideUp();
			});
			
			$("#add-link").click(function(){
				
				curDialogAction = "add";
				ShowDialog(this.href); 
				return false;
			});
			
			$(".table a").click(function(){
				
				if($(this).closest("tr").hasClass("success2")){
					HideDialog();
				}else{
					curDialogAction = "update";
					ShowDialog(this.href, $(this).closest("tr"))
				}
				
				return false;
			});
			
			var HandleSubmit = function (){
				
				var data = $(this).serializeArray();
				data.push({name:'format', value:'json'});		
	
				//Temp code to be removed later
				if(curDialogAction == "add"){
	
					toastr.success("Adding", "Success");
					curDialogAction = null;
					header("Location: ?status=Saved");
	
				}
				
				$.post(this.action, data, function(results){
					
					if(results.errors){
						
						toastr.error(results.errors, "Error");	
			
					}else{
						
						toastr.success("Submitting", "Success");
	
						if(curDialogAction == "add"){
	
							toastr.success("Adding", "Success");
							
						}else{
							$(".success2").html(templateRow(results.model));					
							toastr.success("Your record has been saved!", "Success");
						}
					}
					
				}, 'json');
				return false;
			}
			
			var ShowDialog = function(url, /*optional*/selectedRow){
					
					$(".success2").removeClass("success2");
					if(selectedRow){
						selectedRow.addClass("success2");
						toastr.success("SelectedRow", "Success");
					}
					
					//Shrink the table
					$("#table-wrapper").removeClass("col-md-12").addClass("col-md-6");
					
					$("#details").load(url, {format: "plain"}, function(){
						$("#details form").submit(HandleSubmit);					
					});							
			}
			
			var HideDialog = function(){
					$(".success2").removeClass("success2");
					$("#table-wrapper").removeClass("col-md-6").addClass("col-md-12");
					$("#details").html('');						
			}		
        })
        </script>
	
<?	} ?>