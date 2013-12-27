<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />

<div class="container">
	
	<h2>Contact Methods</h2>
	<a href="?action=new&format=dialog" data-toggle="modal" data-target="#myModal">Add Contact Method</a>

	<table class="table table-hover table-bordered table-striped table-condensed">
		
		<thead>
		<tr>
			
			<!-- Always match up th with td -->
			<th>User ID</th>
			<th>Contact Method Type</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<? foreach ($model as $rs): ?>

			<tr>
				<td><?=$rs['Users_id']?></td> 
				<td><?=$rs['ContactMethodType']?></td>
				

					<td>
						<a class ="glyphicon glyphicon-file" href="?action=details&id=<?=$rs['id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
						<a class ="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$rs['id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
						<a class ="glyphicon glyphicon-trash" href="?action=delete&id=<?=$rs['id']?>&format=dialog" data-toggle="modal" data-target="#myModal"></a>
					</td>
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