import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';
import '../layouts/similar-companies.js';
import '../layouts/similar.js';

document.addEventListener('DOMContentLoaded', (e) => {
  // COURUSEL
  const previewParams = {
    modules: [Navigation],
    navigation: {
      nextEl: '.forwards',
      prevEl: '.previous',
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
      }
    }
  }

  const preview = new Swiper('.preview', previewParams);

  // MAP
  ymaps.ready(function() {
    const coord = JSON.parse(document.getElementById('shop_coord').value);
    var myMap = new ymaps.Map("map", {
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
    myMap.controls.remove('FullscreenControl');

    const mark = new ymaps.Placemark([coord.lat, coord.long]);
    markCollection.add(mark);
    myMap.geoObjects.add(markCollection);
  });
});

let brandsListItemsEls = document.querySelectorAll(".brands-list__item--sell");

brandsListItemsEls.forEach(function (el) {
  el.addEventListener("click", () => {
    const targetList = document.querySelector(`[data-target="${el.parentElement.dataset.path}"]`);
    const breadcrumbs = document.querySelector(`[data-target-breadcrumbs="${el.parentElement.dataset.path}"]`);
    targetList.classList.add("open");
    breadcrumbs.parentElement.classList.add("open");
    el.parentElement.classList.remove("open");
    const close = () => {
      targetList.classList.remove("open");
      breadcrumbs.parentElement.classList.remove("open");
      el.parentElement.classList.add("open");
      breadcrumbs.removeEventListener('click', close);
    }
    breadcrumbs.addEventListener('click', close);
  });
});

let brandsListBtn = document.querySelector(".sell__more");
let brandsContainer = document.querySelector(".sell__container");

brandsListBtn.addEventListener("click", () => {
  brandsContainer.classList.toggle("expanded");
});


