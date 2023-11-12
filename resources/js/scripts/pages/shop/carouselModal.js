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
    document.querySelectorAll(this.previewEls).forEach(button => {
      button.addEventListener('click', (e) => {
        this.params.initialSlide = +e.target.dataset.preview;
        this.swiper = new Swiper(this.swiperEl, this.params);
        app.modal.modalEl.addEventListener('photosCarouselClose', this.destroy);
      });
    });
  },

  destroy: function () {
    console.log('destroyed');
    if (this.swiper) this.swiper.destroy();
    app.modal.modalEl.removeEventListener('photosCarouselClose', this.destroy);
  },
}.init();
