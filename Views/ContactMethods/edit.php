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
                
                <div class="form-group <?=isset($errors['Users_id']) ? 'has-error' : ''?>">
                        <label for="Users_id" class="col-sm-2 control-label">Users Id</label>
                        <div class="col-sm-10">
                                <input type="text" name="Users_id" id="Users_id" placeholder="Users Id" class="form-control " value="<?=$model['Users_id']?>" />
                        </div>
                        <span><?=@$errors['Users_id']?></span>
                </div>
                
                <div class="form-group <?=isset($errors['ContactMethodType']) ? 'has-error' : ''?>">
                        <label for="ContactMethodType" class="col-sm-2 control-label">Contact Method Type</label>
                        <div class="col-sm-10">
                                <input type="text" name="ContactMethodType" id="ContactMethodType" placeholder="Contact Method Type" class="form-control " value="<?=$model['ContactMethodType']?>" />
                        </div>
                        <span><?=@$errors['ContactMethodType']?></span>
                </div>
           

                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>