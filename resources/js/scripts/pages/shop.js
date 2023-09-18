import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

document.addEventListener('DOMContentLoaded', (e) => {
  const previewParams = {
    modules: [Navigation],
    navigation: {
      nextEl: '.preview__next',
      prevEl: '.preview__prev',
    },
    slidesPerView: 7,
    freeMode: true,
  }

  const preview = new Swiper('.preview', previewParams);
  console.log(preview);
});


