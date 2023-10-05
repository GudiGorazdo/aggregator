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

let breadcrumbsBtns = document.querySelectorAll(".accordion__breadcrumbs-btn");
let categoriesAccordionBody = document.querySelectorAll(".accordion__body--brands");

breadcrumbsBtns.forEach(function (el) {
  el.addEventListener("click", () => {
    console.log('work')
    categoriesAccordionBody.forEach(function (category) {
      category.classList.remove("open");
    });
  });
});

let brandsListItemsEls = document.querySelectorAll(
  ".brands-list__item--main"
);

brandsListItemsEls.forEach(function (el) {
  el.addEventListener("click", () => {
    console.log('work')
    categoriesAccordionBody.forEach(function (category) {
      category.classList.add("open");
    });
  });
});

let brandsListBtn = document.querySelector(".brands-list__more-btn");
let brandsContainer = document.querySelector(".brands__content");

brandsListBtn.addEventListener("click", () => {
  brandsContainer.classList.toggle("expanded");
});


