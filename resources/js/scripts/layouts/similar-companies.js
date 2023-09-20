import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', (e) => {
  // COURUSEL
  const similarListParams = {
    modules: [Navigation],
    slidesPerView: 4,
    freeMode: true,
    navigation: {
      nextEl: '.similar-forwards',
      prevEl: '.similar-previous',
    },
  }

  const corousel = new Swiper('.similar-list', similarListParams);
});


