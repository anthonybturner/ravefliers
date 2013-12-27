<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />

<div class="container">
	
	<h2>Info</h2>

	<table class="table table-hover table-bordered table-striped table-condensed">
		
		<thead>
		<tr>
			
			<!-- Always match up th with td -->
			<th>Name</th>
			<th></th>
		</tr>
		</thead>
		
		<tbody>
		<? foreach ($model as $rs): ?>

			<tr> 
				<td><?=$rs['Name']?></td>
				<td><?=$rs['Location']?></td>
				<td><?=$rs['Picture_Url']?></td>

			</tr>
		
		<? endforeach; ?>
	
		</tbody>
	</table>

</div>

<div class="modal fade" id="myModal"></div>

<? function Scripts(){ ?> 
	
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>	
		<script type="text/javascript">			
			$(".table").dataTable();
		</script>
	
<?	} ?>