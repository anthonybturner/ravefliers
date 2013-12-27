<link rel="stylesheet" href="../../Resources/css/list-search.css"></link>


<span id="results"></span>

<script id="usersTemplate" type="text/x-handlebars-template">
	
	{{#each this}}

		
      	<h3>{{Name}}</h3>      	
      	<a class="lightbox" href="{{Picture_Url}}">
	         <img width="128px" height="128px" alt="{{Name}}" src="{{Picture_Url}}"></img>
	    </a>
	      		<br>
			{{Location}} {{Date}}<br><br>
	
	{{/each}}
</script>

<?Scripts();?>
  <? function Scripts(){ ?>
	<? global $model; ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="../../Resources/Scripts/handlebars-v1.1.2.js"></script>
   <script src="//cdn.jsdelivr.net/lightbox/0.5/js/jquery.lightbox-0.5.min.js"></script>

	<script type="text/javascript">

		

		var template = Handlebars.compile( $("#usersTemplate").html() );
		//var data = template(  );
		$("#results").append(template(<?=json_encode(($model));?>));
		
		$('a').on('click', function(e){
			
			$('.lightbox').lightBox();
			e.preventDefault();
			
		});
		
</script>
<? }?>