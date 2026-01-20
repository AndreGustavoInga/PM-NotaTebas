$(".owl-icones").owlCarousel({
	loop: true,
	nav: true,
	navText: [
		'<span class="fa fa-chevron-left botao-icone" aria-hidden="true"   style="color: black; padding: 10px;" ></span>', 
		'<span class="fa fa-chevron-right botao-icone" aria-hidden="true"   style="color: black; padding: 10px;" ></span>'
	],
	dots: false,
	autoplay: true,
	autoplayHoverPause: true,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1,
			nav: true
		},
		600: {
			margin: 20,
			items: 2,
			nav: true
		},
		768: {
			margin: 20,
			items: 2,
			nav: true
		},
		960: {
			margin: 20,
			items: 3,
			nav: true,
			loop: false
		},
		1200: {
			margin: 20,
			items: 4,
			nav: true,
			loop: true,
		},
		1400: {
			margin: 20,
			items: 5,
			nav: true,
			loop: true,
		},
	}
});
