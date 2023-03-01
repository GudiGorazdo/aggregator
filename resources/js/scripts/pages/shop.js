import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', (e) => {
  const swiperParams = {
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
  }
  const swiper = new Swiper('.swiper', swiperParams);

  window.modalWindowPlugin.options.addOpenCallBack(() => {
    swiper.updateProgress();
    swiper.update();
  });

  document.querySelectorAll('[data-preview]').forEach(button => {
    button.addEventListener('click', (e) => {
      swiper.slideTo(+e.target.dataset.preview, 0, false);
    });
  });
});

