
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
		background-color: #C0C0C0;
		float: right;
	}
</style>
<div class="container">
	

	<div id="table-wrapper" class="col-md-12">
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
				
				
			
		</table>

	</div>

	<div id="details" class="col-md-6"></div>

</div>



<script id="row-template" type="text/x-handlebars-template">
		<td>{{Name}}</td>
		<td>{{Location}}</td>
		<td>{{Date}}</td>
</script>

<script id="tbody-template" type="text/x-handlebars-template">
	{{#each .}}
		<tr>
			{{> row-template}}
		</tr>
	{{/each}}
</script>
<? function Scripts(){ ?>
  	
  	<? 	global $model;  ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript">
	$(function(){
		var templateRow = Handlebars.compile($("#row-template").html());
		Handlebars.registerPartial("row-template", templateRow);				
		var tableTemplate = Handlebars.compile($("#tbody-template").html());
							
		$(".table tbody").html(tableTemplate(<?=json_encode($model);?>))	
		$(".table").dataTable();												
	})
		
	</script>
<? } ?>












