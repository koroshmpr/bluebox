/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import Swiper from 'swiper/bundle';
import Alpine from 'alpinejs'

document.addEventListener('DOMContentLoaded', function () {
	window.Alpine = Alpine;
	Alpine.start();
	document.querySelectorAll('.post-slider').forEach((slider , i) => {
		let autoplaySpeed = slider.dataset.autoplay ? parseInt(slider.dataset.autoplay) : 0;
		let perPage = slider.dataset.perpage ? parseInt(slider.dataset.perpage) : 3.5;
		let perPageMobile = slider.dataset.mobile ? parseFloat(slider.dataset.mobile) : 1;
		let perfix = slider.dataset.perfix ?? 'slider';
		let direction = slider.dataset.direction ?? 'horizontal';
		let index = slider.dataset.index ?? i;
		let space = slider.dataset.space ? parseInt(slider.dataset.space) : 20;
		let free = slider.dataset.free === '1' ;

		new Swiper(slider, {
			direction: direction,
			grabCursor: true,
			speed: 1000,
			effect: 'slide',
			freeMode :free ,
			spaceBetween: space,
			slidesPerView: perPageMobile,
			breakpoints: {
				992: {
					slidesPerView: perPage,
					centeredSlides: false,
				}
			},
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: `.${perfix}-next-${index}`,
				prevEl: `.${perfix}-prev-${index}`,
			},
			autoplay: {
				delay: autoplaySpeed,
				disableOnInteraction: false,
				pauseOnMouseEnter: true,
			},
		});
	});

})
