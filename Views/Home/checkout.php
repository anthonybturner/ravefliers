<div class="container">
	<? $errors = isset($errors) ? $errors : array(); ?>
	<? if(isset($errors) && count($errors)): ?>
		<ul>
		<? foreach ($errors as $key => $value): ?>
			<li><label><?=$key?>:</label> <?=$value?></li>
		<? endforeach; ?>
		</ul>
	<? endif; ?>
	
	<div class="col-md-6">
		<form action="?action=saveCreditInfo" method="post"  class="form-horizontal row">
			<input type="hidden" name="id" value="<?=$model['id']?>" />
			
			<div class="form-group <?=isset($errors['Cardholder']) ? 'has-error' : ''?>">
				<label for="Cardholder" class="col-sm-2 control-label">Cardholder Name</label>
				<div class="col-sm-10">
					<input type="text" name="Cardholder" id="Cardholder" placeholder="Cardholder Name" class="form-control " value="<?=$model['Cardholder']?>"  />
				</div>
				<span><?=@$errors['Cardholder']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['CardNumber']) ? 'has-error' : ''?>">
				<label for="CardNumber" class="col-sm-2 control-label">Card Number</label>
				<div class="col-sm-10">
					<input type="text" name="CardNumber" id="CardNumber" placeholder="CardNumber" class="form-control " value="<?=$model['CardNumber']?>"  />
				</div>
				<span><?=@$errors['CardNumber']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['ExpirationDate']) ? 'has-error' : ''?>">
				<label for="ExpirationDate" class="col-sm-2 control-label">Expiration Date</label>
				<div class="col-sm-10">
					<input type="text" name="ExpirationDate" id="ExpirationDate" placeholder="ExpirationDate" class="form-control " value="<?=$model['ExpirationDate']?>"  />
				</div>
				<span><?=@$errors['ExpirationDate']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['SecCode']) ? 'has-error' : ''?>">
				<label for="SecCode" class="col-sm-2 control-label">CVV2 Code</label>
				<div class="col-sm-10">
					<input type="text" name="SecCode" id="SecCode" placeholder="SecCode" class="form-control " value="<?=$model['SecCode']?>"  />
				</div>
				<span><?=@$errors['SecCode']?></span>
			</div>

	<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" class="form-control btn btn-primary" value="Submit payment" />
				</div>
			</div>
		</form>
			
	</div><!-- End Shipping area-->

	
</div>

<script type="text/javascript">
        $(function(){
                $("#UserType").val(<?=$model['UserType']?>);
        })        
</script>




