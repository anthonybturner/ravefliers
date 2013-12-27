<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css" rel="stylesheet" />
<link href="../../Resources/css/login.css" type="text/css" rel="stylesheet" />

<div class="container">
	
	
	<div class="col-md-4 col-md-offset-4" id="login-box-label">
				
		<span>Sign in</span>
	</div>
	<div class="col-md-4 col-md-offset-4" id="login-wrapper"> 
		<? $errors = isset($errors) ? $errors : array(); ?>
		<? if(isset($errors) && count($errors)): ?>
			<ul>
				<? foreach ($errors as $key => $value): ?>
					<li><label><?=$key?>:</label> <?=$value?></li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
		
		
			
		<form action="?action=submit-login" method="post"  class="form-horizontal row ">
			
			
			<div class="form-group <?=isset($errors['Email']) ? 'has-error' : ''?> col-md-12">
				<label for="Email" class="control-label">Email</label>
				<div>
					<input type="text" name="Email" id="Email" placeholder="Email" class="form-control " value="<?=$model['Email']?>"  />
				</div>
				<span><?=@$errors['Email']?></span>
			</div>
			
			<div class="form-group <?=isset($errors['Password']) ? 'has-error' : ''?> col-md-12">
				<label for="Password" class="control-label">Password</label>
				<div>
					<input type="password" name="Password" id="Password" placeholder="Password" class="form-control "  value="<?=$model['Password']?>" />
				</div>
				<span><?=@$errors['Password']?></span>
			</div>
			
			<div class="form-group col-md-4">
				<div class="">
					<input type="submit" class="form-control btn btn-primary" value="Login" />
				</div>
				
				
			</div>
		
			<div class="form-group col-md-12" id="login-failed">
					
					
				
			</div>
		</form>
	
	</div>
	
</div>
<? function Scripts(){ ?>
  	<? global $model; ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.1.2/handlebars.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript">
	
	
			$(function(){
				
				<? if( isset($_REQUEST['Status']) && $_REQUEST['Status'] == "Failed"): ?>
					
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.hideMethod = 'slideUp'; 
					toastr.options.newestOnTop = false;
					toastr.error("Login failed");
					$("#login-failed").html("<hr/><br>Invalid login");
					$("#login-failed").addClass("failed");
				
				<? endif; ?>
				
			});
	
	
	
	</script>
	
<?}?>
	
	
	

