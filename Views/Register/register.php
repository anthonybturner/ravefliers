<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css" rel="stylesheet" />
<link href="../../Resources/css/register.css" type="text/css" rel="stylesheet" />

<div class="container">
	
	
	<div class="col-md-5 col-md-offset-4" id="register-box-label">
				
		<span>Register</span>
	</div>
	<div class="col-md-5 col-md-offset-4" id="register-wrapper"> 
		<? $errors = isset($errors) ? $errors : array(); ?>
		<? if(isset($errors) && count($errors)): ?>
			<ul>
				<? foreach ($errors as $key => $value): ?>
					<li><label><?=$key?>:</label> <?=$value?></li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
		
		
			
		<form action="?action=submit-register" method="post"  class="form-horizontal row ">
			
			
			<div class="form-group <?=isset($errors['FirstName']) ? 'has-error' : ''?> col-md-12">
				<label for="FirstName" class="control-label">FirstName</label>
				<div>
					<input type="text" name="FirstName" id="FirstName" placeholder="FirstName" class="form-control " value="<?=$model['FirstName']?>"  />
				</div>
				<span><?=@$errors['FirstName']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['LastName']) ? 'has-error' : ''?> col-md-12">
				<label for="LastName" class="control-label">LastName</label>
				<div>
					<input type="text" name="LastName" id="LastName" placeholder="LastName" class="form-control " value="<?=$model['LastName']?>"  />
				</div>
				<span><?=@$errors['LastName']?></span>
			</div>
			
			
			<div class="form-group <?=isset($errors['Password']) ? 'has-error' : ''?> col-md-12">
				<label for="Password" class="control-label">Password</label>
				<div>
					<input type="password" name="Password" id="Password" placeholder="Password" class="form-control " value="<?=$model['Password']?>"  />
				</div>
				<span><?=@$errors['Password']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['Email']) ? 'has-error' : ''?> col-md-12">
				<label for="Email" class="control-label">Email</label>
				<div>
					<input type="text" name="Email" id="Email" placeholder="Email" class="form-control "  value="<?=$model['Email']?>" />
				</div>
				<span><?=@$errors['Email']?></span>
			</div>
			
			<div class="form-group col-md-4">
				<div class="">
					<input type="submit" class="form-control btn btn-primary" value="Register" />
				</div>
				
				
			</div>
		
		</form>
	
	</div>
	
</div>
