<div class="container">
	
	<h3>Are you sure you want to delete? <?= $model['Keywords_id']?></h3>
		
	<form action="?action=delete" method="post">
		
		<input type="hidden" name="id" value="<?=$model['id']?>"/>
		<input type="submit" class="btn btn-primary" value="Yes" />
		<a href="?action=?">
			<button type="button" class="btn btn-default">
				No
			</button>
		</a>

	</form>

</div>


