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
                <div class="form-group <?=isset($errors['Users_id']) ? 'has-error' : ''?>">
                        <label for="Users_id" class="col-sm-2 control-label">User Id</label>
                        <div class="col-sm-10">
                        	                                
                        	 <input type="Users_id" name="Users_id" id="Users_id" placeholder="Users id" class="form-control " value="<?=$model['Users_id']?>" />

                        </div>
                        <span><?=@$errors['Users_id']?></span>
                </div>

                <div class="form-group <?=isset($errors['AddressType']) ? 'has-error' : ''?>">
                        <label for="AddressType" class="col-sm-2 control-label">Address Type</label>
                        <div class="col-sm-10">
                               
                                <select name="AddressType" id="AddressType" class="form-control ">
                                        <? foreach (Keywords::GetSelectListFor(7) as $keywordRs): ?>
                                                <option value="<?=$keywordRs['id']?>"><?=$keywordRs['Name']?></option>
                                        <? endforeach; ?>
                                </select>    
						</div>
                        <span><?=@$errors['AddressType']?></span>
                </div>
                
                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>

<script type="text/javascript">
        $(function(){
                $("#Users_id").val(<?=$model['Users_id']?>);
        })        
</script>
