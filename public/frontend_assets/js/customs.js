AOS.init({
		    duration: 800,
		    easing: 'slide',
		    once: false
		});
		jQuery(document).ready(function($) {
		    "use strict";
		    var siteCarousel = function() {
		        if ($('.nonloop-block-13').length > 0) {
		            $('.nonloop-block-13').owlCarousel({
		                center: false,
		                items: 1,
		                loop: true,
		                stagePadding: 10,
		                autoplay: true,
		                margin: 20,
		                nav: true,
		                smartSpeed: 1000,
		                dots: true,
		                navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		                responsive: {
		                    600: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 1
		                    },
		                    1000: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 3
		                    },
		                    1200: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 3
		                    }
		                }
		            });
		        }

		        if ($('.nonloop-block-14').length > 0) {
		            $('.nonloop-block-14').owlCarousel({
		                center: false,
		                items: 1,
		                rtl:true,
		                loop: true,
		                stagePadding: 0,
		                autoplay: true,
		                margin: 20,
		                smartSpeed: 900,
		                nav: true,
		                dots: true,
		                navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		                responsive: {
		                    600: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 1
		                    },
		                    1000: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 3
		                    },
		                    1200: {
		                        margin: 20,
		                        stagePadding: 10,
		                        items: 3
		                    }
		                }
		            });
		        }

		        // if ($('.nonloop-block-15').length > 0) {
		        //     $('.nonloop-block-15').owlCarousel({
		        //         center: false,
		        //         items: 1,
		        //         loop: true,
		        //         stagePadding: 0,
		        //         autoplay: true,
		        //         margin: 20,
		        //         nav: true,
		        //         dots: true,
		        //         navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		        //         responsive: {
		        //             600: {
		        //                 margin: 20,
		        //                 stagePadding: 0,
		        //                 items: 1,
		        //                 nav: false,
		        //                 dots: true
		        //             },
		        //             1000: {
		        //                 margin: 20,
		        //                 stagePadding: 0,
		        //                 items: 2,
		        //                 nav: true,
		        //                 dots: true
		        //             },
		        //             1200: {
		        //                 margin: 20,
		        //                 stagePadding: 0,
		        //                 items: 3,
		        //                 nav: true,
		        //                 dots: true
		        //             }
		        //         }
		        //     });
		        // }

		        if ($('.slide-one-item').length > 0) {
		            $('.slide-one-item').owlCarousel({
		                center: false,
		                items: 1,
		                loop: true,
		                stagePadding: 0,
		                smartSpeed: 1000,
		                margin: 0,
		                autoplay: true,
		                pauseOnHover: false,
		                animateOut: 'fadeOut',
		                animateIn: 'fadeIn',
		                nav: true,
		                navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">']
		            });
		        }
		    };
		    siteCarousel();
		});