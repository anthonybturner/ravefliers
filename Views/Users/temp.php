<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />
<style>
	.table tr.success2, .table tr.success2 td{
		background-color: #FFAA00 !important; 
	}
	#table-wrapper{
		transition: width .5s;
		-webkit-transition: width .5s;
	}
</style>
<div class="container">
	
	<h2>Users</h2>
	
	<? if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'Saved'): ?>
		<div class="alert alert-success">
			<button type="button" class="close" aria-hidden="true">&times;</button>
			<b>Success!</b> You're User has been saved.
		</div>
	<? endif; ?>
	
	<a href="?action=new">Add Contact</a>
	<div id="table-wrapper" class="col-md-12">
	<table class="table table-hover table-bordered table-striped">
		<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Type</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	</div>
	<div id="details" class="col-md-6"></div>
</div>

<div id="myModal" class="modal fade">
	
</div>

<script id="row-template" type="text/x-handlebars-template">
				<td>{{FirstName}}</td>
				<td>{{LastName}}</td>
				<td>{{UserType_Name}}</td>
				<td>
					<a class="glyphicon glyphicon-file" href="?action=details&id={{id}}" ></a>
					<a class="glyphicon glyphicon-pencil" href="?action=edit&id={{id}}" ></a>
					<a class="glyphicon glyphicon-trash" href="?action=delete&id={{id}}" ></a>
				</td>
</script>

<script id="tbody-template" type="text/x-handlebars-template">
	{{#each .}}
		<tr>
				<td>{{FirstName}}</td>
				<td>{{LastName}}</td>
				<td>{{UserType_Name}}</td>
				<td>
					<a class="glyphicon glyphicon-file" href="?action=details&id={{id}}" ></a>
					<a class="glyphicon glyphicon-pencil" href="?action=edit&id={{id}}" ></a>
					<a class="glyphicon glyphicon-trash" href="?action=delete&id={{id}}" ></a>
				</td>
		</tr>
	{{/each}}
</script>

</div>
  <? function Scripts(){ ?>
  	<? global $model; ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
	<script type="text/javascript">
	$(function(){
			var tableTemplate = Handlebars.compile($("#tbody-template").html());					
			$(".table tbody").html(tableTemplate(<?=json_encode($model);?>))	
		
		$(".table").dataTable();
		$(".alert .close").click(function(){
			$(this).closest(".alert").slideUp();
		});
		
		$(".table a").click(function(){
			
			
			if($(this).closest("tr").hasClass("success2")){
				$(".success2").removeClass("success2");
				$("#table-wrapper").removeClass("col-md-6").addClass("col-md-12");
				$("#details").html('');			
			}else{
				$(".success2").removeClass("success2");
				$(this).closest("tr").addClass("success2");
				$("#table-wrapper").removeClass("col-md-12").addClass("col-md-6");
				
				$("#details").load(this.href, {format: "plain"}, function(){
					$("#details form").submit(HandleSubmit);					
				});				
			}
			
			return false;
		});
		
		var HandleSubmit = function (){
			var data = $(this).serializeArray();
			data.push({name:'format', value:'json'});
			$.post(this.action, data, function(results){
				
				if(results.errors){
					$("#details").html(results);					
				}else{
					var template = Handlebars.compile($("#row-template").html());					
					$(".success2").html(template(results.model));
				}
				
			}, 'json');
			
			return false;
		}
	})
	</script>
<? } ?>












