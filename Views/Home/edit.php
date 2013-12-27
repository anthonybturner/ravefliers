<div class="container">
	<? $errors = isset($errors) ? $errors : array(); ?>
	<? if(isset($errors) && count($errors)): ?>
		<ul>
		<? foreach ($errors as $key => $value): ?>
			<li><label><?=$key?>:</label> <?=$value?></li>
		<? endforeach; ?>
		</ul>
	<? endif; ?>
	
	<div class="col-md-8">
		<form action="?action=saveShippingInfo" method="post"  class="form-horizontal row">
			<input type="hidden" name="id" value="<?=$model['id']?>" />
			
			<div class="form-group <?=isset($errors['FirstName']) ? 'has-error' : ''?>">
				<label for="FirstName" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" name="FirstName" id="FirstName" placeholder="First Name" class="form-control " value="<?=$model['FirstName']?>"  />
				</div>
				<span><?=@$errors['FirstName']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['LastName']) ? 'has-error' : ''?>">
				<label for="LastName" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" name="LastName" id="LastName" placeholder="Last Name" class="form-control " value="<?=$model['LastName']?>"  />
				</div>
				<span><?=@$errors['LastName']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['Address']) ? 'has-error' : ''?>">
				<label for="Address" class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" name="Address" id="Address" placeholder="Address" class="form-control " value="<?=$model['Address']?>"  />
				</div>
				<span><?=@$errors['Address']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['Address2']) ? 'has-error' : ''?>">
				<label for="Address2" class="col-sm-2 control-label">Address 2</label>
				<div class="col-sm-10">
					<input type="text" name="Address2" id="Address2" placeholder="Address2" class="form-control " value="<?=$model['Address2']?>"  />
				</div>
				<span><?=@$errors['Address2']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['City']) ? 'has-error' : ''?>">
	                        <label for="City" class="col-sm-2 control-label">City</label>
	                        <div class="col-sm-10">
	                                <input type="text" name="City" id="City" placeholder="City" class="form-control " value="<?=$model['City']?>" />
	                        </div>
	                        <span><?=@$errors['City']?></span>
	                </div>
	                <div class="form-group <?=isset($errors['State']) ? 'has-error' : ''?>">
	                        <label for="State" class="col-sm-2 control-label">State</label>
	                        <div class="col-sm-10">
	                                <input type="text" name="State" id="State" placeholder="State" class="form-control " value="<?=$model['State']?>" />
	                        </div>
	                        <span><?=@$errors['State']?></span>
	                </div>
	                <div class="form-group <?=isset($errors['Zipcode']) ? 'has-error' : ''?>">
	                        <label for="Zipcode" class="col-sm-2 control-label">Zipcode</label>
	                        <div class="col-sm-10">
	                                <input type="text" name="Zipcode" id="Zipcode" placeholder="Zipcode" class="form-control " value="<?=$model['Zipcode']?>" />
	                        </div>
	                        <span><?=@$errors['Zipcode']?></span>
	        </div>
			
			 <div class="form-group <?=isset($errors['PhoneNumber']) ? 'has-error' : ''?>">
	                        <label for="PhoneNumber" class="col-sm-2 control-label">Phone Number</label>
	                        <div class="col-sm-10">
	                                <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number" class="form-control " value="<?=$model['PhoneNumber']?>" />
	                        </div>
	                        <span><?=@$errors['PhoneNumber']?></span>
	          </div>
	          
	          		 <div class="form-group <?=isset($errors['Email']) ? 'has-error' : ''?>">
	                        <label for="Email" class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-10">
	                                <input type="text" name="Email" id="Email" placeholder="Email" class="form-control " value="<?=$model['Email']?>" />
	                        </div>
	                        <span><?=@$errors['Email']?></span>
	          </div>
	          
	
	<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" class="form-control btn btn-primary" value="Continue to billing" />
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




