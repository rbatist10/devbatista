/*-----------------------------------------------------------------------------------

/* Styles Switcher

-----------------------------------------------------------------------------------*/



window.console = window.console || (function(){

	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};

	return c;

})();





jQuery(document).ready(function($) {

	

		// Color Changer

		$("#style-switcher .default" ).click(function(){

			$("#colors" ).attr("href", "css/color/default.css" );

			return false;

		});

		

		$("#style-switcher .blue" ).click(function(){

			$("#colors" ).attr("href", "css/color/blue.css" );

			return false;

		});

		

		$("#style-switcher .lagoon" ).click(function(){

			$("#colors" ).attr("href", "css/color/lagoon.css" );

			return false;

		});

		

		$("#style-switcher .lemon" ).click(function(){

			$("#colors" ).attr("href", "css/color/lemon.css" );

			return false;

		});

		

		$("#style-switcher .orange" ).click(function(){

			$("#colors" ).attr("href", "css/color/orange.css" );

			return false;

		});

		

		$("#style-switcher .pear-green" ).click(function(){

			$("#colors" ).attr("href", "css/color/pear-green.css" );

			return false;

		});



		$("#style-switcher .pine" ).click(function(){

			$("#colors" ).attr("href", "css/color/pine.css" );

			return false;

		});

		

		$("#style-switcher .sea" ).click(function(){

			$("#colors" ).attr("href", "css/color/sea.css" );

			return false;

		});
		
		
		$("#style-switcher .pink" ).click(function(){

			$("#colors" ).attr("href", "css/color/pink.css" );

			return false;

		});
		
		
		$("#style-switcher .spices" ).click(function(){

			$("#colors" ).attr("href", "css/color/spices.css" );

			return false;

		});
		
		
		$("#style-switcher .turquoise" ).click(function(){

			$("#colors" ).attr("href", "css/color/turquoise.css" );

			return false;

		});
		
		
		$("#style-switcher .yellow" ).click(function(){

			$("#colors" ).attr("href", "css/color/yellow.css" );

			return false;

		});





		$("#style-switcher h2 a").click(function(e){

			e.preventDefault();

			var div = $("#style-switcher");

			console.log(div.css("left"));

			if (div.css("left") === "-180px") {

				$("#style-switcher").animate({

					left: "0px"

				}); 

			} else {

				$("#style-switcher").animate({

					left: "-180px"

				});

			}

		});



		$("#layout-switcher").on('change', function() {

			$('#layout').attr('href', $(this).val() + '.css');

		});



		$(".colors li a").click(function(e){

			e.preventDefault();

			$(this).parent().parent().find("a").removeClass("active");

			$(this).addClass("active");

		});

	});