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
                
                <div class="form-group <?=isset($errors['Keywords_id']) ? 'has-error' : ''?>">
                        <label for="Keywords_id" class="col-sm-2 control-label">Keyword Id</label>
                        <div class="col-sm-10">
                                <input type="text" name="Keywords_id" id="Keywords_id" placeholder="Keyword Id" class="form-control " value="<?=$model['Keywords_id']?>" />
                        </div>
                        <span><?=@$errors['Keywords_id']?></span>
                </div>
                <div class="form-group <?=isset($errors['Products_id']) ? 'has-error' : ''?>">
                        <label for="Products_id" class="col-sm-2 control-label">Product id</label>
                        <div class="col-sm-10">
                                <input type="text" name="Products_id" id="Products_id" placeholder="Product Id" class="form-control " value="<?=$model['Products_id']?>" />
                        </div>
                        <span><?=@$errors['Products_id']?></span>
                </div>

                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>