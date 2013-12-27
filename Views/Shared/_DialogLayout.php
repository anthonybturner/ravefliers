<link rel="stylesheet" href="../../Resources/css/dialog-layout.css"></link>

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?=@$title ?></h4>
      </div>
      <div class="modal-body">
      	
        	<? include $view; ?>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  

	<script type="text/javascript">

		$('button').on('click',function(){
			
			var modal  = $('.modal-dialog');
			modal.hide("slow", function(){ 
				
				$(modal).remove(); 
				
				});
			});
		
</script>