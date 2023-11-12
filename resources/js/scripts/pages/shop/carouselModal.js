import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import Swiper, { Navigation, Pagination } from "swiper";

const photos = {
  swiperEl: '.swiper--photos',
  previewEls: '[data-preview]',
  swiper: null,
  params: {
    modules: [Navigation, Pagination],
    loop: true,
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination--photos',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next--photos',
      prevEl: '.swiper-button-prev--photos',
    },
  },

  init() {
    app.modal.modalEl.addEventListener('photosCarouselClose', () => this.destroy());
    document.querySelectorAll(this.previewEls).forEach(button => {
      button.addEventListener('click', (e) => {
        this.swiper = new Swiper(this.swiperEl, this.params);
        const index = +e.target.dataset.preview;
        this.swiper.slideToLoop(index, 0, false);
      });
    });
  },

  destroy: function () {
    if (this.swiper) {
      this.swiper.destroy(true, true);
      this.swiper = null;
    }
  },
}.init();

const fullscreenController = {
  modal: document.getElementById('photos'),
  enters: document.querySelectorAll('[data-modal-path="photos_window"]'),
  exit: document.getElementById('exit_fullscreen_photos'),

  init() {
    this.enters.forEach(button => button.addEventListener('click', this.enterFullscreen.bind(this)));
    this.exitFullscreen = this.exitFullscreen.bind(this);
  },

  enterFullscreen() {
    if (window.innerWidth < 900) {
      if (this.modal.requestFullscreen) {
        this.modal.requestFullscreen();
      } else if (this.modal.webkitRequestFullscreen) {
        this.modal.webkitRequestFullscreen();
      } else if (this.modal.msRequestFullscreen) {
        this.modal.msRequestFullscreen();
      }
      this.exit.addEventListener('click', this.exitFullscreen);
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
}.init();
