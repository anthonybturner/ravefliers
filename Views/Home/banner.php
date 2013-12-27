<link rel="stylesheet" type="text/css" href="../../Resources/css/banner.css" />
<div class="container">
	
	<div id="logo">			
		<h2>Rave Fliers East Coast</h2>
	</div>	
	
	<div class="col-md-8 col-md-offset-4" id="carousel">
		
	   <img class="img-thumbnail" id="img0" src="../../Resources/images/placeholder.png" width="200" />
	    <img class="img-thumbnail" id="img1" src="" width="200" />
	  <img class="img-thumbnail" id="img2" src="" width="200" />
	    
	</div>
</div>


<? BannerScript();?>
<? function BannerScript(){ ?>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="//cdn.jsdelivr.net/caroufredsel/6.2.1/jquery.carouFredSel.js"></script>
	<script>
	
	function getRandom(val){
		
		return Math.floor((Math.random()*val)+1);
		
	};
	
	var id_one = getRandom(30), id_two = getRandom(30), id_three = getRandom(30),
	values = new Array(id_one,id_two,id_three), obj = JSON.stringify(values);

	$.get("?action=flier",{"ids":obj, format:"json"}, function(data){
		
		var obj = JSON.parse(data).model;

		for (var i=0; i < obj.length; i++) {

		  	document.getElementById('img'+i).src = obj[i].Picture_Url;
			
		};	
	});
	
	$('#carousel').carouFredSel();

    // Using custom configuration
    $('#carousel').carouFredSel({
        items               : 2,
        direction           : "left",
        scroll : {
            items           : 1,
            easing          : "elastic",
            duration        : 1000,                         
            pauseOnHover    : true
        }                   
    });
	
	
	
	</script>
	

<?}?>