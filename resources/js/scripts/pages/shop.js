import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', (e) => {
  const swiper = new Swiper('.swiper', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // document.getElementById('n').addEventListener('click', (e) => {
  //   swiper.slideNext();
  // })
  swiper.disable()

  window.modalWindowPlugin.add();

  document.querySelectorAll('[data-preview]').forEach(button => {
    button.addEventListener('click', (e) => {
      swiper.slideTo(e.target.dataset.preview);
      swiper.enable()
    });
  });
});

