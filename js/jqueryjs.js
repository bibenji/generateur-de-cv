		$(function() {
			console.log( "ready!" );
		});

		$( ".affmanuel" ).click(function() {
			if($("#manuel").is(":hidden")) {
				$("#manuel").slideDown("slow", function() {
					//Anim complete.
					});
			} else {
				$( "#manuel" ).slideUp( "slow", function() {
				// Animation complete.
				});
			}
		});