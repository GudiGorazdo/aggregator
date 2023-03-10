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

  // check previews photos
  checkMediaWidth();

  // add photos
  const photosParams = {
    modules: [Navigation, Pagination],
    loop: true,
    pagination: {
      el: '.photos-swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.photos-swiper-button-next',
      prevEl: '.photos-swiper-button-prev',
    },
  }
  const photos = new Swiper('.photos-swiper', photosParams);

  // photos add to modal  window
  window.modalWindowPlugin.options.addOpenCallBack(() => {
    photos.updateProgress();
    photos.update();
  });

  // photos slide to preview image
  document.querySelectorAll('[data-preview]').forEach(button => {
    button.addEventListener('click', (e) => {
      photos.slideTo(+e.target.dataset.preview, 0, false);
    });
  });


  const FullscreenController = {
    modal: document.getElementById('photos'),
    enters: document.querySelectorAll('[data-modal-path="photos_window"]'),
    exit: document.getElementById('exit_fullscreen_photos'),

    init() {
      this.enters.forEach(button => button.addEventListener('click', this.enterFullscreen.bind(this)));
    },

    enterFullscreen() {
      if (window.innerWidth < 992) {
        if (this.modal.requestFullscreen) {
          this.modal.requestFullscreen();
        } else if (this.modal.webkitRequestFullscreen) {
          this.modal.webkitRequestFullscreen();
        } else if (this.modal.msRequestFullscreen) {
          this.modal.msRequestFullscreen();
        }
        this.exit.addEventListener('click', this.exitFullscreen.bind(this));
      }
    },

    exitFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitexitFullscreen) {
        document.webkitexitFullscreen();
      } else if (document.msexitFullscreen) {
        document.msexitFullscreen();
      }
      this.exit.removeEventListener('click', this.exitFullscreen);
    }
  }
  FullscreenController.init();

  // yandex map add
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
    myMap.controls.remove('FullscreenControl');

    const mark = new ymaps.Placemark([coord.lat, coord.long]);
    markCollection.add(mark);
    myMap.geoObjects.add(markCollection);
  });

  // description collapse
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

  // reviews anchor links
  const reviewsAnchor = {
    SHOW_CLASS: 'show',
    COLLAPSED_CLASS: 'collapsed',

    links: document.querySelectorAll('[id^="anchor_reviews_"]'),
    items: document.querySelectorAll('[id^="reviews_service-"]'),

    init() {
      this.links.forEach(link => {
        link.addEventListener('click', () => {
          const el = document.getElementById(link.dataset.anchorTarget);
          this.show(el);
          el.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        });
      });
    },
    hideAll() {
      this.items.forEach(item => {
        item.classList.remove(this.SHOW_CLASS);
        const button = item.parentElement.querySelector('[data-bs-toggle="collapse"]');
        button.classList.add(this.COLLAPSED_CLASS);
        button.setAttribute('aria-expanded', 'false');
      });
    },

    show(el) {
      this.hideAll();
      if (el.classList.contains(this.SHOW_CLASS)) return;
      el.classList.add(this.SHOW_CLASS);
      const button = el.parentElement.querySelector('[data-bs-toggle="collapse"]');
      button.classList.remove(this.COLLAPSED_CLASS);
      button.setAttribute('aria-expanded', 'true');
    }
  }
  reviewsAnchor.init();

  // add eventlistener to resize event
  window.addEventListener('resize', (e) => {
    checkMediaWidth(e);
    description.checkDescriptionHeight(e);
  });

    // addsimilar
    const similarParams = {
      modules: [Navigation, Pagination],
      loop: false,
      pagination: {
        el: '.similar-swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.similar-swiper-button-next',
        prevEl: '.similar-swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 5
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 5
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 5
        },
      }
    }
    const similar = new Swiper('.similar-swiper', similarParams);
});

