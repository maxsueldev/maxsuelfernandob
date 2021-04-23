$(document).ready(function () {
	$(document).on("scroll", onScroll);

	var headerHeight = $('header').outerHeight();
	var navbarHeaderHeight = 0;

	if($('nav.navbar-header').outerHeight()) {
		var navbarHeaderHeight = $('nav.navbar-header').outerHeight(); //navbar bootstrap
	}
		    
	//smoothscroll
	$('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		$(document).off("scroll");
		        
		$('a').each(function () {
		    $(this).removeClass('active');
		})
		$(this).addClass('active');
		      
		var target = this.hash,
		menu = target;
		$target = $(target);
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top - headerHeight - navbarHeaderHeight
 		}, 1100, 'swing', function () {
			window.location.hash = target;
		    $(document).on("scroll", onScroll);
		});
	});

	// btn to top

	$(".box_to_top").hide();

	$(window).scroll(function() {
		if($(this).scrollTop()>200) {
			$(".box_to_top").fadeIn();
		} else {
			$(".box_to_top").fadeOut();
		}
	});

	$(".box_to_top").click(function() {
		$("body").animate({
			scrollTop: 0
		}, 3000);
	});

});

function onScroll(event){
	var headerHeight = $('header').outerHeight();
	var navbarHeaderHeight = $('nav.navbar-header').outerHeight(); //navbar bootstrap
	var scrollPos = $(document).scrollTop();
	$('nav a').each(function () {
		var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		if (refElement.position().top - headerHeight <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
		    $('nav ul li a').removeClass("active");
		    currLink.addClass("active");
		}
		else{
		    currLink.removeClass("active");
		}
	});
}