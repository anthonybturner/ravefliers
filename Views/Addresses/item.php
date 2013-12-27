<!-- Get all the columns and fields from the model-->

	<!-- Populate the table with the rows/records -->
	<!-- If the row has been selected, then give it a class of 'success' , which will allow it to be highlighted -->
	
	<tr class="<?= $rs['id'] == $_REQUEST['id'] ? 'success' : '' ?>" > 
			 
				<td><?=$rs['City']?></td>
				<td><?=$rs['State']?></td>
				<td><?=$rs['Zipcode']?></td>
				<td><?=$rs['Users_id']?></td>
				<td><?=$rs['AddressType_Name']?></td>
				<td>
					<a class ="glyphicon glyphicon-file" href="?action=details&id=<?=$rs['id']?>"></a>
					<a class ="glyphicon glyphicon-pencil" href="?action=edit&id=<?=$rs['id']?>"></a>
					<a class ="glyphicon glyphicon-trash" href="?action=delete&id=<?=$rs['id']?>"></a>
				</td>
				

	</tr>