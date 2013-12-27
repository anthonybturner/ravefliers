<div class="container">
	
	<? $errors = isset($errors) ? $errors : array(); ?>

        <? if(isset($errors) && count($errors)): ?>
                <ul>
                <? foreach ($errors as $key => $value): ?>
                        <li><label><?=$key?>:</label> <?=$value?></li>
                <? endforeach; ?>
                </ul>
        <? endif; ?>
        
        <form action="?action=save" method="post" class="form-horizontal row">
                
                <input type="hidden" name="id" value="<?=$model['id']?>" />
                
                <div class="form-group <?=isset($errors['Name']) ? 'has-error' : ''?>">
                        <label for="Name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                                <input type="text" name="Name" id="Name" placeholder="Name" class="form-control " value="<?=$model['Name']?>" />
                        </div>
                        <span><?=@$errors['Name']?></span>
                </div>

                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>