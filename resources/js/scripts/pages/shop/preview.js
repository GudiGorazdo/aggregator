import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import Swiper, { Navigation, Pagination } from "swiper";

const previewParams = {
	modules: [Navigation],
	navigation: {
		nextEl: ".carousel-forwards",
		prevEl: ".carousel-previous",
	},
	freeMode: true,
	spaceBetween: 10,
	slidesPerView: 2,
	breakpoints: {
		500: {
			slidesPerView: 3,
		},
		900: {
			slidesPerView: 5,
		},
		1000: {
			slidesPerView: 4,
		},
		1400: {
			slidesPerView: 5,
		},
		1700: {
			slidesPerView: 6,
		},
		1800: {
			slidesPerView: 7,
		},
	},
};

new Swiper(".swiper--carousel", previewParams);
