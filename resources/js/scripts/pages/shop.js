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

  ymaps.ready(function () {
    const coord = JSON.parse(document.getElementById('shop_coord').value);
    var myMap = new ymaps.Map("shop-map", {
      center: [coord.lat, coord.long],
      zoom: 10,
      controls: []
    }),
      markCollection = new ymaps.GeoObjectCollection(null, {
        iconColor: '#6c757d'
      });

    myMap.controls.add('zoomControl');
    myMap.controls.remove('typeSelector');
    myMap.controls.remove('geolocationControl');
    myMap.controls.remove('trafficControl');
    myMap.controls.remove('fullscreenControl');

    const mark = new ymaps.Placemark([coord.lat, coord.long]);
    markCollection.add(mark);
    myMap.geoObjects.add(markCollection);
  });

  const descriptionMore = document.getElementById('description_more');
  const descriptionWrapper = document.getElementById('description_wrapper');

  descriptionMore.addEventListener('click', (e) => {
    if (descriptionWrapper.classList.contains('close')) {
      descriptionWrapper.style.height = `${descriptionWrapper.scrollHeight}px`;
      descriptionWrapper.classList.remove('close');
      descriptionMore.textContent = 'Скрыть';
      return;
    }
    descriptionWrapper.classList.add('close');
    descriptionMore.textContent = 'Далее';
    descriptionWrapper.removeAttribute('style');
  });
});

