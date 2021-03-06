$(document).ready(function() { // initialisation du DOM
	var scrolltop = $(window).scrollTop();


	/*
	 * Fermeture du notification center
	 */
	$('#close-notification').click(function() {
		$('.notification').toggleClass('animated bounceOutUp');

		setTimeout(function(){
			$('.notification-zone').toggleClass('folded');
		},800);

	});


	/* 
	 * FUUUUUUUN
	 */
	$('.pushbadges').hover(function() {
		$('.fun').toggleClass('animated');
		$('.badges figure').toggleClass('animated');
	});


	/* 
	 * Header parallax
	 */
	jQuery('#parallax .parallax-layer')
	    .parallax({
	      mouseport: jQuery('#parallax')
    });


	/*
	 * Menu fixed
	 */
	var menufixed = false;
	var header = $('header');
	var menu = header.find('nav.main-menu');
	var menudumy = 0;
	var navtop = menu.offset().top;

	$(window).scroll(function(){
		scrolltop = $(window).scrollTop();
		if(menudumy == 0){
			navtop = menu.offset().top;
		} else {
			navtop = menudumy.offset().top;
		}

		if(menufixed == true && scrolltop < navtop){
			if(menudumy != 0){
				menudumy.remove();
				menudumy = 0;
			}
			menu.removeClass('fixed');
			menufixed = false;
		} else if(menufixed == false && scrolltop > navtop){
			if(menudumy == 0){
				menudumy = $('<nav class="placeholder" style="width: 100%; height:'+menu.height()+'px"></nav>').appendTo(header);
			}
			menu.addClass('fixed');
			menufixed = true;
		}
	});


	/*
	 * Menu mobile
	 */
	$(document).on('click', 'nav.main-menu .burger', function(){
		var sousmenu = menu.find(".menu");
		sousmenu.toggleClass('ouvert');
	});


	/*
	 * Edit button -> create form
	 */
	$(document).on('click', 'a.btn.createform', function(){
		var parent = $(this).parent().parent().parent();
		parent.addClass('editing');
		parent.removeClass('showing');

		return false;
	});
});
