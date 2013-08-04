$(document).ready(function() { // initialisation du DOM
	var scrolltop = $(window).scrollTop();

	// Fermeture du notification center

	$('#close-notification').click(function() {
		$('.notification-zone').toggleClass('animated bounceOutUp');

		setTimeout(function(){
			$('.notification-zone').toggleClass('folded');
		},800);

	});

	// FUUUUUUUN

	$('.pushbadges').hover(function() {
		$('.fun').toggleClass('animated');
		$('.badges figure').toggleClass('animated');
	});

	// Header parallax

	jQuery('#parallax .parallax-layer')
	    .parallax({
	      mouseport: jQuery('#parallax')
    });

	// Menu fixed
	var menufixed = false;
	var header = $("header");
	var menu = header.find('nav.main-menu');
	var clonemenu = 0;
	
	$(window).scroll(function(){
		scrolltop = $(window).scrollTop();
		var navtop = menu.offset().top;

		if(menufixed == true && scrolltop < navtop){
			if(clonemenu != 0){ 
				clonemenu.remove();
				clonemenu = 0;
			}
			menufixed = false;
		} else if(menufixed == false && scrolltop > navtop){
			if(clonemenu == 0){ 
				clonemenu = menu.clone()
					.addClass('fixed')
					.appendTo(header);
			}
			menufixed = true;
		}
	});
});
