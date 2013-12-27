<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />

<div class="container">
	
	<h2>Product Keywords</h2>
	<a href="?action=new&format=dialog" data-toggle="modal" data-target="#myModal">Add Product Keyword</a>
	
	<table class="table table-hover table-bordered table-striped table-condensed">
		
		<thead>
		<tr>
			
			<!-- Always match up th with td -->
			<th>Product id</th>
			<th>Keywords id</th>
			<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
			<? foreach ($model as $rs): ?>
				<tr> 
					<td><?=$rs['Products_id']?></td>
					<td ><?=$rs['Keywords_id']?></td>
					
					<!-- Create links and buttons for each field/row-->
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

<div class="modal fade" id="myModal">
	
</div>


<? function Scripts(){ ?> 
	
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>	
		<script type="text/javascript">			
			$(".table").dataTable();
		</script>
	
<?	} ?>