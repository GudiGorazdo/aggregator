import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', (e) => {
  const swiper = new Swiper('.swiper', {
    modules: [Navigation, Pagination],
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  document.querySelectorAll('[data-preview]').forEach(button => {
    button.addEventListener('click', (e) => {
      swiper.slideTo(e.target.dataset.preview, 0, false);
    });
  });
});

