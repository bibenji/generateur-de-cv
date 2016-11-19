// jQuery utilisé pour l'affichage du manuel

$(function() {
	console.log( "ready!" );
});

$( ".manuel-show" ).click(function() {
	if($("#manuel-main").is(":hidden")) {
		$("#manuel-main").slideDown("slow", function() {
			//Anim complete.
			});
	} else {
		$( "#manuel-main" ).slideUp( "slow", function() {
		// Animation complete.
		});
	}
});