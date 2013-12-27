<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/lightbox/0.5/css/jquery.lightbox-0.5.css" media="screen" />
<link type="text/css" rel="stylesheet" href="../../Resources/css/home.css" />

<div class="container" id="main-area">

	<div id="album-navigation">
		<ul class="nav nav-pills" id="test" data-bind="foreach: albums">
		  <li><a href="#" data-bind="text: Name, click: $root.albumClicked">Album</a> </li>
		  
		</ul>	
	</div>
	
	<hr/>


	<div data-bind="foreach: fliers">
            
                
                <div class="row" id="flierArea">
                       
                       <span><h4 data-bind="text: Name"></h4></span>
	                   <hr/>
                       
                       <span>
	                        <a class="lightbox" data-bind="attr: { href: Picture_Url }, click: $root.myFunction">
	                        	<img class="col-md-3 img-thumbnail" data-bind="attr:{src: Picture_Url, alt: Name} ,">
	                        </a>                  
                        </span>
                        
                        
                        
                        <span data-bind="if: Picture_Inside_Url != '' ">
	                        <a class="lightbox" data-bind="attr: { href: Picture_Inside_Url }, click: $root.myFunction">
                        	<img class="col-md-3 img-thumbnail" data-bind="attr:{src: Picture_Inside_Url, alt: Name}">
                        	</a>
                        </span>
                        
                        <span data-bind="if: Picture_Back_Url != '' ">
	                        <a class="lightbox" data-bind="attr: { href: Picture_Back_Url }, click: $root.myFunction">
	                        	<img class="col-md-3 img-thumbnail" data-bind="attr:{src: Picture_Back_Url, alt: Name}">
	                        </a>
                        </span>
                        
                        <div id="info" >
							<span  data-bind="text: Location"></span><br>
							<span data-bind="text: Date"></span>
							<p data-bind="text: Description"></p>
						
						</div>
						
				</div>
	<br><br>
	
            
     </div>

</div>


<script>
	
	$( 'li' ).hover(function() {
			  $( this ).fadeOut( 100 );
			  $( this ).fadeIn( 300 );
			});
	
</script>

<? function Scripts(){ ?>
	
  	<? global $model; ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.0.0/knockout-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js"></script>
	<script src="//cdn.jsdelivr.net/lightbox/0.5/js/jquery.lightbox-0.5.min.js"></script>
	<script type="text/javascript">
	$(function(){
	
	
		var vm = {
			
			albums: ko.observableArray(),
			albumClicked: function(){
				          
				//Get all fliers or the category selected
				 $.getJSON("?action=fliers&format=json", { FliersCategory_id: this.id } ,function(results){
                    //Each product is in this model array
                    var model = results.model;
             
                    vm.fliers(model);
                 })
			},

			//This is the fliers
			fliers: ko.observableArray(),
			
			myFunction: function(flier){
				
				//$('.navbar').hide();
				 $('.lightbox').lightBox({
					overlayBgColor: '#000000',
					overlayOpacity: 0.9,
					containerResizeSpeed: 350,
					txtImage: flier.Name + " " + flier.Description + " " + flier.Location,
					txtOf: 'of'
				   });
				//console.log(flier.Picture_Url);
			},
		}
		ko.applyBindings(vm);
		
		//Default is to get all categories and display them
		$.getJSON("?action=albums&format=json", function(results){
			
			var model = results.model;
			vm.albums(model);
		
		});
	});
	
		
        
	
	</script>
<? } ?>