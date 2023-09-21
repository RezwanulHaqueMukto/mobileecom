// jquery plugin activation
(function ($) {
	$(document).ready(function () {
		var owl = $(".owl-carousel");
		$(".owl-carousel").owlCarousel({
			margin: 20,
			autoplay: true,
			autoplayTimeout: 2000,
			autoplayHoverPause: true,
			responsiveClass: true,
			loop: true,
			nav: true,
			responsiveRefreshRate: true,

			responsive: {
				0: {
					items: 1,
				},
				768: {
					items: 2,
				},
				1000: {
					items: 2,
				},
				1200: {
					items: 3,
				},
				1920: {
					items: 3,
				},
			},
		});

		owl.on("mousewheel", ".owl-stage", function (e) {
			if (e.deltaY > 0) {
				owl.trigger("next.owl");
			} else {
				owl.trigger("prev.owl");
			}
			e.preventDefault();
		});
	});
})(jQuery);
