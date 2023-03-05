import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

const checkMediaWidth = (e = null) => {
  const previewButton = document.getElementById('preview_count');
  const photosLength = document.querySelectorAll('.photos_img').length;
  if (window.innerWidth < 576) {
    previewButton.textContent = `ещё +${photosLength - 2}`;
  } else if (window.innerWidth < 768) {
    previewButton.textContent = `ещё +${photosLength - 3}`;
  } else {
    previewButton.textContent = `ещё +${photosLength - 4}`;
  }
}

document.addEventListener('DOMContentLoaded', (e) => {

  checkMediaWidth();

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

  const description = {
    more: document.getElementById('description_more'),
    wrapper: document.getElementById('description_wrapper'),
    text: document.getElementById('description_text'),
    ellipsis: document.getElementById('description_ellipsis'),

    init() {
      this.more.addEventListener('click', description.toggle.bind(this));
      this.checkDescriptionHeight();
    },

    toggle(e) {
      if (this.wrapper.classList.contains('close')) {
        this.wrapper.style.height = `${this.wrapper.scrollHeight}px`;
        this.wrapper.classList.remove('close');
        this.more.textContent = 'Скрыть';
        return;
      }
      this.wrapper.classList.add('close');
      this.more.textContent = 'Далее';
      this.wrapper.removeAttribute('style');
    },

    checkDescriptionHeight() {
      if (this.text.scrollHeight <= this.wrapper.offsetHeight) {
        this.more.style.display = 'none';
        this.ellipsis.style.display = 'none';
      } else {
        this.more.style.display = 'inline-block';
        this.ellipsis.style.display = 'block';

      }
    }
  }
  description.init();

  window.addEventListener('resize', (e) => {
    checkMediaWidth(e);
    description.checkDescriptionHeight(e);
  });
});

