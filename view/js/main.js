$(document).ready(function() { // initialisation du DOM

	// Fermeture du notification center

	$('#close-notification').click(function() {
		$('.notification-zone').toggleClass('animated bounceOutUp');

		setTimeout(function(){
			$('.notification-zone').toggleClass('folded');
		},800);

	});

	// Header parallax

	jQuery('#parallax .parallax-layer')
	    .parallax({
	      mouseport: jQuery('#parallax')
    });

});
