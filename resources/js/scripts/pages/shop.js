import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';
import '../layouts/similar-companies.js';
import '../layouts/similar.js';
import tabs from '../tabs.js';
import Chooser from '../../plugins/chooser';

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

  const preview = new Swiper('.swiper--carousel', previewParams);
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

  // BRANDS LIST SELL SECTION
  let brandsListItemsEls = document.querySelectorAll(".brands-list__item--sell");

  brandsListItemsEls.forEach(function(el) {
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


  // SERVICES TABS
  tabs.init();

  const commetnsFilters = {
    filters: [],
    listUrl: '/api/data/services',
    chooserID: '',
    desktopID: 'comments_filter_',
    mobileID: 'mobile_comments_filter_',
    options: {
      current: 1,
      data: [
        {
          value: 'Сначала новые',
          // attr: {
          //   'some_attr': 'some_value',
          //   'some_attr': 'some_value',
          //   'some_attr': 'some_value',
          // },
          //
          // id: 'some_unique_id',
          // group: 'some_name',
          // onClick(item) { console.log('asdf'); }
        },
        { value: 'Сначала старые' },
        { value: 'Сначала положительные' },
        { value: 'Сначала негативные' },
      ],
      classList: {
        label: `select-menu__label select-menu__label--comments`,
        wrapper: `select-menu__wrapper select-menu__wrapper--comments`,
        current: `select-menu__current select-menu__wrapper--comments`,
        list: `select-menu__list select-menu__list--comments`,
        item: `select-menu__item select-menu__item--comments`,
        icon: `select-menu__icon select-menu__icon--comments`,
      },
    },

    async init() {
      this.chooserID = window.innerWidth >= 900 ? this.desktopID : this.mobileID;
      try {
        const services = await this.getServices();
        services.forEach(service => {
          const options = { el: `${this.chooserID}${service.id}`, ...this.options };
          const filter = new Chooser(options);
          this.filters.push(filter);
        });
      } catch (error) {
        console.log(error);
      }
    },

    async getServices() {
      try {
        const response = await fetch(this.listUrl);
        if (response.ok) {
          const services = await response.json();
          return services;
        }
      } catch (error) {
        console.log(error);
      }
    }
  }

  commetnsFilters.init();
});



