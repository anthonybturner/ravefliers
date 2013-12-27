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
                
                <div class="form-group <?=isset($errors['Value']) ? 'has-error' : ''?>">
                        <label for="Value" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                                <input type="text" name="Value" id="Value" placeholder="Phone Number" class="form-control " value="<?=$model['Value']?>" />
                        </div>
                        <span><?=@$errors['Value']?></span>
                </div>
                
                <div class="form-group <?=isset($errors['PhoneTypes_id']) ? 'has-error' : ''?>">
                        <label for="PhoneTypes_id" class="col-sm-2 control-label">PhoneTypes Id</label>
                        <div class="col-sm-10">
                                <input type="text" name="PhoneTypes_id" id="PhoneTypes_id" placeholder="PhoneTypes id" class="form-control " value="<?=$model['PhoneTypes_id']?>" />
                        </div>
                        <span><?=@$errors['PhoneTypes_id']?></span>
                </div>

                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>