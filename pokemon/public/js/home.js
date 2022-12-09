var swiper = new Swiper(".mySwiper", {
	slidesPerView: 7,
	spaceBetween: 30,
	slidesPerGroup: 7,
	loop: true,
	loopFillGroupWithBlank: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},
	navigation: {
	  nextEl: ".swiper-button-next",
	  prevEl: ".swiper-button-prev",
	},
	autoplay: {
		delay: 1500,
		disableOnInteraction: false,
	  },
  });