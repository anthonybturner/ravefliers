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
                
                <div class="form-group <?=isset($errors['Price']) ? 'has-error' : ''?>">
                        <label for="Price" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                                <input type="text" name="Price" id="Price" placeholder="Price" class="form-control " value="<?=$model['Price']?>" />
                        </div>
                        <span><?=@$errors['Price']?></span>
                </div>
                
                <div class="form-group <?=isset($errors['Description']) ? 'has-error' : ''?>">
                        <label for="Description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                                <input type="text" name="Description" id="Description" placeholder="Description" class="form-control " value="<?=$model['Description']?>" />
                        </div>
                        <span><?=@$errors['Quantity']?></span>
                </div>
                
                 <div class="form-group <?=isset($errors['Picture_Url']) ? 'has-error' : ''?>">
                        <label for="Picture_Url" class="col-sm-2 control-label">Picture url</label>
                        <div class="col-sm-10">
                                <input type="text" name="Picture_Url" id="Picture_Url" placeholder="Picture Url" class="form-control " value="<?=$model['Picture_Url']?>" />
                        </div>
                        <span><?=@$errors['Picture_Url']?></span>
                </div>
                
                <div class="form-group <?=isset($errors['Suppliers_id']) ? 'has-error' : ''?>">
                        <label for="Suppliers_id" class="col-sm-2 control-label">Suppliers id</label>
                        <div class="col-sm-10">
                                <input type="text" name="Suppliers_id" id="Suppliers_id" placeholder="Suppliers id" class="form-control " value="<?=$model['Suppliers_id']?>" />
                        </div>
                        <span><?=@$errors['Suppliers_id']?></span>
                </div>
                
                <div class="form-group <?=isset($errors['ProductsCategory_id']) ? 'has-error' : ''?>">
                        <label for="ProductsCategory_id" class="col-sm-2 control-label">Products Category id</label>
                        <div class="col-sm-10">
                                <input type="text" name="ProductsCategory_id" id="ProductsCategory_id" placeholder="Products Category id" class="form-control " value="<?=$model['ProductsCategory_id']?>" />
                        </div>
                        <span><?=@$errors['ProductsCategory_id']?></span>
                </div>

         
                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="form-control btn btn-primary" value="Save" />
                        </div>
                </div>
        </form>
</div>